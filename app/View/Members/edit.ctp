<?php include_once('inc.php');?>
<script>
$(function(){
   $('#add_form').validate(); 
});
</script>
<h3 class="page-title">
	Edit <?php echo $m['Member']['full_name'];?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members">User Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members/edit/<?php echo $m['Member']['id'];?>">Edit <?php echo $m['Member']['full_name'];?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<div id="table">
<form action="" method="post" id="add_form">
<table>
<tr><td style="width:140px;"><b>Full Name</b></td><td><input type="text" name="full_name" value="<?php echo $m['Member']['full_name'];?>" class="required" /></td></tr>
<tr><td><b>Title</b></td><td><input type="text" name="title" value="<?php echo $m['Member']['title'];?>" class="required" /></td></tr>
<tr><td><b>Address</b></td><td><input type="text" name="address" value="<?php echo $m['Member']['address'];?>" class="required" /></td></tr>
<tr><td><b>Email</b></td><td><input type="text" name="email" value="<?php echo $m['Member']['email'];?>" class="required" /></td></tr>
<tr><td><b>Phone</b></td><td><input type="text" name="phone" value="<?php echo $m['Member']['phone'];?>" /></td></tr>
<tr><td><b>Password</b></td><td><input type="password" name="password" value="<?php echo $m['Member']['password'];?>" class="required" /></td></tr>
<tr><td><b>Can View Files</b></td><td><input type="checkbox" name="canView" <?php if($m['Member']['canView']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><b>Can Upload Files</b></td><td><input type="checkbox" name="canUpdate" <?php if($m['Member']['canUpdate']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><b>Can Send Email</b></td><td><input type="checkbox" name="canEmail" <?php if($m['Member']['canEmail']==1){?>checked="checked"<?php }?> /></td></tr>
<!--<div class="checks"><div class="left">Is Supervisor</div><div class="right"><input type="checkbox" name="isSupervisor" <?php if($m['Member']['isSupervisor']==1){?>checked="checked"<?php }?> /></div><div class="clear"></div></div>
<div class="checks"><div class="left">Is Employee</div><div class="right"><input type="checkbox" name="isEmployee" <?php if($m['Member']['isEmployee']==1){?>checked="checked"<?php }?> /></div><div class="clear"></div></div> -->
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Save Changes" name="submit"/></div></td></tr>
</table>
</form>
</div>