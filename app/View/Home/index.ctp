<?php include('inc.php');?>
<div class="login">
<h1>V Management - Login</h1>
<form action="" method="post" id="loginform">
<label>Username</label><input type="text" name="un" />
<label>Password</label><input type="password" name="pw" />
<label>Login As</label><select class="loginas"><option value="home">User</option><option value="admin">Admin</option></select> 
<div class="log-submit"><input type="submit" name="submit" value="Login" class="btn btn-primary" />
<div class="clear"></div>
</form>
</div>
<script>
$(function(){
   $('.loginas').change(function(){
    $('#loginform').attr('action','<?php echo $base_url;?>'+$(this).val());
   }); 
});
</script>