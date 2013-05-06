<?php include_once('inc.php');?>

<h3 class="page-title">
	User Preference
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>dashboard/settings">User Preference</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<?php 
    if($this->Session->read('avatar'))
    {
        $email = $user['User']['email'];
        $password = $user['User']['password'];
        $name = $user['User']['name_avatar'];
        $image = $user['User']['picture'];
    }
    else
    {
        $email = $user['Member']['email'];
        $password = $user['Member']['password'];
        $name = $user['Member']['full_name'];
        $image = $user['Member']['image'];
    }
?>

<script>
$(function(){
   $('#passw').val('');
   $('#old_password').val('');  
   
});
</script>
<div id="table">
    <form action="" method="post" id="myform" enctype="multipart/form-data">
        <table>
       <tr><td><label>Name</label><input type="text" name="name" value="<?php echo $name ?>" class="required" /></td></tr>
        <tr><td><label>Email</label><input type="text" name="email" value="<?php echo $email; ?>" id="email" class="required email" /><span id="email_response"></span></td></tr>
        <tr><td><label>Image</label><?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => ''))?></td></tr>
        <tr><td><label>New Image</label><input type="file" name="image"  /><br />
        <tr><td><label>Old password</label><input type="password" name="old_password" id="old_password" class=""  /><span id="response"></span></td></tr>
       <tr><td><label> New Password </label><input type="password" id="passw" name="password" class="" /></td></tr>
        <?php 
            if(!$this->Session->read('avatar'))
            { ?>
                <tr><td><label>Address</label><input type="text" name="address" value="<?php echo $user['Member']['address']; ?>" class="required" /></td></tr>
               <tr><td><label>Phone </label><input type="text" name="phone" value="<?php echo $user['Member']['phone']; ?>" class="required" /></td></tr>
            <?php }
        ?> 
        <tr><td><input type="submit" name="submit" value="Save" class="btn btn-primary" /></td></tr>
    </table>
    </form>
</div>