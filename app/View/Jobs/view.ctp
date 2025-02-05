<?php include_once('inc.php');?>


<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Job Details');?>: <?php echo stripslashes($job['Job']['title']); ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs"><?php echo $this->requestAction('dashboard/translate/Job Manager');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/view/<?php echo $job['Job']['id']; ?>"><?php echo $this->requestAction('dashboard/translate/Job Details');?>: <?php echo stripslashes($job['Job']['title']); ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>









<div class="documentsDashboard">
<?php if($this->Session->read('view')=='1') { ?>
<?php if($job['Job']['is_special']=='0'){ ?>
	<?php if($admin_doc['AdminDoc']['contracts']=='1' &&((isset($canview['Canview']['contracts']) && $canview['Canview']['contracts']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/contract/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $contract;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Contracts');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $contract;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>									

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
    <?php if($admin_doc['AdminDoc']['evidence']=='1' &&((isset($canview['Canview']['evidence']) && $canview['Canview']['evidence']=='1')|| $this->Session->read('admin'))){?>												
	<div class="dashboard-stat green">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/evidence" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/evidence/<?php echo $jobb_id;?>" class="overallLink more">
			<div class="visual">										
				<i class="icon-legal"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?=$evidence;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Evidence');?></div>								
			</div>								
			<div class="more2">				
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?=$evidence;?> Documents <i class="icon-arrow-right m-icon-white"></i>			
			</div>											
		</a>			
		<div class="dusk2"></div>					
	</div>										
    <?php }?>

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
    <?php if($admin_doc['AdminDoc']['templates']=='1' &&((isset($canview['Canview']['templates']) && $canview['Canview']['templates']=='1')|| $this->Session->read('admin'))){?>
	<div class="dashboard-stat purple">
		<div class="whiteCorner"></div>
		<!--<a href="<?=$base_url;?>uploads/view_doc/template" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/template/<?php echo $jobb_id;?>" class="overallLink more">
		<div class="visual">
		<i class="icon-folder-open"></i>
		</div>
		<div class="details">
		<div class="number">
		<?=$template;?>
		</div>
		<div class="desc">									
		<?php echo $this->requestAction('dashboard/translate/Templates');?>
		</div>
		</div>
		<div class="more2">
		<?php echo $this->requestAction('dashboard/translate/View All');?> <?=$template;?> Documents <i class="icon-arrow-right m-icon-white"></i>
		</div>	
		</a>
		<div class="dusk2"></div>
	</div>
    <?php } ?>

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
	<?php if($admin_doc['AdminDoc']['report']=='1' &&((isset($canview['Canview']['report']) && $canview['Canview']['report']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat dashboard-stat yellow">
	<div class="whiteCorner"></div>
	<!--<a href="<?=$base_url;?>uploads/view_doc/report" class="overallLink more">-->
    <a href="<?=$base_url;?>search/index/report/<?php echo $jobb_id;?>" class="overallLink more">
	<div class="visual">
	<i class="icon-book"></i>
	</div>
	<div class="details">
	<div class="number"><?=$report;?></div>
	<div class="desc"><?php echo $this->requestAction('dashboard/translate/Report');?></div>
	</div>
	<div class="more2">
	<?php echo $this->requestAction('dashboard/translate/View All');?> <?=$report;?> Documents <i class="icon-arrow-right m-icon-white"></i>
	</div>	
	</a>
	<div class="dusk2"></div>
	</div>
    <?php } ?>

<?php if($admin_doc['AdminDoc']['site_orders']=='1' &&((isset($canview['Canview']['siteOrder']) && $canview['Canview']['siteOrder']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat yellow">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/siteOrder/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $siteOrder;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Site Order');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $siteOrder;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
 <?php if($admin_doc['AdminDoc']['training']=='1' &&((isset($canview['Canview']['training']) && $canview['Canview']['training']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/training/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $training;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Training');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $training;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
 <?php if($admin_doc['AdminDoc']['employee']=='1' &&((isset($canview['Canview']['employee']) && $canview['Canview']['employee']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat green">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/employee/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $employee;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Employee');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $employee;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['kpiaudits']=='1' &&((isset($canview['Canview']['KPIAudits']) && $canview['Canview']['KPIAudits']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat red">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/KPIAudits/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $KPIAudits;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/KPI Audits');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $KPIAudits;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }
    ?>
    <?php if($admin_doc['AdminDoc']['deployment_rate']=='1'&&((isset($canview['Canview']['deployment_rate']) && $canview['Canview']['deployment_rate']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat purple">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/deployment_rate/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-list"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $deployment_rate;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Deployment');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $deployment_rate;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
    
    <?php if($admin_doc['AdminDoc']['orders']=='1' &&((isset($canview['Canview']['orders']) && $canview['Canview']['orders']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat green">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/orders" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $orders;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Orders');?></div>									
			</div>									
			<div class="more2">									
				<!--<?php echo $this->requestAction('dashboard/translate/viewplace order');?> <?php echo $orders;?> Documents <i class="icon-arrow-right m-icon-white"></i>-->
                view / place orders									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>   
    <?php
        }
    ?>
    <?php if($job['Job']['is_special']=='1'){ ?>
    <?php if($admin_doc['AdminDoc']['afimac_intel']=='1' &&((isset($canview['Canview']['afimac_intel']) && $canview['Canview']['afimac_intel']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat red">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <?php if(!$this->Session->read('admin')){?><a href="<?=$base_url;?>search/index/afimac_intel" class="overallLink more"><?php }
        else
        {
          ?>
          <a href="<?=$base_url;?>search/special/afimac_intel" class="overallLink more">
          <?php  
        }?>		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $afimac_intel;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/AFIMAC Intel');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $afimac_intel;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
<?php if($admin_doc['AdminDoc']['news_media']=='1' &&((isset($canview['Canview']['news_media']) && $canview['Canview']['news_media']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <?php if(!$this->Session->read('admin')){?><a href="<?=$base_url;?>search/index/news_media" class="overallLink more"><?php }
        else
        {
            ?>
            <a href="<?=$base_url;?>search/special/news_media" class="overallLink more">
            <?php
        }?>		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $news_media;?></div>										
				<div class="desc">News/Media</div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $news_media;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['orders']=='1' &&((isset($canview['Canview']['orders']) && $canview['Canview']['orders']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat green">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/orders" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $orders;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Orders');?></div>									
			</div>									
			<div class="more2">									
				<!--<?php echo $this->requestAction('dashboard/translate/viewplace order');?> <?php echo $orders;?> Documents <i class="icon-arrow-right m-icon-white"></i>-->
                view / place orders									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?> 
<?php }?>
<?php /* if($admin_doc['AdminDoc']['personal_inspection']=='1' &&((isset($canview['Canview']['personal_inspection']) && $canview['Canview']['personal_inspection']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat yellow">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/personal_inspection/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $personal_inspection;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Personal Inspection');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?><?php echo $personal_inspection;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
 <?php if($admin_doc['AdminDoc']['mobile_inspection']=='1' &&((isset($canview['Canview']['mobile_inspection']) && $canview['Canview']['mobile_inspection']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/mobile_inspection/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $mobile_inspection;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $mobile_inspection;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>  
    <?php if($admin_doc['AdminDoc']['mobile_log']=='1' &&((isset($canview['Canview']['mobile_log']) && $canview['Canview']['mobile_log']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/mobile_log/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $mobile_log;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Mobile Log');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $mobile_log;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?> 
    <?php if($admin_doc['AdminDoc']['inventory']=='1' &&((isset($canview['Canview']['inventory']) && $canview['Canview']['inventory']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat red">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/mobile_vehicle_trunk_inventory/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $inventory;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $inventory;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>  
    <?php if($admin_doc['AdminDoc']['personal_inspection']=='1' &&((isset($canview['Canview']['personal_inspection']) && $canview['Canview']['personal_inspection']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat yellow">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/vehicle_inspection/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $vehicle_inspection;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $vehicle_inspection;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php } */?>     
	
<?php } ?>

</div><!-- Documents Dashboard -->






<div id="table">
<h2><?php echo $this->requestAction('dashboard/translate/Job Details');?></h2>
<table class="">
    <tr>
        <td style="width:140px;"><b><?php echo $this->requestAction('dashboard/translate/Job Title');?></b></td>
        <td><?php echo stripslashes($job['Job']['title']); ?></td>
    </tr>
    <?php
    if($job['Job']['is_special']!=1 && !$this->Session->read('admin'))
    {
        ?>
        
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Assigned To');?></b></td>
        <td> <?php
        if($member) {
            ?>
            <table>
            <?php
            $me = 0;
            $td=0;
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
                                $me++;
                                if($me%4==1)
                                echo "<tr>";
                                if($this->Session->read('admin'))
                                    echo "<td style='width:20px;'><a href='".$base_url."members/view/".$m['Member']['id']."'>"." ".$m['Member']['full_name']."</a></td>";
                                else
                                    echo "<td style='width:20px;'>".$m['Member']['full_name']."</td>";
                                $td++;
                                if($m%4==0)
                                echo "</tr>";
                            }
                        }
                    }
                }   
            }
            if($td>0)
            {
               if($td%4==1)
               {
                
                echo "<td></td><td></td><td></td></tr>";
                
               }
               if($td%4==2)
               {
                
                echo "<td></td><td></td></tr>";
                
               }
               if($td%4==3)
               {
                
                echo "<td></td></tr>";
                
               }
                
            }
            ?>
            </table>
            <?php
            }
               ?></td>
    </tr>
    <?php
    }
    ?>
     <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Description');?></b></td>
        <td><?php echo stripslashes($job['Job']['description']); ?></td>
    </tr>
    <tr>
        <td><b>Image</b></td>
        <td><?php if($job['Job']['image']=='afimaclogo.png' || $job['Job']['image']=='asap.gif')echo $this->Html->image('uploads/'.$this->Session->read('logo'),array('width'=>'100','height'=>'100'));else echo $this->Html->image('uploads/'.$job['Job']['image'],array('width'=>'','height'=>'')); ?></td>
    </tr>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Site');?></b></td>
        <td><?php echo $job['Job']['site'] ?></td>
    </tr>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Date Start');?></b></td>
        <td><?php echo $job['Job']['date_start'] ?></td>
    </tr>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Date End');?></b></td>
        <td><?php echo $job['Job']['date_end']; ?></td>
    </tr>
    <?php $arr = array('Active-Recuirement Only',' Proposal Submitted','Signed Contract','Proposal Settled','Lost to Competitor'); ?>
    
	<tr>
	<td colspan="2">
	
<?php 
if($this->Session->read('upload')=='1' || $this->Session->read('admin'))
    echo $this->Html->link($this->requestAction('dashboard/translate/Upload a Document'),'/uploads/upload/'.$job['Job']['id'],array('class'=>'btn btn-primary'))."  "; 
if($this->Session->read('admin'))
{
    echo $this->Html->link($this->requestAction('dashboard/translate/Edit'),'/jobs/edit/'.$job['Job']['id'],array('class'=>'btn btn-info'))."  ";
    echo $this->Html->link($this->requestAction('dashboard/translate/Project Board'),'/jobs/projectboard/'.$job['Job']['id'],array('class'=>'btn btn-success'))."  ";
    echo $this->Html->link($this->requestAction('dashboard/translate/Delete'),'/jobs/delete/'.$job['Job']['id'],array('class'=>'btn btn-danger'), "Confrim Delete Job?");
}
?>


	</td>
	</tr>
	
</table>






</div>
	
	
	
<div id="table1">


    <?php if(count($keys)>0){
        $m = 0;
        ?>
    
        <table width="100%" style=" border: 1px solid #9D9C9C;clear: both; margin-bottom: 15px;">
    <?php 
        foreach($keys as $k){ 
        $m++;
        if($m==1)
        {
            $arr[]=$k['Job_contact']['type'];  
            
        ?>
        
        <tr style="background: grey;color:#FFF;"><td colspan="6">
        <?php if($k['Job_contact']['type']=='0'){ 
                    echo "<strong>".$this->requestAction('dashboard/translate/Key Contacts')."</strong>"; 
                }elseif($k['Job_contact']['type']=='1')
                    echo "<strong>".$this->requestAction('dashboard/translate/Staff Contacts')."</strong>"; 
               else
                     echo "<strong>".$this->requestAction('dashboard/translate/Third Party Contacts')."</strong>"; ?></td></tr>
        <tr style="border-bottom: 1px solid grey;" ><td><strong><?php echo $this->requestAction('dashboard/translate/Name');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Title');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Cell Number');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Phone Number');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Email');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Company');?></strong></td></tr>
        <?php 
        }
        else
        {
             if(!in_array($k['Job_contact']['type'],$arr))
            {
                $arr[]=$k['Job_contact']['type'];
                ?>
              </table>
              
               <table width="100%" style=" border: 1px solid #9D9C9C; clear: both; margin-bottom: 15px;"> 
              <tr style="background: grey;color:#FFF;"><td colspan="6">
               <?php if($k['Job_contact']['type']=='0'){ 
                    echo "<strong>".$this->requestAction('dashboard/translate/Key Contacts')."</strong>"; 
                }elseif($k['Job_contact']['type']=='1')
                    echo "<strong>".$this->requestAction('dashboard/translate/Staff Contacts')."</strong>"; 
               else
                     echo "<strong>".$this->requestAction('dashboard/translate/Third Party Contacts')."</strong>"; ?></td></tr>  
              <tr style="border-bottom: 1px solid grey;"><td><strong><?php echo $this->requestAction('dashboard/translate/Name');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Title');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Cell Number');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Phone Number');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Email');?></strong></td>
            <td><strong><?php echo $this->requestAction('dashboard/translate/Company');?></strong></td></tr>
         <?php       
            }
        }
        ?>
            <?php $ks = $key->findById($k['Job_contact']['key_id']); ?>  
                <tr style="border-bottom: 1px solid grey;">
                <td><?php echo $ks['Key_contact']['name'];?></td>
                <td><?php echo $ks['Key_contact']['title'];?></td>
                <td><?php echo phone_number($ks['Key_contact']['cell']);?></td>
                <td><?php echo phone_number($ks['Key_contact']['phone']);?></td>
                <td><?php echo $ks['Key_contact']['email'];?></td>
                <td><?php echo $ks['Key_contact']['company'];?></td>
                </tr>
                

<?php } ?>
        </table>
  
   <?php }
   else
   {
        echo "<tr><td colspan='2'>".$this->requestAction('dashboard/translate/No contacts found').".</td></tr>";
    }
   ?> 



</div>
























