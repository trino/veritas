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
        //$avatar = $user['User']['name_avatar'];
    }
    else
    {
        $email = $user['Member']['email'];
        $password = $user['Member']['password'];
        $name = $user['Member']['full_name'];
        $image = $user['Member']['image'];
        //$avatar = $user['User']['name_avatar'];
    }
?>

<script>
$(function(){
   $('#passw').val('');
   $('#old_password').val('');
   $('#myform').validate();
   $('#old_password').keypress(function(){
    if($(this).val() == '')
    {
        $('#passw').removeClass('required');
    }
    else
    {
        if($('#passw').attr('class').replace('required','') == $('#passw').attr('class'))
        $('#passw').addClass('required');
    }
    
   });  
   $('#old_password').change(function(){
    if($(this).val() == '')
    {
        $('#passw').removeClass('required');
    }    
   });
   $('#passw').change(function(){
    $('#passw').removeClass('error');
   });
   
});
</script>
<div id="table">
    <form action="" method="post" id="myform" enctype="multipart/form-data">
        <table>
       <tr><td style="width:140px;"><b>Name</b></td><td><input type="text" name="name" value="<?php echo $name ?>" class="required" /></td></tr>
        <!--<tr><td><b>Avatar</b></td><td><input type="text" name="avatar" value="<?php echo $avatar;?>"  /><br />-->
        <tr><td><b>Email</b></td><td><input type="text" name="email" value="<?php echo $email; ?>" id="email" class="required email" /><span id="email_response"></span></td></tr>
        <tr><td><b>Image</b></td><td><?php echo $this->Html->image('uploads/'.$this->Session->read('image'), array('alt' => ''))?></td></tr>
        <tr><td><b>New Image</b></td><td><input type="file" name="image"  /><br />
        <tr><td><b>Old password</b></td><td><input type="password" name="old_password" id="old_password" class=""  /><span id="response"></span></td></tr>
       <tr><td><b> New Password </b></td><td><input type="password" id="passw" name="password" class="" /></td></tr>
        <?php 
            if(!$this->Session->read('avatar'))
            { ?>
                <tr><td><b>Address</b></td><td><input type="text" name="address" value="<?php echo $user['Member']['address']; ?>" class="required" /></td></tr>
               <tr><td><b>Phone </b></td><td><input type="text" name="phone" value="<?php echo $user['Member']['phone']; ?>" class="required" /></td></tr>
            <?php }
        ?> 
        <tr><td><input type="submit" name="submit" value="Save Changes" class="btn btn-primary" onclick="if($('#old_password').val() != '' && $('#passw').val() == ''){$('#passw').addClass('error');return false;}else return true;" /></td></tr>
    </table>
    </form>
</div>