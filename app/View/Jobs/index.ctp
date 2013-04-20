<?php include_once('inc.php');?>
<div id="table">
<h2>Job Manager</h2>

<?php
if($this->Session->read('avatar'))
{
 echo $this->Html->link(
					'+Add',
					'/jobs/add',
                    array('class'=>'btn btn-primary reg-company')
				);
			?>
            <?php if($job)
    echo $this->Html->link('Assign Job to User','listing',array('class'=>'btn btn-primary reg-company')); 
    echo $this->Html->link('Pending Jobs','/jobs/pending',array('class'=>'btn btn-primary reg-company'));
   }
   ?>
   


<?php
if(isset($msg))
{
    echo $msg;
}
else
{
if($job){
foreach($job as $j)
{
    ?>
    <table>
        <tr><td>
            <table>
                <tr><td>
        <?php echo $this->Html->image('uploads/'.$j['Job']['image'], array('alt' => '')); ?></td><td><?php echo $j['Job']['title']?></td>
        <?php if($this->Session->read('avatar')) { ?>
            <td>Assigned to:
        <?php 
            foreach($member as $m)
            {
                foreach($jobmember as $jm)
                {
                    if($m['Member']['id']==$jm['Jobmember']['member_id'])
                    {
                        $job_id=$jm['Jobmember']['job_id'];
                        $ji=explode(',',$job_id);
                        
                        for($i=0;$i<sizeof($ji);$i++)
                        {
                            if($ji[$i]==$j['Job']['id'])
                            {
                                echo $m['Member']['title']." ".$m['Member']['full_name']."<br>";
                            }
                        }
                    }
                }   
            }
            }
        ?>
    </td>
</tr>
</table>
        </td>
        <td>
    <?php 
    if($this->Session->read('avatar'))
    {
    echo $this->Html->link(
					'Edit',
					'/jobs/edit/'.$j['Job']['id'],
                    array('class'=>'btn btn-primary')
				);
			?> <?php echo $this->Html->link(
					'Delete',
					'/jobs/delete/'.$j['Job']['id'],
                    array('class'=>'btn btn-primary')
				);
		}	?>
        <?php echo $this->Html->link('View','/jobs/view/'.$j['Job']['id'],array('class'=>'btn btn-primary')); ?>
    </td>
        </tr>
    </table>
        
    <?php
}
?>
</div>
<div id="pagination">
<?php echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
</div>
<?php }
else
{
    ?>
    No Job added yet
    <?php
}
}
?>