 <?php include_once('inc.php');?>

<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Upload');?> Contacts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>contacts"><?php echo $this->requestAction('dashboard/translate/Contacts');?></a> <span class="icon-angle-right"></span>
        <a href="<?=$base_url;?>contacts/upload" ><?php echo $this->requestAction('dashboard/translate/Upload');?> Contact</a>
	</li>
</ul>

 <form action="" id="contacts" method="post" enctype="multipart/form-data">
 <input type="file" name="contacts" id="contacts" /><br />
<input type="submit" name="submit"  class="btn btn-primary" value="<?php echo $this->requestAction('dashboard/translate/Submit');?>" style="margin-top:20px;"/>
</form>
<script>
$(function(){
    $('#contacts').validate();
})
</script>