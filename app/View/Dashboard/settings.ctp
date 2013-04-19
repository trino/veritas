<?php 
    if($this->Session->read('avatar'))
    {
        $email = $user['User']['email'];
        $password = $user['User']['password'];
        $name = $user['User']['name_avatar'];
        $image = $user['User']['picture'];
    }
    else
    {
        $email = $user['Member']['email'];
        $password = $user['Member']['password'];
        $name = $user['Member']['full_name'];
        $image = $user['Member']['image'];
    }
?>
<script type="text/javascript">
function check()
{
    var pass = $('#old_password').val();
    $.ajax({
        
        url : '/dashboard/check_password',
        type: 'post',
        data: 'pass='+pass,
        success:function(data)
        {
            if(data=="1")
            {
                $('#response').html('');
            }
            else
            {
                $('#response').html('Password do not match');
            }
        }
    });
}

function check_email()
{
    var email=$('#email').val();
    $.ajax({
        url: '/dashboard/check_email',
        type: 'post',
        data: 'email='+email,
        success:function(response)
        {
            if(response=='1')
                $('#email_response').html('');
            else
                $('#email_response').html('Email Already Exists.');
        }
    });
}
function checks()
{
    var val=$('#response').html();
    var em=$('#email_response').html();
    if(val=="")
    {
        if(em=="")
            return true;
        else
            return false;
    }
        
    else
        return false;
}
</script>
<div id="table">
    <form action="" method="post" id="Form" onsubmit="return checks();" enctype="multipart/form-data">
        <table>
       <tr><td><label>Name</label><input type="text" name="name" value="<?php echo $name ?>" class="required" /></td></tr>
        <tr><td><label>Email</label><input type="text" name="email" value="<?php echo $email; ?>" id="email" class="required email" onchange="check_email();" /><span id="email_response"></span></td></tr>
        <tr><td><label>Image</label><?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => ''))?></td></tr>
        <tr><td><label>New Image</label><input type="file" name="image"  /><br />
        <tr><td><label>Old password</label><input type="password" name="old_password" id="old_password" class="required" onchange="check();" /><span id="response"></span></td></tr>
       <tr><td><label> New Password </label><input type="password" name="password" class="required" /></td></tr>
        <?php 
            if(!$this->Session->read('avatar'))
            { ?>
                <tr><td><label>Address</label><input type="text" name="address" value="<?php echo $user['Member']['address']; ?>" class="required" /></td></tr>
               <tr><td><label>Phone </label><input type="text" name="phone" value="<?php echo $user['Member']['phone']; ?>" class="required" /></td></tr>
            <?php }
        ?> 
        <tr><td><input type="submit" name="submit" value="Save" class="btn btn-primary" /></td></tr>
    </table>
    </form>
</div>