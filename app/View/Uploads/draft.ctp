<?php include('inc.php');?>
<div>
<h3 class="page-title">
	Saved Drafts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/draft">Drafts</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

 
    <?php if(count($drafts)>0){?>
    <table style="width: 100%;" class="table">
    <thead><th>Document Type</th><th>Description</th><th>Added On</th><th>Option</th></thead>
<?php
foreach($drafts as $d)
{?>
    <tr><td><?php echo $d['Document']['document_type'];?></td><td><?php echo $d['Document']['description'];?></td><td><?php echo $d['Document']['date'];?></td><td><a href="<?php echo $base_url."uploads/document_edit/".$d['Document']['id'];?>" class="btn btn-primary">Edit</a></td></tr>
<?php }
?>
</table>
<?php }
else
    echo "No Drafts Found!!";
    ?>
</div>