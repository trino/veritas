<?php include_once('inc.php');?>

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
foreach($all as $a){
    $j++;
    if($a['Mail']['parent']!=0)
    $parents = $a['Mail']['parent'];
    if($i==0)
    {
       // if($this->Session->read('admin'))
        //{
            if($a['Mail']['sender_id']!=0)
            {
                $reqs = $a['Mail']['sender_id'];
                $sub = $a['Mail']['subject'];
                $q1 = $member->find('first',array('condtions'=>array('id'=>$reqs)));
                $reqs_email = $q1['Member']['email'];
                $i++;
            }
            
        //}
        else
        {
            $sub = $a['Mail']['subject'];
            $reqs = 0;
            $q2 = $user->find('first');
            $reqs_email = $q2['User']['email'];
        }
    }
    ?>
    <table id="span<?php echo $j;?>" class="clickable">
    <tr class="show"><td> <b>Sent By:</b> <?php if($a['Mail']['sender_id']=='0')echo 'Admin';else{
        $qs = $member->find('first',array('conditions'=>array('id'=>$a['Mail']['sender_id'])));
        echo $qs['Member']['full_name'];
        
    } ?> &nbsp; [<?php echo $a['Mail']['date'];?>] &nbsp; ( <strong>To</strong> : <?php if($a['Mail']['recipients_id']=='0')echo 'Admin';else{
        $qs2 = $member->find('first',array('conditions'=>array('id'=>$a['Mail']['recipients_id'])));
        echo $qs2['Member']['full_name'];
        
    } ?> )</td></tr>
    <tr><td><?php echo $a['Mail']['message']; ?></td></tr>
    <tr><td>&nbsp;</td></tr>
    </table>
    <?php
    
}
if(!isset($parents))
$parents = $a['Mail']['id'];
/*
?>

<tr><td><label>Sent By:</label><b><?php echo $name; ?></b> <?php echo $sender; ?> </td></tr>
<tr><td><label>Subject :</label><?php echo $email['Mail']['subject']; ?></td></tr>
<tr><td><label>Message:</label><?php echo $email['Mail']['message']; ?></td></tr>
<tr><td>
    <?php
        foreach($reply as $r)
        {
            if($r['Mail']['sender_id']=='0')
            {
                echo "Sent By : <b>Admin</b>";
            }
            else
            {
                foreach($member as $m)
                {
                    if($m['Member']['id']==$r['Mail']['sender_id'])
                    {
                        echo "Sent By : <b>".$m['Member']['full_name']."</b>";
                    }
                }    
            }
            echo "<br>Message ".$r['Mail']['message']."<br>";
        }
    ?>
</td></tr>*/
?>
</table>

<a href="javascript:void(0);" onclick="show_reply()" class="btn btn-primary reg-company">Reply</a>


<div id="reply" style="display: none;">
<form action="" method="post">
    <textarea name="reply" rows="10" cols="35" style="height:100px;"></textarea>
    <input type="hidden" name="mail_id" value="<?php echo $parents;?>" />
    <input type="hidden" name="recipient_id" value="<?php echo $reqs; ?>" />
    <input type="hidden" name="recipient_email" value="<?php echo $reqs_email; ?>" />
    <input type="hidden" name="subject" value="<?php echo $sub; ?>" />
    <input type="submit" name="submit" value="Reply" class="btn btn-primary reg-company" />
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
<script>
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
});
</script>
