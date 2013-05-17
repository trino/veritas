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
    $('#my_form').validate();
    });
</script>
<div id="table">
<form action="" method="post" id="my_form" enctype="multipart/form-data">
	<table>
<tr><td style="width:140px;"><b>Job Title</b></td><td><input type="text" name="title" class="required" /></td></tr>
<tr><td><b>Job Description</b></td><td><textarea name="description" class="required" ></textarea></td></tr>
<tr><td><b>Image</b></td><td><input type="file" name="image" class="" /></td></tr>
<tr><td><b>Start Date</b></td><td><input type="text" name="start_date" id="start_date" class="required" /></td></tr>
<tr><td><b>End Date</b></td><td><input type="text" name="end_date" id="end_date" class="required" /></td></tr>
<tr><td colspan="2"><a href="javascript:void(0);" id="add_key"><strong>+ Add Key Contact</strong></a></td></tr>
<tr><td colspan="2" class="add_more"></td></tr>
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Add Job" name="submit"/></td></tr>

</table>
</form>
</div>
<script>
$(function(){
    var add =   '<table width="100%"><tr><td><b>Name</b><br/> <input type="text" name="key_name[]" class="required" style="width: 100px;" /></td>'+
                '<td><b>Title</b><br/> <input type="text" name="key_title[]" class="required" style="width: 100px;" /></td>'+
                '<td><b>Cell Number</b><br/> <input type="text" name="key_cell[]" class="required number" style="width: 100px;" /></td>'+
                '<td><b>Phone Number</b><br/> <input type="text" name="key_number[]" class="required number" style="width: 100px;" /></td>'+
                '<td><b>Email</b><br/> <input type="text" name="key_email[]" class="required email" style="width: 100px;" /></td>'+
                '<td><b>Company</b><br/> <input type="text" name="key_company[]" class="required" style="width: 100px;" /> </td><td><input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" style="margin-top:20px;" value="Remove"/></td></tr>'+
                '</table>';
   $('#add_key').click(function(){
        $('.add_more').append(add);
   }); 
});
</script>