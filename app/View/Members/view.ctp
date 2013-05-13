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
<form action="" method="post" id="add_form">
<table>
<tr><td style="width:140px;"><b>Full Name</b></td><td> <?php echo $profile['Member']['full_name'];?></td></tr>
<tr><td><b>Title</b></td><td> <?php echo $profile['Member']['title'];?></td></tr>
<tr><td><b>Address</b></td><td> <?php echo $profile['Member']['address'];?></td></tr>
<tr><td><b>Email</b></td><td> <?php echo $profile['Member']['email'];?></td></tr>
<tr><td><b>Phone</b></td><td> <?php echo $profile['Member']['phone'];?></td></tr>
</table>
</form>
</div>