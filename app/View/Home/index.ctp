<?php include('inc.php');?>
<div class="login">
<h2>Login</h2>
<form action="<?php echo $base_url."admin";if(isset($_GET['mail']))echo "/?mail=".$_GET['mail'];elseif(isset($_GET['upload']))echo "/?upload=".$_GET['upload']?>" method="post" id="loginform">
<label>Username</label><input type="text" name="un" />
<label>Password</label><input type="password" name="pw" />
<!--<label>Login As</label>
<select class="loginas">
<option value="home">User</option>
<option value="admin">Admin</option>
</select> -->
<div class="log-submit">

<style>
#flashMessage,.message{
width:100%;
margin:0px;
border:0px; padding:0px; background-color:#ffffff;
text-align:center; color:#ff0000; font-style:italic;  padding-bottom:10px; font-size:12px;
}
</style>

<?php echo $this->Session->flash(); ?>

<input type="submit" name="submit" value="Login" class="btn btn-primary" />



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