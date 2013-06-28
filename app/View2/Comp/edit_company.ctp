<?php include_once('inc.php');?>


<h3 class="page-title">
	Edit <?php echo $company['Company']['full_name']; ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>comp">Comapny Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>comp/edit_company/<?php echo $company['Company']['id']; ?>">Edit <?php echo $company['Company']['full_name']; ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<div id="table">
<form id="Form" action="" method="post" enctype="multipart/form-data">
	<table>
<tr><td><label>Full Name</label><input type="text" name="name" class="required" value="<?php echo $company['Company']['full_name']; ?>" /></td></tr>
<tr><td><label>Company Name</label><input type="text" name="company" class="required" value="<?php echo $company['Company']['company']; ?>" /></td></tr>
<tr><td><label>Phone</label><input type="text" name="phone" value="<?php echo $company['Company']['phone']; ?>" /></div><div class="clear"></td></tr>
<tr><td><label>No. of worker</label><input type="text" name="worker" value="<?php echo $company['Company']['no_of_worker'] ?>" class="required number" /></td></tr>
<tr><td><label>Description</label><textarea name="description" rows="10" cols="35" style="height:100px;"><?php echo $company['Company']['description']; ?></textarea></td></tr>
<tr><td><label>Image</label><input type="hidden" name="old_image" value="<?php echo $company['Company']['image']; ?>" /><?php echo $this->Html->image('uploads/'.$company['Company']['image']); ?></td></tr>
<tr><td><input type="file" name="image" /></td></tr>
<tr><td><input type="submit" class="btn btn-primary" name="submit" value="Submit" /></td></tr>
</table>
</form>
</div>