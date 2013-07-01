 <?php include_once('inc.php');?>

<h3 class="page-title">
	Edit  Contacts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>contacts">Contacts</a> <span class="icon-angle-right"></span>
        <a href="<?=$base_url;?>contacts/edit/<?=$k['Key_contact']['id'];?>" >Edit Contact</a>
	</li>
</ul>

 <form action="" id="contacts" method="post">
 <table width="100%">
 
    <tr>
        <td>Contacts Type</td>
        <td colspan="3"><select name="type" class="required">
                <option value="">Select Type</option>
                <option value="0"<?php if($k['Key_contact']['type']=='0')echo "Selected='selected'";?>>Key Contacts</option>
                <option value="1"<?php if($k['Key_contact']['type']=='1')echo "Selected='selected'";?>>Staff Contacts</option>
                <option value="2"<?php if($k['Key_contact']['type']=='2')echo "Selected='selected'";?>>Third Part Contacts</option>
            </select>
        </td>
    </tr>
    <tr>
    
    <td><b>Name</b><br/><input type="text" name="key_name" class="required" value="<?php echo $k['Key_contact']['name'];?>" style="width: 100px;" /></td>
    <td><b>Title</b><br/><input type="text" name="key_title" class="" value="<?php echo $k['Key_contact']['title'];?>" style="width: 100px;" /></td>
    <td><b>Cell Number</b><br/><input type="text" name="key_cell" class="" value="<?php echo $k['Key_contact']['cell'];?>" style="width: 100px;" /></td>
    <td><b>Phone Number</b><br/><input type="text" name="key_number" class="" value="<?php echo $k['Key_contact']['phone'];?>" style="width: 100px;" /></td>
    <td><b>Email</b><br/><input type="text" name="key_email" class="email required" value="<?php echo $k['Key_contact']['email'];?>" style="width: 100px;" /></td>
    <td><b>Company</b><br/><input type="text" name="key_company" class="" value="<?php echo $k['Key_contact']['company'];?>" style="width: 100px;" /> </td></tr>
    
    
</table>
<input type="submit" name="submit"  class="btn btn-primary" value="Edit" style="margin-top:20px;"/>
</form>
<script>
$(function(){
    $('#contacts').validate();
})
</script>