<?php include_once('inc.php');?>


<h3 class="page-title">
	Job Details: <?php echo $job['Job']['title']; ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/view/<?php echo $job['Job']['id']; ?>">Job Details: <?php echo $job['Job']['title']; ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>








<div class="documentsDashboard">
<?php if($this->Session->read('view')=='1') { ?>

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3"-->
    <?php if((isset($canview['Canview']['contracts']) && $canview['Canview']['contracts']=='1')|| $this->Session->read('admin')){?>											
	<div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<a href="<?=$base_url;?>uploads/view_doc/contract/<?php echo $job['Job']['id'];?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $contract;?></div>										
				<div class="desc">Contracts</div>									
			</div>									
			<div class="more2">									
				View All <?php echo $contract;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>	
    <?php }?>								

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
    <?php if((isset($canview['Canview']['evidence']) && $canview['Canview']['evidence']=='1')|| $this->Session->read('admin')){?>												
	<div class="dashboard-stat green">								
		<div class="whiteCorner"></div>								
		<a href="<?=$base_url;?>uploads/view_doc/evidence/<?php echo $job['Job']['id'];?>" class="overallLink more">									
			<div class="visual">										
				<i class="icon-legal"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?=$evidence;?></div>										
				<div class="desc">Evidence</div>								
			</div>								
			<div class="more2">				
				View All <?=$evidence;?> Documents <i class="icon-arrow-right m-icon-white"></i>			
			</div>											
		</a>			
		<div class="dusk2"></div>					
	</div>	
    <?php } ?>									


	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
    <?php if((isset($canview['Canview']['templates']) && $canview['Canview']['templates']=='1')|| $this->Session->read('admin')){?>
	<div class="dashboard-stat purple">
		<div class="whiteCorner"></div>
		<a href="<?=$base_url;?>uploads/view_doc/template/<?php echo $job['Job']['id'];?>" class="overallLink more">
		<div class="visual">
		<i class="icon-leaf"></i>
		</div>
		<div class="details">
		<div class="number">
		<?=$template;?>
		</div>
		<div class="desc">									
		Template
		</div>
		</div>
		<div class="more2">
		View All <?=$template;?> Documents <i class="icon-arrow-right m-icon-white"></i>
		</div>	
		</a>
		<div class="dusk2"></div>
	</div>
    <?php } ?>

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
	<?php if((isset($canview['Canview']['report']) && $canview['Canview']['report']=='1')|| $this->Session->read('admin')){?>
    <div class="dashboard-stat dashboard-stat-last yellow">
	<div class="whiteCorner"></div>
	<a href="<?=$base_url;?>uploads/view_doc/report/<?php echo $job['Job']['id'];?>" class="overallLink more">
	<div class="visual">
	<i class="icon-book"></i>
	</div>
	<div class="details">
	<div class="number"><?=$report;?></div>
	<div class="desc">Report</div>
	</div>
	<div class="more2">
	View All <?=$report;?> Documents <i class="icon-arrow-right m-icon-white"></i>
	</div>	
	</a>
	<div class="dusk2"></div>
	</div>
    
	
<?php }} ?>
</div><!-- Documents Dashboard -->





<div id="table">
<h2>Job Details</h2>
<table>
    <tr>
        <td style="width:140px;"><b>Job Title</b></td>
        <td><?php echo $job['Job']['title']; ?></td>
    </tr>
    <tr>
        <td><b>Assigned To</b></td>
        <td> <?php 
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
                            if($ji[$i]==$job['Job']['id'])
                            {
                                echo "<a href='".$base_url."members/view/".$m['Member']['id']."'>".$m['Member']['title']." ".$m['Member']['full_name']."</a>, ";
                            }
                        }
                    }
                }   
            }
               ?></td>
    </tr>
     <tr>
        <td><b>Description</b></td>
        <td><?php echo $job['Job']['description']; ?></td>
    </tr>
    <tr>
        <td><b>Image</b></td>
        <td><?php echo $this->Html->image('uploads/'.$job['Job']['image'],array('width'=>'100','height'=>'100')); ?></td>
    </tr>
    <tr>
        <td><b>Date Start</b></td>
        <td><?php echo $job['Job']['date_start'] ?></td>
    </tr>
    <tr>
        <td><b>Date End</b></td>
        <td><?php echo $job['Job']['date_end']; ?></td>
    </tr>
	<tr>
	<td colspan="2">
	
<?php 
if($this->Session->read('upload')=='1' || $this->Session->read('admin'))
    echo $this->Html->link('Upload a Document','/uploads/upload/'.$job['Job']['id'],array('class'=>'btn btn-primary'))."  "; 
if($this->Session->read('admin'))
{
    echo $this->Html->link('Edit','/jobs/edit/'.$job['Job']['id'],array('class'=>'btn btn-info'))."  ";
    echo $this->Html->link('Delete','/jobs/delete/'.$job['Job']['id'],array('class'=>'btn btn-danger'), "Confrim Delete Job?");
}
?>


	</td>
	</tr>
	
</table>


</div>
	
	
	
<div id="table">
<h2>Key Contacts</h2>
<table>
    <?php if(count($keys)>0){?>
    <tr>
        <table width="100%"><thead><th>Name</th><th>Title</th><th>Cell Number</th></th><th>Phone Number</th><th>Email</th><th>Company</th></thead>
    <?php foreach($keys as $k){ ?>
                
                <tr>
                <td><?php echo $k['Key_contact']['name'];?></td>
                <td><?php echo $k['Key_contact']['title'];?></td>
                <td><?php echo $k['Key_contact']['cell'];?></td>
                <td><?php echo $k['Key_contact']['phone'];?></td>
                <td><?php echo $k['Key_contact']['email'];?></td>
                <td><?php echo $k['Key_contact']['company'];?></td>
                </tr>
                

<?php } ?>
        </table>
    </tr>
   <?php }
   else
   {
        echo "<tr><td colspan='2'>No Key Contacts Found.</td></tr>";
    }
   ?> 
</table>


</div>
























