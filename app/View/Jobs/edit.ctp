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
<form action="" method="post" id="my_form" enctype="multipart/form-data">
<h2>Job Description</h2>
<table>
<tr><td style="width:140px;"><b>Job Title</b></td><td><input type="text" class="required" name="title" value="<?php echo $j['Job']['title']; ?>" /></td></tr>
<tr><td><b>Job Description</b></td><td><input type="text" class="required" name="description" value="<?php echo $j['Job']['description']; ?>" /></td></tr>
<!-- <div id="image"><?php echo $this->Html->image("uploads/".$j['Job']['image']); ?></div> -->
<input type="hidden" name="img" value="<?php echo $j['Job']['image']; ?>" />
<tr><td><b>Image</b></td><td><input type="file" name="image" class="" /></td></tr>
<tr><td><b>Start Date</b></td><td><input type="text" class="required" name="start_date" id="start_date" value="<?php echo $j['Job']['date_start']; ?>" /></td></tr>
<tr><td><b>End Date</b></td><td><input type="text" class="required" name="end_date" id="end_date" value="<?php echo $j['Job']['date_end']; ?>" /></td></tr>
</table>
</div>

<div id="table">
<h2>Key Contacts</h2>
<table>
<tr><td><?php foreach($keys as $k){ ?>
                <table width="100%">
                <tr><td width="25%"><b>Title</b><br/><input type="text" name="key_title[]" class="required" value="<?php echo $k['Key_contact']['title'];?>" /></td>
                <td width="25%"><b>Phone Number</b><br/><input type="text" name="key_number[]" class="required number" value="<?php echo $k['Key_contact']['phone'];?>" /></td>
                <td width="25%"><b>Company</b><br/><input type="text" name="key_company[]" class="required" value="<?php echo $k['Key_contact']['company'];?>" /> </td><td valign=""> <input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" value="Remove" style="margin-top:20px;"/></td></tr>
                </table>

<?php } ?>
</td></tr>
<tr><td colspan="2"><a href="javascript:void(0);" id="add_key"><strong>+ Add Key Contact</strong></a></td></tr>
<tr><td colspan="2" class="add_more"></td></tr>
</table>
</div>

<div class="submit"><input type="submit" class="btn btn-primary" value="Save Changes" name="submit"/></div>

</form>
<script>
$(function(){
    var add =   '<table width="100%"><tr><td width="25%"><b>Title</b> <br/> <input type="text" name="key_title[]" class="required" /></td>'+
                '<td width="25%"><b>Phone Number</b> <br/> <input type="text" name="key_number[]" class="required number" /></td>'+
                '<td width="25%"><b>Company</b> <br/><input type="text" name="key_company[]" class="required" /> </td><td><input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" value="Remove" style="margin-top:20px;"/></td></tr>'+
                '</table>';
   $('#add_key').click(function(){
        $('.add_more').append(add);
   }); 
});
</script>