<?php include_once('inc.php');?>
<?php echo $this->Html->css('prettyPhoto'); ?>
<?php echo $this->Html->script('jquery.prettyPhoto'); ?>
<?php if(isset($success)){?><div id="flashMessage" class="message"><?php echo $success;?></div><?php }?>
<h3 class="page-title">
	<?php echo $subj;?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>mail">Inbox</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>mail"><?php echo $subj;?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<script type="text/javascript">
    function show_reply()
    {
        $('#reply').show();
    }
</script>

<div id="table">
<h3 style="padding-left:15px;"><?php echo $subj;?></h3>
 <table class="tables">
<?php 
$i=0;
$j = 0;
$k=0;
$rep['is_replyall']='2';
$rep['date'] = '';
//var_dump($all);
foreach($all as $a){
    
    ?>
    <table id="span<?php echo $j;?>" class="clickable">
    <tr class="show"><td> <b>Sent By:</b> <?php if($a['Mail']['sender_id']=='0')echo 'Admin';else{
        $qs = $member->find('first',array('conditions'=>array('id'=>$a['Mail']['sender_id'])));
        if($qs)
        echo $qs['Member']['full_name'];
        else
        echo "Member Deleted";
        
        
    }
    $recipients = $a['Mail']['recipients_id'];
        $replies = explode(',',$recipients);
     ?> &nbsp; [<?php echo $a['Mail']['date'];?>] &nbsp; ( <strong>To</strong> : 
    <?php 
    $repss = 0;
    foreach($replies as $reps)
                {
                    $repss++;
                    if($repss!=1)
                    echo ', ';
                    
                    if($reps==0)
                    echo 'Admin';
                    else {
                    $qs2 = $member->find('first',array('conditions'=>array('id'=>$reps)));
                    
                    if($qs2){
                    
                    echo $qs2['Member']['full_name'];}} 
                }
    
     ?> )</td></tr>
    <tr><td><?php echo $a['Mail']['message']; ?></td></tr>
    <?php
    if($a['Mail']['attachment'])
    { 
    ?>
    <tr><td><strong>Attachments:</strong></td></tr>
    <?php
    $doc_arr = explode(',',$a['Mail']['attachment']);
    ?>
    <?php
    $k=0;
    foreach($doc_arr as $doc)
    {
        
        $ext_arr = explode('.',$doc);
        $ext = strtolower(end($ext_arr));
        $ext_doc = array('doc','docx','txt','pdf','xls','xlsx','ppt','pptx','cmd');
        $ext_img = array('jpg','png','gif','jpeg','bmp');
        if(in_array($ext,$ext_doc))
        {
            $cc = $ddo->find('first',array('conditions',array('doc'=>$doc)));
            if($cc)
            $document_id = $cc['Doc']['document_id'];
            else
             $document_id = 0;
             unset($cc);
            if($_SERVER['SERVER_NAME']=='localhost')
            $url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas/img/documents/'.$doc;
            else
            $url = 'http://'.$_SERVER['SERVER_NAME'].'/img/documents/'.$doc;
            $path = "https://docs.google.com/viewer?url=".$url;
            $path = $base_url.'uploads/view_detail/'.$document_id;
            ?>
            <?php if($document_id){?><tr><td><strong><?php echo $doc;?></strong>&nbsp; &nbsp; <a href="<?php echo $path;?>">View</a></td></tr><?php }?>
            <?php
        }
        else
        if(in_array($ext,$ext_img))
        {
            $cc = $dio->find('first',array('conditions',array('image'=>$doc)));
            if($cc)
            $document_id = $cc['Image']['document_id'];
            else
             $document_id = 0;
             unset($cc);
             $path = $base_url.'uploads/view_detail/'.$document_id;
             
            ?>
            <?php if($document_id){?><tr><td><strong><?php echo $doc;?></strong>&nbsp; &nbsp; <a href="<?php echo $path;?>">View</a></td></tr><?php }?>
           
            <?php
        }
        else
        {
            if(!is_numeric($doc)){
            $cc = $dvo->find('first',array('conditions',array('video'=>$doc)));
            if($cc)
            $document_id = $cc['Video']['document_id'];
            else
             $document_id = 0;
             unset($cc);
             $path = $base_url.'uploads/view_detail/'.$document_id;
             }
             else{
             $path = $base_url.'uploads/view_detail/'.$doc;
             $document_id = true;
             }
             
            ?>
            <?php if($document_id){?><tr><td><strong><?php if(!is_numeric($doc))echo $doc;?></strong>&nbsp; &nbsp; <a href="<?php echo $path;?>">View</a></td></tr><?php }?>
            
            <?php
        }
    ?>    
    
    
    <?php 
    }
    }
    ?>
    <tr><td>&nbsp;</td></tr>
    </table>
    <?php
$parents = $a['Mail']['parent'];    
if(!$parents)
$parents = $a['Mail']['id'];
}


?>
</table>                
                <?php if(!isset($_GET['sent'])){?>
<div id="reply" style="padding:15px;">
<form action="" method="post" id="replyform">
    <textarea name="reply" style="height:100px;width:420px;" class="required"></textarea>
    <input type="hidden" name="mail_id" value="<?php echo $parents;?>" />
    <?php
    if($this->Session->read('admin'))
    $first = 0;
    else
    $first = $this->Session->read('id');
    $get_parent = $last->find('first',array('conditions'=>array('parent'=>$parents,'first'=>$first)));
    $reqs = $get_parent['Lastsender']['second'];
    if($reqs == 0)
    {
        $get_par_email = $user->find('first');
        $reqs_email = $get_par_email['User']['email'];
    }
    else
    {
        //echo $reqs;
        $get_par_email = $member->find('first',array('conditions'=>array('id'=>$reqs)));
        $reqs_email = $get_par_email['Member']['email'];
    }
    $count_em = $last->find('count',array('conditions'=>array('parent'=>$parents)));
    if($count_em>2)
    $repss=1;
    ?>
    <input type="hidden" name="recipient_id" value="<?php echo $reqs; ?>" />
    <input type="hidden" name="recipient_email" value="<?php echo $reqs_email;?>" />
    <input type="hidden" name="subject" value="<?php echo $subj; ?>" />
    <br /><input type="submit" name="submit" value="Reply" class="btn btn-primary reg-company replybtn" />&nbsp;
    <?php if(isset($repss)&&$repss>0){?>
    
    &nbsp; <a href="javascript:void(0)" style="height: 6px;padding-bottom: 15px;" class="replyall btn btn-primary">Reply All</a>
    <?php }?>
</form>

</div>
<?php }?>
<script>
$(function(){
    $('#replyform').validate();
    $('.replyall').click(function(){    
    $('#replyform').attr('action','<?php echo $base_url;?>mail/replyall');
    $('.replybtn').click();
   }); 
});
</script>
