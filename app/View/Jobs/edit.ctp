<?php include_once('inc.php');?>


<h3 class="page-title">
	Edit <?php echo $j['Job']['title']; ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/edit/<?php echo $j['Job']['id']; ?>">Edit <?php echo $j['Job']['title']; ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    });
</script>
<div id="table">
<h2>Edit Job</h2>
<form action="" method="post" id="add_form" enctype="multipart/form-data">
<table>
<tr><td><label>Job Title</label><input type="text" name="title" value="<?php echo $j['Job']['title']; ?>" /></td></tr>
<tr><td><label>Job Description</label><input type="text" name="description" value="<?php echo $j['Job']['description']; ?>" /></td></tr>
<!-- <div id="image"><?php echo $this->Html->image("uploads/".$j['Job']['image']); ?></div> -->
<input type="hidden" name="img" value="<?php echo $j['Job']['image']; ?>" />
<tr><td><label>Image</label><input type="file" name="image" /></td></tr>
<tr><td><label>Start Date</label><input type="text" name="start_date" id="start_date" value="<?php echo $j['Job']['date_start']; ?>" /></td></tr>
<tr><td><label>End Date</label><input type="text" name="end_date" id="end_date" value="<?php echo $j['Job']['date_end']; ?>" /></td></tr>
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Edit" name="submit"/></div></td></tr>
</table>
</form>