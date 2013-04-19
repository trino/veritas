<script type="text/javascript">
    function show_reply()
    {
        $('#reply').show();
    }
</script>

<div id="table">
 <table>

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
</td></tr>
</table>

<a href="javascript:void(0);" onclick="show_reply()" class="btn btn-primary reg-company">Reply</a>


<div id="reply" style="display: none;">
<form action="" method="post">
    <textarea name="reply" rows="10" cols="35" style="height:100px;"></textarea>
    <input type="hidden" name="mail_id" value="<?php if($r['Mail']['parent']) echo $r['Mail']['parent']; else echo $email['Mail']['id']; ?>" />
    <input type="hidden" name="recipient_id" value="<?php echo $email['Mail']['sender_id']; ?>" />
    <input type="hidden" name="recipient_email" value="<?php echo $sender; ?>" />
    <input type="hidden" name="subject" value="<?php echo $email['Mail']['subject']; ?>" />
    <input type="submit" name="submit" value="Reply" class="btn btn-primary reg-company" />
</form>
</div>