<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    });
</script>
<div id="table">
<h2>Add Job</h2>
<form action="" method="post" id="Form" enctype="multipart/form-data">
	<table>
<tr><td><label>Title</label><input type="text" name="title" class="required" /></td></tr><tr><td><label>Job Description</label><input type="text" name="description" class="required" /></td></tr>
<tr><td><label>Image</label><input type="file" name="image" class="required" /></td></tr>
<tr><td><label>Start Date</label><input type="text" class="required" name="start_date" id="start_date" /></td></tr>
<tr><td><label>End Date</label><input type="text" class="required" name="end_date" id="end_date" /></td></tr>
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Add" name="submit"/></td></tr>
</form>
</table>
</div>