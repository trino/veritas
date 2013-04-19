<script>
function check_pass()
{
    var pass= $('#old_password').val();
    $.ajax({
        url: '/company/check_pass',
        type : 'post',
        data : 'pass='+pass,
        success:function(response)
        {
            if(response=="1")
            {
                $('#response').html('');
            }
            else
            {
                $('#response').html('password donot match');
            }
        }
    });
}
function check()
{
    var val = $('#response').html();
    var em =$('#em_response').html();
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
function check_email()
{
    var email=$('#email').val();
    $.ajax({
        url: '/company/check_email',
        type: 'post',
        data: 'email='+email,
        success:function(response)
        {
            if(response=="1")
            {
                $('#em_response').html('');
            }
            else
                $('#em_response').html('Email Already exists');
        }
    });
}
</script>
<div id="table">
    <h2>Settings</h2>
    <table>
<form id="Form" action="" method="post" onsubmit="return check()" enctype="multipart/form-data">
   <tr><td>Email : <input type="text" name="email" id="email" value="<?php echo $c['Company']['email']; ?>" onchange="check_email()" /><span id="em_response"></span></td></tr>
    <tr><td>Image : <?php echo $this->Html->image('uploads/'.$this->Session->read('image')); ?></td></tr>
           <tr><td>Upload : <input type="file" name="image" /></td></tr>
    <tr><td>Old Password : <input type="password" name="old_password" id="old_password" onchange="check_pass()" /><span id="response"></span></td></tr>
    <tr><td>New Password : <input type="password" name="password" id="password" /></td></tr>
    <tr><td><input type="submit" name="submit" value="Save" class="btn btn-primary" /></td></tr>
</form>
</table>
</div>