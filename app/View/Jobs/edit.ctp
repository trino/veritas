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
    $('#my_form').validate();
    });
</script>
<div id="table">
<h2>Edit Job</h2>
<form action="" method="post" id="my_form" enctype="multipart/form-data">
<table>
<tr><td><label>Job Title</label><input type="text" class="required" name="title" value="<?php echo $j['Job']['title']; ?>" /></td></tr>
<tr><td><label>Job Description</label><input type="text" class="required" name="description" value="<?php echo $j['Job']['description']; ?>" /></td></tr>
<!-- <div id="image"><?php echo $this->Html->image("uploads/".$j['Job']['image']); ?></div> -->
<input type="hidden" name="img" value="<?php echo $j['Job']['image']; ?>" />
<tr><td><label>Image</label><input type="file" name="image" class="" /></td></tr>
<tr><td><label>Start Date</label><input type="text" class="required" name="start_date" id="start_date" value="<?php echo $j['Job']['date_start']; ?>" /></td></tr>
<tr><td><label>End Date</label><input type="text" class="required" name="end_date" id="end_date" value="<?php echo $j['Job']['date_end']; ?>" /></td></tr>
<tr><td><a href="javascript:void(0);" id="add_key"><strong>+ Add Key Contact</strong></a></td></tr>
<tr class="add_more"></tr>
<tr><?php foreach($keys as $k){ ?>
                <table width="100%"><tr><td>Title</td><td>Phone Number</td><td>Company</td></tr>
                <tr><td><input type="text" name="key_title[]" class="required" value="<?php echo $k['Key_contact']['title'];?>" /></td>
                <td><input type="text" name="key_number[]" class="required number" value="<?php echo $k['Key_contact']['phone'];?>" /></td>
                <td><input type="text" name="key_company[]" class="required" value="<?php echo $k['Key_contact']['company'];?>" /> <input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" value="Remove"/></td></tr>
                </table>

<?php } ?>

</tr>
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Edit" name="submit"/></div></td></tr>
</table>
</form>
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