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

foreach($all as $a){
    
    if(isset($re_test))
    unset($re_test);
    $j++;
    
    if($a['Mail']['is_replyall']==1){
        if($a['Mail']['is_replyall']==1 && $a['Mail']['date'] == $rep['date'])
        continue;
        else
        {
        $rep['is_replyall'] = 1;
        $rep['date'] = $a['Mail']['date'];
        }    
        }
        else
        $show=1;
    
    
    if($a['Mail']['parent']!=0)
    $parents = $a['Mail']['parent'];
    if($i==0)
    {
      if($this->Session->read('admin'))
      $recc = 0;
      else
      $recc =$this->Session->read('id');  
      $req_arr = $mailing->find('first',array('conditions'=>array('OR'=>array(array('id'=>$mainid),array('parent'=>$mainid),'recipients_id'=>$recc))));
      $reqs = $req_arr['Mail']['sender_id'];
      $sub = $req_arr['Mail']['subject'];
      if($reqs!=0){
      $q1 = $member->find('first',array('condtions'=>array('id'=>$reqs)));
                $reqs_email = $q1['Member']['email'];
                $i++;
                }
                else{
                $q2 = $user->find('first');
            $reqs_email = $q2['User']['email'];
            }
                
      
      /*      if($a['Mail']['sender_id']!=0)
            {
                $reqs = $a['Mail']['sender_id'];
                $sub = $a['Mail']['subject'];
                $q1 = $member->find('first',array('condtions'=>array('id'=>$reqs)));
                $reqs_email = $q1['Member']['email'];
                $i++;
            }
            
      
        else
        {
            $sub = $a['Mail']['subject'];
            $reqs = 0;
            $q2 = $user->find('first');
            $reqs_email = $q2['User']['email'];
        }*/
    }
    ?>
    <table id="span<?php echo $j;?>" class="clickable">
    <tr class="show"><td> <b>Sent By:</b> <?php if($a['Mail']['sender_id']=='0')echo 'Admin';else{
        $qs = $member->find('first',array('conditions'=>array('id'=>$a['Mail']['sender_id'])));
        if($qs)
        echo $qs['Member']['full_name'];
        else
        echo "Member Deleted";
        
    } ?> &nbsp; [<?php echo $a['Mail']['date'];?>] &nbsp; ( <strong>To</strong> : <?php if($a['Mail']['recipients_id']=='0'){echo 'Admin';$re_test[] = 'Admin';}else{
        $qs2 = $member->find('first',array('conditions'=>array('id'=>$a['Mail']['recipients_id'])));
        if($qs2){
        echo $qs2['Member']['full_name'];
        $re_test[] = $qs2['Member']['full_name'];
        
        }
        else
        echo "Member Deleted";
        
    }
    $repss=0;
    if($a['Mail']['parent']==0)
        {
            $replies = $mailing->find('all',array('conditions'=>array('parent'=>0,'subject'=>$a['Mail']['subject'],'message'=>$a['Mail']['message'],'date'=>$a['Mail']['date'])));
            if($replies)
            {
                if(isset($qs2))
                unset($qs2);
                //$re_test = array();
                foreach($replies as $reps)
                {
                    
                    if($reps['Mail']['recipients_id']==0)
                    $qs2['Member']['full_name'] = 'Admin';
                    else 
                    $qs2 = $member->find('first',array('conditions'=>array('id'=>$reps['Mail']['recipients_id'])));
                    
                    if($qs2){
                    
                    if(!in_array($qs2['Member']['full_name'],$re_test)){
                        $repss++;
                    $re_test[] = $qs2['Member']['full_name'];
                    echo ', '.$qs2['Member']['full_name'];}}   
                }
            }
        }
        else
        {
            $replies = $mailing->find('all',array('conditions'=>array('subject'=>$a['Mail']['subject'],'message'=>$a['Mail']['message'],'date'=>$a['Mail']['date'],'sender_id'=>$a['Mail']['sender_id'])));
            if($replies)
            {
                //$re_test = array();
                if(isset($qs2))
                unset($qs2);
                
                foreach($replies as $reps)
                {
                    
                    if($reps['Mail']['recipients_id']==0)
                    $qs2['Member']['full_name'] = 'Admin';
                    else 
                    $qs2 = $member->find('first',array('conditions'=>array('id'=>$reps['Mail']['recipients_id'])));
                    if($qs2){
                        
                    if(!in_array($qs2['Member']['full_name'],$re_test)){
                        $repss++;
                    $re_test[] = $qs2['Member']['full_name'];    
                    echo ', '.$qs2['Member']['full_name'];}}   
                }
            }
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
            if($_SERVER['SERVER_NAME']=='localhost')
            $url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas/img/documents/'.$doc;
            else
            $url = 'http://'.$_SERVER['SERVER_NAME'].'/img/documents/'.$doc;
            $path = "https://docs.google.com/viewer?url=".$url;
            $path = $base_url.'uploads/download/'.$doc;
            ?>
            <tr><td><strong><?php echo $doc;?></strong>&nbsp; &nbsp; <a href="<?php echo $path;?>">Download</a></td></tr>
            <?php
        }
        else
        if(in_array($ext,$ext_img))
        {
            ?>
            <tr><td><strong><?php echo $doc;?></strong>&nbsp; &nbsp; <a href="<?php echo $base_url;?>img/documents/<?php echo $doc; ?>" rel="prettyPhoto[gallery1]"><?php echo $this->Html->image('documents/'.$doc,array('width'=>'100','height'=>'100')); ?></a></td></tr>
            <?php
        }
        else
        {
            ?>
            <tr><td><strong><?php echo $doc;?></strong>&nbsp; &nbsp; 
            <a href="javascript:void(0);" onclick="video(this.id)" id="<?php echo $doc; ?>">View</a> </div>
            </td></tr>
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
    
}
if(!isset($parents))
$parents = $a['Mail']['id'];
?>
</table>



<div id="myElement"></div>
                <script type="text/javascript">
                    function video(value)
                    {
                        jwplayer("myElement").setup({
                        file: "<?php echo $base_url;?>img/documents/"+value,
                        image: "<?php echo $base_url;?>img/documents/ZaideesVID-Clip1.flv"
                    });
                    }
                    
                </script>
                <?php if(!isset($_GET['sent'])){?>
<div id="reply" style="padding:15px;">
<form action="" method="post" id="replyform">
    <textarea name="reply" style="height:100px;width:420px;" class="required"></textarea>
    <input type="hidden" name="mail_id" value="<?php echo $parents;?>" />
    <input type="hidden" name="recipient_id" value="<?php echo $reqs; ?>" />
    <input type="hidden" name="recipient_email" value="<?php echo $reqs_email;?>" />
    <input type="hidden" name="subject" value="<?php echo $sub; ?>" />
    <br /><input type="submit" name="submit" value="Reply" class="btn btn-primary reg-company replybtn" />&nbsp;
    <?php if(isset($repss)&&$repss>0){?>
    
    &nbsp; <a href="javascript:void(0)" style="height: 6px;padding-bottom: 15px;" class="replyall btn btn-primary">Reply All</a>
    <?php }?>
</form>
<?php
/*
<form action="" method="post">
    <textarea name="reply" rows="10" cols="35" style="height:100px;"></textarea>
    <input type="hidden" name="mail_id" value="<?php if($email['Mail']['parent']) echo $r['Mail']['parent']; else echo $email['Mail']['id']; ?>" />
    <input type="hidden" name="recipient_id" value="<?php echo $email['Mail']['sender_id']; ?>" />
    <input type="hidden" name="recipient_email" value="<?php echo $sender; ?>" />
    <input type="hidden" name="subject" value="<?php echo $email['Mail']['subject']; ?>" />
    <input type="submit" name="submit" value="Reply" class="btn btn-primary reg-company" />
</form>
*/?>
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
/*
$(function(){
    
   $('.clickable tr').hide();
   $('.clickable').css('background','#e5e5e5');
   $('.clickable').css('display','block');
   $('.clickable').css('border-radius','5px');
   $('.clickable').css('padding','10px');
   $('.clickable').css('cursor','pointer');
   $('.show').show();   
   $('#span<?php echo $j;?> tr').show(); 
   $('#span<?php echo $j;?>').css('background','none');
   $('.clickable').toggle(
   function(){
    var di = $(this).attr('id');
    $('#'+di+ ' tr').show();
    $(this).css('background','none');
   },
   function(){
    var di = $(this).attr('id');
    $('#'+di+ ' tr').hide();
    $('.show').show();
    $(this).css('background','#e5e5e5');
   }
   );
});*/
</script>
