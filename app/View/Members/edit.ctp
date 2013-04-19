<div id="table">
<h2>Add Member</h2>
<form action="" method="post" id="add_form">
<table>
<tr><td><label>Full Name</label><input type="text" name="full_name" value="<?php echo $m['Member']['full_name'];?>" class="required" /></td></tr>
<tr><td><label>Title</label><input type="text" name="title" value="<?php echo $m['Member']['title'];?>" class="required" /></td></tr>
<tr><td><label>Address</label><input type="text" name="address" value="<?php echo $m['Member']['address'];?>" class="required" /></td></tr>
<tr><td><label>Email</label><input type="text" name="email" value="<?php echo $m['Member']['email'];?>" class="required" /></td></tr>
<tr><td><label>Phone</label><input type="text" name="phone" value="<?php echo $m['Member']['phone'];?>" /></td></tr>
<tr><td><label>Password</label><input type="password" name="password" value="<?php echo $m['Member']['password'];?>" class="required" /></td></tr>
<tr><td><label>Can View</label><input type="checkbox" name="canView" <?php if($m['Member']['canView']==1){?>checked="checked"<?php }?> /></td></tr>
<tr><td><label>Can Upload</label><input type="checkbox" name="canUpdate" <?php if($m['Member']['canUpdate']==1){?>checked="checked"<?php }?> /></td></tr>
<!--<div class="checks"><div class="left">Is Supervisor</div><div class="right"><input type="checkbox" name="isSupervisor" <?php if($m['Member']['isSupervisor']==1){?>checked="checked"<?php }?> /></div><div class="clear"></div></div>
<div class="checks"><div class="left">Is Employee</div><div class="right"><input type="checkbox" name="isEmployee" <?php if($m['Member']['isEmployee']==1){?>checked="checked"<?php }?> /></div><div class="clear"></div></div> -->
<tr><td><div class="submit"><input type="submit" class="btn btn-primary" value="Edit" name="submit"/></div></td></tr>
</table>
</form>
</div>