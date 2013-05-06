<?php include_once('inc.php');?>



<h3 class="page-title">
	Documents: Contracts
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/view_doc/contract">Documents: Contracts</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>



<?php 
if(isset($message))
{
    echo $message;
}
else
{
    ?>
    <div id="table">
        <h2>Documents</h2>
     <table>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Description</th>
            <th>Option</th>
        </tr>
    <?php
    foreach($doc as $d)
    {?>
       <tr>
            <td><?php echo $d['Document']['title']; ?></td>
            <td><?php echo $d['Document']['location']; ?></td>
            <td><?php echo $d['Document']['description']; ?></td>
            <td><?php echo $this->Html->link('View Detail','/uploads/view_detail/'.$d['Document']['id'],array('class'=>'btn btn-primary'));  ?>
                <?php // if($update==1) echo $this->Html->link('Edit','/uploads/edit/'.$d['Document']['id']); ?>
            </td>
       </tr> 
    <?php }
    }
?>
 </table>
</div>