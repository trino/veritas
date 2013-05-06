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
	<div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">		
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

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->												
	<div class="dashboard-stat green">								
		<div class="whiteCorner"></div>								
		<a href="<?=$base_url;?>uploads/view_doc/post_order" class="overallLink more">									
			<div class="visual">										
				<i class="icon-shopping-cart"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?=$post_order;?></div>										
				<div class="desc">Post Orders</div>								
			</div>								
			<div class="more2">				
				View All <?=$post_order;?> Documents <i class="icon-arrow-right m-icon-white"></i>			
			</div>											
		</a>			
		<div class="dusk2"></div>					
	</div>										


	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
	<div class="dashboard-stat purple">
		<div class="whiteCorner"></div>
		<a href="<?=$base_url;?>uploads/view_doc/audits" class="overallLink more">
		<div class="visual">
		<i class="icon-legal"></i>
		</div>
		<div class="details">
		<div class="number">
		<?=$audits;?>
		</div>
		<div class="desc">									
		Audits
		</div>
		</div>
		<div class="more2">
		View All <?=$audits;?> Documents <i class="icon-arrow-right m-icon-white"></i>
		</div>	
		</a>
		<div class="dusk2"></div>
	</div>

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
	<div class="dashboard-stat dashboard-stat-last yellow">
	<div class="whiteCorner"></div>
	<a href="<?=$base_url;?>uploads/view_doc/training_manuals" class="overallLink more">
	<div class="visual">
	<i class="icon-book"></i>
	</div>
	<div class="details">
	<div class="number"><?=$training_manuals;?></div>
	<div class="desc">Training Manuals</div>
	</div>
	<div class="more2">
	View All <?=$training_manuals;?> Documents <i class="icon-arrow-right m-icon-white"></i>
	</div>	
	</a>
	<div class="dusk2"></div>
	</div>
	
<?php } ?>
</div><!-- Documents Dashboard -->





<div id="table">
<h2>Job Details</h2>
<table>
    <tr>
        <td>Job Title</td>
        <td><?php echo $job['Job']['title']; ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo $job['Job']['description']; ?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td><?php echo $this->Html->image('uploads/'.$job['Job']['image'],array('width'=>'100','height'=>'100')); ?></td>
    </tr>
    <tr>
        <td>Date Start</td>
        <td><?php echo $job['Job']['date_start'] ?></td>
    </tr>
    <tr>
        <td>Date End</td>
        <td><?php echo $job['Job']['date_end']; ?></td>
    </tr>
</table>

<?php 
if($this->Session->read('upload')=='1' || $this->Session->read('admin'))
echo $this->Html->link('Upload Document','/uploads/upload/'.$job['Job']['id'],array('class'=>'btn btn-primary','style'=>"margin:10px")); 
?>
</div>





























<div class="box">
<?php if($this->Session->read('view')=='1') { ?>
    <div class="blue main-box">
        <div class="sub-box">
         <div class="corner"></div>
        <div class="icon"><i class="icon-file"></i></div>
        <div class="number">
        <?php  echo $this->Html->link($contract,'/uploads/view_doc/contract');?> Contracts
        </div>
        <div class="view-all">
        <?php echo $this->Html->link('View All '.$contract.' Documents','/uploads/view_doc/contract');?>
        <i class="icon-arrow-right m-icon-white"></i>
        </div> 
    </div>
    <div class="shadow"></div>
    </div>

    <div class="green main-box">
        <div class="sub-box">
        <div class="corner"></div>
        <div class="icon"><i class="icon-shopping-cart"></i></div>
        <div class="number">
        <?php  echo $this->Html->link($post_order,'/uploads/view_doc/post_order');?>Post Orders
        </div>
        <div class="view-all">
         <?php echo $this->Html->link('View All '.$post_order.' Documents','/uploads/view_doc/post_order');?>
         <i class="icon-arrow-right m-icon-white"></i>
     </div>
     </div>
    <div class="shadow"></div>
    </div>

    <div class="purple main-box">
        <div class="sub-box">
         <div class="corner"></div>
        <div class="icon"><i class="icon-legal"></i></div>
        <div class="number">
        <?php echo $this->Html->link($audits,'/uploads/view_doc/audits');?>Audits
        </div>
        <div class="view-all">
        <?php echo $this->Html->link('View All '.$audits.' Documents','/uploads/view_doc/audits');?>
        <i class="icon-arrow-right m-icon-white"></i>
    </div>
    </div>
    <div class="shadow"></div>
    </div>
 
    <div class="yello main-box">
        <div class="sub-box">
         <div class="corner"></div>
        <div class="icon"><i class="icon-book"></i></div>
        <div class="number">
        <?php echo $this->Html->link($training_manuals,'/uploads/view_doc/training_manuals');?>training_manuals
        </div>
        <div class="view-all">
         <?php echo $this->Html->link('View All '.$training_manuals.' Documents','/uploads/view_doc/training_manuals');?>
         <i class="icon-arrow-right m-icon-white"></i>
     </div>
     </div>
     <div class="shadow"></div>
 </div>
    <div class="clear"></div>
    </div>

<?php } ?>