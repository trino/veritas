<div>Edit Document</div>
<form id="Form" action="" method="post" enctype="multipart/form-data">
<div class="inputs"><div class="left">Location</div><div class="right"><input type="text" name="location" class="required" value="<?php echo $doc['Document']['location']; ?>" /></div><div class="clear"></div></div>
<div class="inputs"><div class="left">Title</div><div class="right"><input type="text" name="title" class="required" value="<?php echo $doc['Document']['title']; ?>" /></div><div class="clear"></div></div>
<div class="inputs"><div class="left">Description</div><div class="right"><textarea cols="35" name="description" class="required"><?php echo $doc['Document']['description']; ?></textarea></div><div class="clear"></div></div>
<div class="submit"><input type="submit" class="btn" value="Save" name="submit"/></div>
</form>