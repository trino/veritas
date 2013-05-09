<script>
    function check_email()
    {
        var em=$('#email').val();
        $.ajax({
            url: '/ads/home/check_email',
            type: 'post',
            data: 'em='+em,
            success:function(response)
            {
                if(response=="1")
                {
                    $('#response').html('');
                }
                else
                {
                    $('#response').html('Email Already Exists');
                }
            } 
        });
    }
    
    function check_pass()
    {
        var pw=$('#pw').val();
        $.ajax({
            url: '/ads/user/check_pass',
            type: 'post',
            data: 'pw='+pw,
            success:function(response)
            {
                 if(response=="1")
                {
                    $('#pw_response').html('');
                }
                else
                {
                    $('#pw_response').html('Password donot match.');
                }
            }
        });
    }
    function check()
    {
        var val = $('#response').html();
        var pw = $('#pw_response').html();
        if(val=="")
        {
            if(pw=="")
                return true;
            else
                return false;
        }  
        else
            return false;
    }
</script>
<div id="contents">
<div class="setting_inner">
<div class="heading" style="height: 20px;">
<h1>Account Settings</h1>
</div>
<form action="" method="post" id="Form" onsubmit="return check()">
<p>Email : </p> <input type="text" name="email" class="required email" id="email" value="<?php echo $this->Session->read('user'); ?>" /><span id="response"></span><div class="clear"></div>
<p>Old Password : </p><input type="password" name="old_password" id="pw" onchange="check_pass()" class="required"  /><span id="pw_response"></span><div class="clear"></div>
<p>New Password : </p><input type="text" name="password" class="required" /><div class="clear"></div>
<input type="submit" class="btn" name="submit" value="Save" />
</form>
<div class="clear"></div>
</div>
</div>