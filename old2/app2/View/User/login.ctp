<?php if(isset($msg))echo $msg; ?>
<form action="/ads/user/login" method="post">
    <label>Username :</label> <input type="text" name="username"  /><div class="clear"></div>
    <label>Password :</label> <input type="password" name="password" /><div class="clear"></div>
    <input type="submit" class="btn btn-success floatright" name="submit" value="Log In" /> <?php echo $this->Html->link('forget password','/home/forget_password'); ?>
</form>
<div class="clear"></div>