<?php include_once('inc.php');?>

<h3 class="page-title">
	Add User
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members">User Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members/add">Add User</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<script>
 $(document).ready(function(){
     $('#my_form').validate({
    rules: {
            password: 'required',
            c_password: {
                  required: true,
                  equalTo: '#password'
            }
      }
 });  
     });
    function check_email()
    {
        //alert('test');
        var email = $('#email').val();
        $.ajax(
        {
            url: 'check_email',
            type: 'post',
            data: 'email='+email,
            success:function(response)
            {
                if(response=="1")
                {
                    $('#response').html('Email already exits');
                }
                else
                {
                    $('#response').html('');
                }
            }
        });
    }
    function valid()
    {
        var val=$('#response').html();
        if(val=="")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
<div id="table">
<form id="my_form" action="" method="post" enctype="multipart/form-data" onsubmit="return valid();">
<table>
<tr><td style="width:140px;"><b>Full Name</b></td><td><input type="text" class="required" name="full_name" /></td></tr>
<tr><td><b>Title</b></td><td><input type="text" class="required" name="title" /></td></tr>
<tr><td><b>Address</b></td><td><input type="text" class="required" name="address" /></td></tr>
<tr><td><b>Email</b></td><td><input type="text" id="email" class="required email" name="email" onchange="check_email()" /><span id="response"></span></td></tr>
<tr><td><b>Image</b></td><td><input type="file" class="required" name="image" /></td></tr>
<tr><td><b>Phone</b></td><td><input type="text" name="phone" /></td></tr>
<tr><td><b>Password</b></td><td><input type="password" class="required" name="password" /></td></tr>
<tr><td><b>Can View Files</b></td><td><input type="checkbox" name="canView" /></td></tr>
<tr><td><b>Can Upload Files</b></td><td><input type="checkbox" name="canUpdate" /></td></tr>
<tr><td><b>Can Send Email</b></td><td><input type="checkbox" name="canEmail" /></td></tr>
<!-- <div class="checks"><div class="left">Is Supervisor</div><div class="right"><input type="checkbox" name="isSupervisor" /></div><div class="clear"></div></div>
<div class="checks"><div class="left">Is Employee</div><div class="right"><input type="checkbox" name="isEmployee" /></div><div class="clear"></div></div> -->
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Add User" name="submit"/></div></td></tr>
</table>
</form>

</div>