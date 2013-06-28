<?php include_once('inc.php');?>


<h3 class="page-title">
	Edit <?php echo stripslashes($j['Job']['title']); ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/edit/<?php echo $j['Job']['id']; ?>">Edit <?php echo stripslashes($j['Job']['title']); ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $('#my_form').validate();
    });
</script>
<form action="" method="post" id="my_form" enctype="multipart/form-data">
<div id="table">
<h2>Job Description</h2>
<table>
<tr><td style="width:140px;"><b>Job Title</b></td><td><input type="text" class="required" name="title" value="<?php echo $j['Job']['title']; ?>" /></td></tr>
<tr><td><b>Job Description</b></td><td><textarea name="description" class="required" ><?php echo $j['Job']['description']; ?></textarea></td></tr>
 
<input type="hidden" name="img" value="<?php echo $j['Job']['image']; ?>" />
<tr><td><b>Image</b></td><td><input type="file" name="image" class="" /> <?php echo $this->Html->image("uploads/".$j['Job']['image']); ?></td></tr>
<tr><td><b>Start Date</b></td><td><input type="text" class="" name="start_date" id="start_date" value="<?php echo $j['Job']['date_start']; ?>" /></td></tr>
<tr><td><b>End Date</b></td><td><input type="text" class="" name="end_date" id="end_date" value="<?php echo $j['Job']['date_end']; ?>" /></td></tr>
</table>
</div>

<div id="table">
<h2>Contacts</h2>
<table>
<tr><td><?php foreach($keys as $k){ ?>
                <table width="100%">
                <tr>
                    <td>Contacts Type</td>
                    <td colspan="3"><select name="type[]" class="required">
                            <option value="">Select Type</option>
                            <option value="0"<?php if($k['Key_contact']['type']=='0')echo "Selected='selected'";?>>Key Contacts</option>
                            <option value="1"<?php if($k['Key_contact']['type']=='1')echo "Selected='selected'";?>>Staff Contacts</option>
                            <option value="2"<?php if($k['Key_contact']['type']=='2')echo "Selected='selected'";?>>Third Part Contacts</option>
                        </select>
                    </td>
                </tr>
                <tr>
                
                <td><b>Name</b><br/><input type="text" name="key_name[]" class="" value="<?php echo $k['Key_contact']['name'];?>" style="width: 100px;" /></td>
                <td><b>Title</b><br/><input type="text" name="key_title[]" class="" value="<?php echo $k['Key_contact']['title'];?>" style="width: 100px;" /></td>
                <td><b>Cell Number</b><br/><input type="text" name="key_cell[]" class="" value="<?php echo $k['Key_contact']['cell'];?>" style="width: 100px;" /></td>
                <td><b>Phone Number</b><br/><input type="text" name="key_number[]" class="" value="<?php echo $k['Key_contact']['phone'];?>" style="width: 100px;" /></td>
                <td><b>Email</b><br/><input type="text" name="key_email[]" class="email" value="<?php echo $k['Key_contact']['email'];?>" style="width: 100px;" /></td>
                <td><b>Company</b><br/><input type="text" name="key_company[]" class="" value="<?php echo $k['Key_contact']['company'];?>" style="width: 100px;" /> </td><td valign=""> <input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" value="Remove" style="margin-top:20px;"/></td></tr>
                </table>

<?php } ?>
</td></tr>
<tr><td colspan="2" class="add_more"></td></tr>
<tr><td colspan="2"><a href="javascript:void(0);" id="add_key"><strong>+ Add Contact</strong></a></td></tr>

</table>
</div>

<div class="submit"><input type="submit" class="btn btn-primary" value="Save Changes" name="submit"/></div>

</form>
<script>
$(function(){
    var add =   '<table width="100%"><tr><td>Contact Type</td><td colspan="3"><select name="type[]" class="required">'+
                '<option value="">Select Type</option><option value="0">Key Contacts</option><option value="1">Staff Contacts</option>'+
                '<option value="2">Third Part Contacts</option></select></td></tr>'+
                '<tr><td><b>Name</b><br/> <input type="text" name="key_name[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Title</b><br/> <input type="text" name="key_title[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Cell Number</b><br/> <input type="text" name="key_cell[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Phone Number</b><br/> <input type="text" name="key_number[]" class="" style="width: 100px;" /></td>'+
                '<td><b>Email</b><br/> <input type="text" name="key_email[]" class="email" style="width: 100px;" /></td>'+
                '<td><b>Company</b><br/> <input type="text" name="key_company[]" class="" style="width: 100px;" /> </td><td><input type="button" onclick="$(this).parent().parent().parent().parent().remove();" class="btn btn-danger" style="margin-top:20px;" value="Remove"/></td></tr>'+
                '</table>';
   $('#add_key').click(function(){
        $('.add_more').append(add);
   }); 
});
</script>