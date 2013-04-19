<script>
    function check_email()
    {
        //alert('test');
        var email = $('#email').val();
        $.ajax(
        {
            url: '/members/check_email',
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
<h2>Add Member</h2>
<form id="Form" action="" method="post" enctype="multipart/form-data" onsubmit="return valid();">
<table>
<tr><td><label>Full Name</label><input type="text" class="required" name="full_name" /></td></tr>
<tr><td><label>Title</label><input type="text" class="required" name="title" /></td></tr>
<tr><td><label>Address</label><input type="text" class="required" name="address" /></td></tr>
<tr><td><label>Email</label><input type="text" id="email" class="required email" name="email" onchange="check_email()" /><span id="response"></span></td></tr>
<tr><td><label>Image</label><input type="file" class="required" name="image" /></td></tr>
<tr><td><label>Phone</label><input type="text" name="phone" /></td></tr>
<tr><td><label>Password</label><input type="password" class="required" name="password" /></td></tr>
<tr><td><label>Can View</label><input type="checkbox" name="canView" /></td></tr>
<tr><td><label>Can Upload</label><input type="checkbox" name="canUpdate" /></td></tr>
<!-- <div class="checks"><div class="left">Is Supervisor</div><div class="right"><input type="checkbox" name="isSupervisor" /></div><div class="clear"></div></div>
<div class="checks"><div class="left">Is Employee</div><div class="right"><input type="checkbox" name="isEmployee" /></div><div class="clear"></div></div> -->
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Add" name="submit"/></div></td></tr>
</table>
</form>

</div>