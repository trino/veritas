<?php include_once('inc.php');?>


<h3 class="page-title">
	Job Details: <?php echo stripslashes($job['Job']['title']); ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/view/<?php echo $job['Job']['id']; ?>">Job Details: <?php echo stripslashes($job['Job']['title']); ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>









<div class="documentsDashboard">
<?php if($this->Session->read('view')=='1') { ?>

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
				<div class="desc">Evidence</div>								
			</div>								
			<div class="more2">				
				View All <?=$evidence;?> Documents <i class="icon-arrow-right m-icon-white"></i>			
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
		Templates
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
	<div class="desc">Report</div>
	</div>
	<div class="more2">
	View All <?=$report;?> Documents <i class="icon-arrow-right m-icon-white"></i>
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
				<div class="desc">Site Order</div>									
			</div>									
			<div class="more2">									
				View All <?php echo $siteOrder;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
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
				<div class="desc">Training</div>									
			</div>									
			<div class="more2">									
				View All <?php echo $training;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
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
				<div class="desc">Employee</div>									
			</div>									
			<div class="more2">									
				View All <?php echo $employee;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?><?php if($admin_doc['AdminDoc']['kpiaudits']=='1' &&((isset($canview['Canview']['KPIAudits']) && $canview['Canview']['KPIAudits']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat red">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/KPIAudits/<?php echo $jobb_id;?>" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $KPIAudits;?></div>										
				<div class="desc">KPI Audits</div>									
			</div>									
			<div class="more2">									
				View All <?php echo $KPIAudits;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
    
	
<?php } ?>

</div><!-- Documents Dashboard -->






<div id="table">
<h2>Job Details</h2>
<table class="">
    <tr>
        <td style="width:140px;"><b>Job Title</b></td>
        <td><?php echo stripslashes($job['Job']['title']); ?></td>
    </tr>
    <tr>
        <td><b>Assigned To</b></td>
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
     <tr>
        <td><b>Description</b></td>
        <td><?php echo stripslashes($job['Job']['description']); ?></td>
    </tr>
    <tr>
        <td><b>Image</b></td>
        <td><?php if($job['Job']['image']=='afimaclogo.png' || $job['Job']['image']=='asap.gif')echo $this->Html->image('uploads/'.$this->Session->read('logo'),array('width'=>'100','height'=>'100'));else echo $this->Html->image('uploads/'.$job['Job']['image'],array('width'=>'100','height'=>'100')); ?></td>
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
        
        <tr style="background: grey;color:#FFF;"><td colspan="6"><?php if($k['Job_contact']['type']=='0'){ echo "<strong>Key Contacts</strong>"; }elseif($k['Job_contact']['type']=='1')echo "<strong>Staff Contacts</strong>"; else echo "<strong>Third Party Contacts</strong>"; ?></td></tr>
        <tr style="border-bottom: 1px solid grey;" ><td><strong>Name</strong></td><td><strong>Title</strong></td><td><strong>Cell Number</strong></td><td><strong>Phone Number</strong></td><td><strong>Email</strong></td><td><strong>Company</strong></td></tr>
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
              <tr style="background: grey;color:#FFF;"><td colspan="6"><?php if($k['Job_contact']['type']=='0'){ echo "<strong>Key Contacts</strong>"; }elseif($k['Job_contact']['type']=='1')echo "<strong>Staff Contacts</strong>"; else echo "<strong>Third Party Contacts</strong>"; ?></td></tr>  
              <tr style="border-bottom: 1px solid grey;"><td><strong>Name</strong></td><td><strong>Title</strong></td><td><strong>Cell Number</strong></td><td><strong>Phone Number</strong></td><td><strong>Email</strong></td><td><strong>Company</strong></td></tr>
         <?php       
            }
        }
        ?>
            <?php $ks = $key->findById($k['Job_contact']['key_id']); ?>  
                <tr style="border-bottom: 1px solid grey;">
                <td><?php echo $ks['Key_contact']['name'];?></td>
                <td><?php echo $ks['Key_contact']['title'];?></td>
                <td><?php echo $ks['Key_contact']['cell'];?></td>
                <td><?php echo $ks['Key_contact']['phone'];?></td>
                <td><?php echo $ks['Key_contact']['email'];?></td>
                <td><?php echo $ks['Key_contact']['company'];?></td>
                </tr>
                

<?php } ?>
        </table>
  
   <?php }
   else
   {
        echo "<tr><td colspan='2'>No Contacts Found.</td></tr>";
    }
   ?> 



</div>
























