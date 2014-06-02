 <?php include_once('inc.php');?>

<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Edit Contacts');?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>contacts"><?php echo $this->requestAction('dashboard/translate/Contacts');?></a> <span class="icon-angle-right"></span>
        <a href="<?=$base_url;?>contacts/edit/<?=$k['Key_contact']['id'];?>" ><?php echo $this->requestAction('dashboard/translate/Edit Contact');?></a>
	</li>
</ul>

 <form action="" id="contacts" method="post">
 <table width="100%">
 
    <tr>
        <td><?php echo $this->requestAction('dashboard/translate/Contacts Type');?></td>
        <td colspan="3"><select name="type" class="required">
                <option value=""><?php echo $this->requestAction('dashboard/translate/Select Contact Type');?></option>
                <option value="0"<?php if($k['Key_contact']['type']=='0')echo "Selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Key Contacts');?></option>
                <option value="1"<?php if($k['Key_contact']['type']=='1')echo "Selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Staff Contacts');?></option>
                <option value="2"<?php if($k['Key_contact']['type']=='2')echo "Selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Third Part Contacts');?></option>
            </select>
        </td>
    </tr>
    <tr>
    
    <td><b><?php echo $this->requestAction('dashboard/translate/Name');?></b><br/><input type="text" name="key_name" class="required" value="<?php echo $k['Key_contact']['name'];?>" style="width: 100px;" /></td>
    <td><b><?php echo $this->requestAction('dashboard/translate/Title');?></b><br/><input type="text" name="key_title" class="" value="<?php echo $k['Key_contact']['title'];?>" style="width: 100px;" /></td>
    <td><b><?php echo $this->requestAction('dashboard/translate/Cell Number');?></b><br/><input type="text" name="key_cell" class="number" value="<?php echo $k['Key_contact']['cell'];?>" style="width: 100px;" /></td>
    <td><b><?php echo $this->requestAction('dashboard/translate/Cellular Carrier');?></b><br />
    <select name="key_cellular" class="">
        <option value="">Others</option>
        <option value="Rogers" <?php if($k['Key_contact']['cellular_provider']=='Rogers')echo "selected='selected'";?>>Rogers</option>
        <option value="AT&T" <?php if($k['Key_contact']['cellular_provider']=='AT&T')echo "selected='selected'";?>>AT&T</option>
        <option value="Bell" <?php if($k['Key_contact']['cellular_provider']=='Bell')echo "selected='selected'";?>>Bell</option>
        <option value="Fido" <?php if($k['Key_contact']['cellular_provider']=='Fido')echo "selected='selected'";?>>Fido</option>
        <option value="Telus Mobility" <?php if($k['Key_contact']['cellular_provider']=='Telus Mobility')echo "selected='selected'";?>>Telus Mobility</option>
        <option value="Koodo Mobile" <?php if($k['Key_contact']['cellular_provider']=='Koodo Mobile')echo "selected='selected'";?>>Koodo Mobile</option>
        <option value="Wind Mobile" <?php if($k['Key_contact']['cellular_provider']=='Wind Mobile')echo "selected='selected'";?>>Wind Mobile</option>
        <option value="Lynx Mobility" <?php if($k['Key_contact']['cellular_provider']=='Lynx Mobility')echo "selected='selected'";?>>Lynx Mobility</option>
        <option value="MTS Mobility" <?php if($k['Key_contact']['cellular_provider']=='MTS Mobility')echo "selected='selected'";?>>MTS Mobility</option>
        <option value="PC Telecom" <?php if($k['Key_contact']['cellular_provider']=='PC Telecom')echo "selected='selected'";?>>PC Telecom</option>
        <option value="Aliant" <?php if($k['Key_contact']['cellular_provider']=='Aliant')echo "selected='selected'";?>>Aliant</option>
        <option value="SaskTel" <?php if($k['Key_contact']['cellular_provider']=='SaskTel')echo "selected='selected'";?>>SaskTel</option>
        <option value="Virgin Mobile" <?php if($k['Key_contact']['cellular_provider']=='Virgin Mobile')echo "selected='selected'";?>>Virgin Mobile</option>
        <option value="Verizon" <?php if($k['Key_contact']['cellular_provider']=='Verizon')echo "selected='selected'";?>>Verizon</option>
        
        Verizon
    </select>
    </td>
    <td><b><?php echo $this->requestAction('dashboard/translate/Phone Number');?></b><br/><input type="text" name="key_number" class="number" value="<?php echo $k['Key_contact']['phone'];?>" style="width: 100px;" /></td>
    <td><b><?php echo $this->requestAction('dashboard/translate/Email');?></b><br/><input type="text" name="key_email" class="email" value="<?php echo $k['Key_contact']['email'];?>" style="width: 100px;" /></td>
    <td><b><?php echo $this->requestAction('dashboard/translate/Company');?></b><br/><input type="text" name="key_company" class="" value="<?php echo $k['Key_contact']['company'];?>" style="width: 100px;" /> </td></tr>
    
    
</table>
<input type="submit" name="submit"  class="btn btn-primary" value="<?php echo $this->requestAction('dashboard/translate/Edit');?>" style="margin-top:20px;"/>
</form>
<script>
$(function(){
    $('#contacts').validate();
})
</script>