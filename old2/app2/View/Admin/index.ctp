<?php 
    if(isset($msg))
    {
        echo $msg;
    }
?>
<div id="wrap">
    <div class="container-fluid">
        <div class="login">
        <form action="" method="post">
            <h1>Admin Panel</h1>
            <div class="border">
            <label for="username">User Name</label><input type="text" name="username" /><br />
            <label for="password">Password</label><input type="password" name="password" /><br />
            <input type="submit" class="btn btn-success" name="submit" value="Log In" />
            </div>
        </form>
    </div>
    </div>
</div>
