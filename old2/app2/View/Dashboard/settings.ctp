<div>
    <form action="" method="post">
    <label for="username">Email</label><input type="text" name="username" class="required email" value="<?php echo $value['User']['username']; ?>" /><br />
    <label for="password">New Password</label><input type="password" name="password" id="password" /><br />
    <label for="conf_password">Confirm Password</label><input type="password" name="conf_password" id="conf_password" /><br />
    <input type="submit" name="submit" value="Save" />
    </form>
</div>