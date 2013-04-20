<?php include_once('inc.php');?>
<div id="table">
    <h2>Company Lists</h2>
<table>
<?php
echo $this->Html->link('Add Job','/company/add/', array('class'=>'right btn btn-primary reg-company')); 
if($job)
{
    foreach($job as $j)
    { ?><tr><td> <?php
        echo $this->Html->image('uploads/'.$j['Job']['image'])." ".$j['Job']['title']; ?> </td> <?php
        if($j['Job']['isApproved']=="1")
        {
            echo "<td>Approved</td>";
        }
        else
        {
            echo "<td>Pending</td>"; ?> <td> <?php
            echo $this->Html->link('Edit','/company/edit/'.$j['Job']['id'], array('class'=>'btn btn-primary')); ?></td><?php
        }?> <td> <?php
        echo $this->Html->link('Remove','/company/delete/'.$j['Job']['id'], array('class'=>'btn btn-primary'));
        echo $this->Html->link('View','/company/view/'.$j['Job']['id'], array('class'=>'btn btn-primary')); ?></td> <?php
    }
    
    
}
else
{
    echo "No job added yet";
}

?>
</tr>
</table>