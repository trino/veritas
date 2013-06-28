<div class="line">
<div class="messagee">
<h1><?php echo $page['Page']['title']; ?></h1>
<p><?php echo $page['Page']['description']; ?></p>
</div>
</div>

<div class="login">
<div class="signin-form">
	<h1>Login</h1>
<?php echo $this->Session->flash(); ?>
<form action="" method="post">
   <label> Username</label><input type="text" name="username" />
    <label>Password</label><input type="password" name="password" />
    <div  class="log-submit"><input type="submit" name="submit" value="Log In" class="btn btn-primary"/></div>
    <div class="clear"></div>
</form>
</div>
</div>