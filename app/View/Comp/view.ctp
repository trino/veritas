<?php include_once('inc.php');?>


<h3 class="page-title">
	<?php echo $c['Company']['full_name']; ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>comp">Comapny Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>comp/view/<?php echo $c['Company']['id']; ?>"><?php echo $c['Company']['full_name']; ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<div id="table">
<h2><?php echo $this->Html->image('uploads/'.$c['Company']['image']); ?> &nbsp; Details of <?php echo $c['Company']['company']; ?> </h2>
<table>
<tr><td><label>Full Name</label><?php echo $c['Company']['full_name']; ?></td></tr>
<tr><td><label>Email</label><?php echo $c['Company']['email']; ?></td></tr>
<tr><td><label>Phone</label><?php echo $c['Company']['phone']; ?></td></tr>
<tr><td><label>No. of Worker</label><?php echo $c['Company']['no_of_worker']; ?></td></tr>
<tr><td><label>Description</label><?php echo $c['Company']['description']; ?></td></tr>
</table>
</div>
