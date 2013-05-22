<?php include_once('inc.php');?>

<h3 class="page-title">
	Job Manager
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<?php
if($this->Session->read('avatar'))
{
 echo $this->Html->link(
					'Add Job',
					'/jobs/add',
                    array('class'=>'btn btn-primary reg-company')
				);
			?>
            <?php if($job)
    echo $this->Html->link('Assign Job to User','listing',array('class'=>'btn btn-primary reg-company')); 
   // echo $this->Html->link('Pending Jobs','/jobs/pending',array('class'=>'btn btn-primary reg-company'));
   
   	echo "<br/><br/>";
   }
   

   ?>
  


<div id="table">



   


<?php
if(isset($msg))
{
    echo $msg;
}
else
{
if($job){
    ?>
    <table>    
	        <tr>
                <th colspan="2">Company</th>
                <?php if($this->Session->read('avatar')) { ?><th>Assigned to</th><?php }?>
                <th style="width:350px;">Options</th>
            </tr>
    <?php        
foreach($job as $j)
{
    ?>
    
        <tr><td style="width:40px;"><div style="background-color:#dddddd;width:40px; height:40px; text-align:center;">
            
        <a href="<?php echo $base_url.'jobs/view/'.$j['Job']['id']; ?>"><?php echo $this->Html->image('uploads/'.$j['Job']['image'], array('alt' => '', 'style'=>'max-height:100%; max-width:100%;')); ?></a></td><td><a href="<?php echo $base_url.'jobs/view/'.$j['Job']['id']; ?>"><?php echo $j['Job']['title']?></a></td>
        <?php if($this->Session->read('avatar')) { ?>
            <td style="width: 345px;">
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
                                echo "<a href='".$base_url."members/view/".$m['Member']['id']."'>".$m['Member']['title']." ".$m['Member']['full_name']."</a>, ";
                            }
                        }
                    }
                }   
            }
            }
        ?>
    </td>

        <td>
    
        <?php echo $this->Html->link('View','/jobs/view/'.$j['Job']['id'],array('class'=>'btn btn-primary')); ?>
           <?php 
            if($this->Session->read('upload')=='1' || $this->Session->read('admin'))
            echo $this->Html->link('Quick Upload','/uploads/upload/'.$j['Job']['id'],array('class'=>'btn btn-primary'))." ";
        	
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
                    array('class'=>'btn btn-danger'),"Are you sure deleting this job?"
				)." ";
		}
       ?>
    </td>
        </tr>
    
        
    <?php
}
?></table>
</div>


<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('«', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('»', array('tag' => 'li')); ?>
</ul>
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