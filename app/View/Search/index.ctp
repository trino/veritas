<?php include_once('inc.php');?>

<h3 class="page-title">
	Documents Search
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>search?search=">Documents Search</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>




<div id="table">
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
            <th>Uploaded By</th>
            <th>Uploaded On</th>
            <th>Option</th>
        </tr>
    <?php
    foreach($docs as $d)
    {?>
       <tr>
            <td><?php echo $d['Document']['title']; ?></td>
            <td><?php echo $d['Document']['location']; ?></td>
            <td><?php echo $d['Document']['description']; ?></td>
            <td><?php if($d['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$d['Document']['addedBy'])));if($q){echo $q['Member']['full_name'];}}else echo "Admin";?></td>
            <td><?php echo $d['Document']['date'];?></td>
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