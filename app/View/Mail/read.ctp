<script type="text/javascript">
    function show_reply()
    {
        $('#reply').show();
    }
</script>

<div id="table">
 <table>
<?php 
$i=0;
foreach($all as $a){
    if($a['Mail']['parent']!=0)
    $parents = $a['Mail']['parent'];
    if($i==0)
    {
        if($this->Session->read('admin'))
        {
            if($a['Mail']['sender_id']!=0)
            {
                $reqs = $a['Mail']['sender_id'];
                $sub = $a['Mail']['subject'];
                $q1 = $member->find('first',array('condtions'=>array('id'=>$reqs)));
                $reqs_email = $q1['Member']['email'];
                $i++;
            }
            
        }
        else
        {
            $sub = $a['Mail']['subject'];
            $reqs = 0;
            $q2 = $user->find('first');
            $reqs_email = $q2['User']['email'];
        }
    }
    ?>
    <tr><td><label>Sent By:</label> <?php if($a['Mail']['sender_id']=='0')echo 'Admin';else{
        $qs = $member->find('first',array('conditions'=>array('id'=>$a['Mail']['sender_id'])));
        echo $qs['Member']['full_name'];
        
    } ?></td></tr>
    <tr><td><label>Subject :</label><?php echo $a['Mail']['subject']; ?></td></tr>
    <tr><td><label>Message:</label><?php echo $a['Mail']['message']; ?></td></tr>
    <tr><td><hr /></td></tr>

    <?php
    
}
if(!isset($parents))
$parents = $a['Mail']['id'];
/*
?>

<tr><td><label>Sent By:</label><b><?php echo $name; ?></b> <?php echo $sender; ?></td></tr>
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