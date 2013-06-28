<div id="table">
<h2>Home Page Content</h2>
<form action="" method="post">
	<table>
<tr><td><label>Title</label><input type="text" name="title" class="required" value="<?php echo $page['Page']['title']; ?>" /></td></tr>
<tr><td><label>Content</label><textarea name="description" class="required" rows="15" cols="35" style="height:100px;"><?php echo $page['Page']['description']; ?></textarea></td></tr>
<tr><td><input type="submit" name="submit" value="Save" class="btn btn-primary" /></td></tr>
</table>
</form>
</div>