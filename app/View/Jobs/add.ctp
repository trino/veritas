<?php include_once('inc.php');?>

<h3 class="page-title">
	Add Job
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/add">Add Job</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $('#Form').validate();
    });
</script>
<div id="table">
<h2>Add Job</h2>
<form action="" method="post" id="Form" enctype="multipart/form-data">
	<table>
<tr><td><label>Job Title</label><input type="text" name="title" class="required" /></td></tr>
<tr><td><label>Job Description</label><input type="text" name="description" class="required" /></td></tr>
<tr><td><label>Image</label><input type="file" name="image" class="required" /></td></tr>
<tr><td><label>Start Date</label><input type="text" name="start_date" id="start_date" class="required" /></td></tr>
<tr><td><label>End Date</label><input type="text" name="end_date" id="end_date" class="required" /></td></tr>
<tr><td><a href="javascript:void(0);" id="add_key"><strong>+ Add Key Contact</strong></a></td></tr>
<tr class="add_more"></tr>
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Add" name="submit"/></td></tr>

</table>
</form>
</div>
<script>
$(function(){
    var add = '<table width="100%"><tr><td>Title</td><td>Phone Number</td><td>Company</td></tr>'+
                '<tr><td><input type="text" name="key_title[]" class="required" /></td>'+
                '<td><input type="text" name="key_number[]" class="required" /></td>'+
                '<td><input type="text" name="key_company[]" class="required" /> <input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" value="Remove"/></td></tr>'+
                '</table>';
   $('#add_key').click(function(){
        $('.add_more').append(add);
   }); 
});
</script>