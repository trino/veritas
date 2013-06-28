<?php include_once('inc.php');?>

<h3 class="page-title">
	<?php echo $profile['Member']['full_name'];?> (Profile)
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members">User Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>members/view/<?php echo $profile['Member']['id'];?>"><?php echo $profile['Member']['full_name'];?> (Profile)</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<div id="table">

<table>
<tr><td style="width:140px;"><b>Full Name</b></td><td> <?php echo $profile['Member']['fname'].' '.$profile['Member']['lname'];?></td></tr>
<tr><td><b></b></td><td> <img src="<?php echo $base_url."img/uploads/".$profile['Member']['image'];?>" /></td></tr>
<tr><td><b>Username</b></td><td> <?php echo $profile['Member']['full_name'];?></td></tr>
<tr><td><b>Title</b></td><td> <?php echo $profile['Member']['title'];?></td></tr>
<tr><td><b>Address</b></td><td> <?php echo $profile['Member']['address'];?></td></tr>
<tr><td><b>Email</b></td><td> <?php echo $profile['Member']['email'];?></td></tr>
<tr><td><b>Phone</b></td><td> <?php echo $profile['Member']['phone'];?></td></tr>
</table>
<div class="permissions">
<hr />
<h3 style="padding-left: 10px;font-size: 17px; margin-bottom:10px;">Permissions</h3>

<?php
$arr = array('no','yes');
?>
<table class="table" style="width: 500px;">
<tr><td><strong>Can View Documents</strong></td><td><?php echo $arr[$profile['Member']['canView']];?></td></tr>
<tr><td><strong>Can Upload Documents</strong></td><td><?php echo $arr[$profile['Member']['canUpdate']];?></td></tr>
<tr><td><strong>Can Send Message</strong></td><td><?php echo $arr[$profile['Member']['canEmail']];?></td></tr>
</table>
</div>

</div>