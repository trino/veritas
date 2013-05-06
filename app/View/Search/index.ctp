<?php include_once('inc.php');?>

<h3 class="page-title">
	Documents Search
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>dashboard/search?search=">Documents Search</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<div class="table">
<h2>Search Result</h2>
<?php
if($docs)
{
    ?>
    <table>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Description</th>
            <th>Option</th>
        </tr>
    <?php
    foreach($docs as $d)
    {?>
       <tr>
            <td><?php echo $d['Document']['title']; ?></td>
            <td><?php echo $d['Document']['location']; ?></td>
            <td><?php echo $d['Document']['description']; ?></td>
            <td><?php echo $this->Html->link('View Detail','/uploads/view_detail/'.$d['Document']['id']);  ?>
                
            </td>
       </tr> 
    <?php }
    
?>
 </table>
    <?php
}
?>
</div>