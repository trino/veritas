<?php include_once('inc.php');?>


<h3 class="page-title">
	Register Company
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>comp">Comapny Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>comp/register">Register Company</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<script>
    function check_email()
    {
        var em=$('#email').val();
        $.ajax({
            url: 'check_email',
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
                    $('#response').html('Email Already exists.');
                }
            }
        });
    }
    function check()
    {
        var val=$('#response').html();
        if(val=="")
            return true;
        else
            return false;
    }
</script>
<div id="table">
<form id="Form" action="" method="post" onsubmit="return check()" enctype="multipart/form-data">
    <table>
<tr><td><label>Full Name</label><input type="text" name="name" class="required" /></td></tr>
<tr><td><label>Company Name</label><input type="text" name="company" class="required" /></td></tr>
<tr><td><label>Email</label><input type="text" name="email" id="email" onchange="check_email()" class="required email" /><span id="response"></span></td></tr>
<tr><td><label>Password</label><input type="password" name="password" id="password" class="required" /></td></tr>
<tr><td><label>confirm password</label><input type="password" name="c_password" class="required" id="c_password" /></td></tr>
<tr><td><label>Phone</label><input type="text" name="phone" /></td></tr>
<tr><td><label>No. of worker</label><input type="text" name="worker" class="required number" /></td></tr>
<tr><td><label>Description</label><textarea style="height:100px;" name="description" rows="10" cols="20" class="required"></textarea></td></tr>
<tr><td><label>Image</label><input type="file" name="image" class="required" /></td></tr>
<tr><td><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td></tr>
</form>
</div>