 <?php include_once('inc.php');?>

<h3 class="page-title">
	Add  Contacts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>contacts">Contacts</a> <span class="icon-angle-right"></span>
        <a href="<?=$base_url;?>contacts/add" >Add Contact</a>
	</li>
</ul>

 <form action="" id="contacts" method="post">
 <table width="100%">
 
    <tr>
        <td>Contacts Type</td>
        <td colspan="6"><select name="type" class="required">
                <option value="">Select Type</option>
                <option value="0">Key Contacts</option>
                <option value="1">Staff Contacts</option>
                <option value="2">Third Part Contacts</option>
            </select>
        </td>
    </tr>
    <tr>
    
    <td><b>Name</b><br/><input type="text" name="key_name" class="required" value="" style="width: 100px;" /></td>
    <td><b>Title</b><br/><input type="text" name="key_title" class="" value="" style="width: 100px;" /></td>
    <td><b>Cell Number</b><br/><input type="text" name="key_cell" class="number" value="" style="width: 100px;" /></td>
    <td><b>Cellular Carrier</b><br />
    <select name="key_cellular" class="">
        <option value="">Other</option>
        <option value="AT&T">AT&T</option>
        <option value="Boost Mobile">Boost Mobile</option>
        <option value="Sprint">Sprint</option>
        <option value="T-Mobile">T-Mobile</option>
        <option value="US Cellular">US Cellular</option>
        <option value="Verizon">Verizon</option>
        <option value="Virgin Mobile">Virgin Mobile</option>
        <option value="Bell">Bell</option>
        <option value="Fido">Fido</option>
        <option value="Koodo Mobile">Koodo Mobile</option>
        <option value="Rogers">Rogers</option>
        <option value="Telus Mobility">Telus Mobility</option>
        <option value="Wind Mobile">Wind Mobile</option>
    </select>
    </td>
    <td><b>Phone Number</b><br/><input type="text" name="key_number" class="number" value="" style="width: 100px;" /></td>
    <td><b>Email</b><br/><input type="text" name="key_email" class="email" value="" style="width: 100px;" /></td>
    <td><b>Company</b><br/><input type="text" name="key_company" class="" value="" style="width: 100px;" /> </td></tr>
    
    
</table>
<input type="submit" name="submit"  class="btn btn-primary" value="Submit" style="margin-top:20px;"/>
</form>
<script>
$(function(){
    $('#contacts').validate();
})
</script>