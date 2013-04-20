<?php include_once('inc.php');?>
<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    });
</script>
<h2>Add Job</h2>
<form action="" method="post" id="add_form" enctype="multipart/form-data">
<div class="inputs"><div class="left">Job Title</div><div class="right"><input type="text" name="title" value="<?php echo $j['Job']['title']; ?>" /></div><div class="clear"></div></div>
<div class="inputs"><div class="left">Job Description</div><div class="right"><input type="text" name="description" value="<?php echo $j['Job']['description']; ?>" /></div><div class="clear"></div></div>
<!-- <div id="image"><?php echo $this->Html->image("uploads/".$j['Job']['image']); ?></div> -->
<input type="hidden" name="img" value="<?php echo $j['Job']['image']; ?>" />
<div class="inputs"><div class="left">Image</div><div class="right"><input type="file" name="image" /></div><div class="clear"></div></div>
<div class="inputs"><div class="left">Start Date</div><div class="right"><input type="text" name="start_date" id="start_date" value="<?php echo $j['Job']['date_start']; ?>" /></div><div class="clear"></div></div>
<div class="inputs"><div class="left">End Date</div><div class="right"><input type="text" name="end_date" id="end_date" value="<?php echo $j['Job']['date_end']; ?>" /></div><div class="clear"></div></div>
<div class="submit"><input type="submit" class="btn" value="Save" name="submit"/></div>
</form>