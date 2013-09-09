 <?php include_once('inc.php');?>

<h3 class="page-title">
	Upload  Contacts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>contacts">Contacts</a> <span class="icon-angle-right"></span>
        <a href="<?=$base_url;?>contacts/upload" >Upload Contact</a>
	</li>
</ul>

 <form action="" id="contacts" method="post" enctype="multipart/form-data">
 <input type="file" name="contacts" id="contacts" /><br />
<input type="submit" name="submit"  class="btn btn-primary" value="Submit" style="margin-top:20px;"/>
</form>
<script>
$(function(){
    $('#contacts').validate();
})
</script>