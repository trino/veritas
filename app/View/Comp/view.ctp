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
