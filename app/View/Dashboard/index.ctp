<?php include_once('inc.php');
?>
<script>
$(function(){
    $('.moreul').each(function(){
        $(this).hide();
    });
    
});
</script>


<h3 class="page-title">
	Veritas
	<small><?php echo $this->requestAction('dashboard/translate/Intelligence on Demand');?></small>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<?php if($this->Session->read('admin')){
    
    //echo $this->requestAction('dashboard/translate/templates');
    ?>
<div class="documentsDashboard">

<?php if($this->Session->read('view')=='1') { ?>



	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3"-->											
	<?php if($admin_doc['AdminDoc']['contracts']=='1' &&((isset($canview['Canview']['contracts']) && $canview['Canview']['contracts']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/contract" class="overallLink more">		
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
        <a href="<?=$base_url;?>search/index/evidence" class="overallLink more">
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
        <a href="<?=$base_url;?>search/index/template" class="overallLink more">
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
    <div class="dashboard-stat yellow">
	<div class="whiteCorner"></div>
	<!--<a href="<?=$base_url;?>uploads/view_doc/report" class="overallLink more">-->
    <a href="<?=$base_url;?>search/index/report" class="overallLink more">
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
        <a href="<?=$base_url;?>search/index/siteOrder" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $siteOrder;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Site Order');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All')?> <?php echo $siteOrder;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
 <?php if($admin_doc['AdminDoc']['training']=='1' &&((isset($canview['Canview']['training']) && $canview['Canview']['training']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/training" class="overallLink more">		
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
        <a href="<?=$base_url;?>search/index/employee" class="overallLink more">		
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
    <?php }?><?php if($admin_doc['AdminDoc']['kpiaudits']=='1' &&((isset($canview['Canview']['KPIAudits']) && $canview['Canview']['KPIAudits']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat red">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/KPIAudits" class="overallLink more">		
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
    <?php }?>
    <?php if($admin_doc['AdminDoc']['afimac_intel']=='1' &&((isset($canview['Canview']['afimac_intel']) && $canview['Canview']['afimac_intel']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat red">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/special/afimac_intel" class="overallLink more">		
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
        <a href="<?=$base_url;?>search/special/news_media" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $news_media;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/News')."/".$this->requestAction('dashboard/translate/Media');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $news_media;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
  <?php if($admin_doc['AdminDoc']['deployment_rate']=='1'&&((isset($canview['Canview']['deployment_rate']) && $canview['Canview']['deployment_rate']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat purple">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/deployment_rate" class="overallLink more">		
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
    <?php /*if($admin_doc['AdminDoc']['personal_inspection']=='1' &&((isset($canview['Canview']['personal_inspection']) && $canview['Canview']['personal_inspection']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat yellow">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/personal_inspection" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $personal_inspection;?></div>										
				<div class="desc"><?php echo $this->requestAction('dashboard/translate/Personal Inspection');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $personal_inspection;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['mobile_inspection']=='1' &&((isset($canview['Canview']['mobile_inspection']) && $canview['Canview']['mobile_inspection']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat blue">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/mobile_inspection" class="overallLink more">		
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
        <a href="<?=$base_url;?>search/index/mobile_log" class="overallLink more">		
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
        <a href="<?=$base_url;?>search/index/mobile_vehicle_trunk_inventory" class="overallLink more">		
			<div class="visual">										
				<i class="icon-file"></i>									
			</div>									
			<div class="details">										
				<div class="number"><?php echo $inventory;?></div>										
				<div class="desc"> <?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?></div>									
			</div>									
			<div class="more2">									
				<?php echo $this->requestAction('dashboard/translate/View All');?> <?php echo $inventory;?> Documents <i class="icon-arrow-right m-icon-white"></i>									
			</div>														
		</a>								
		<div class="dusk2"></div>						
	</div>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['vehicle_inspection']=='1' &&((isset($canview['Canview']['vehicle_inspection']) && $canview['Canview']['vehicle_inspection']=='1')|| $this->Session->read('admin'))){?>
    <div class="dashboard-stat yellow">								
		<div class="whiteCorner"></div>								
		<!--<a href="<?=$base_url;?>uploads/view_doc/contract" class="overallLink more">-->
        <a href="<?=$base_url;?>search/index/vehicle_inspection" class="overallLink more">		
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
    <?php }*/?>
<?php } ?>
</div><!-- Documents Dashboard -->



<?php //if($this->Session->read('avatar')){
    if(isset($activity) || (isset($jm) && $jm !=""))
{?>

<div id="table">
<h2><?php echo ($this->Session->read('admin'))? $this->requestAction('dashboard/translate/Dashboard') : $this->requestAction('dashboard/translate/Document Log');?></h2>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('date','Date'); ?></th>
        
        <th><?php echo $this->requestAction('dashboard/translate/User Name');?></th>
        <th><?php echo $this->requestAction('dashboard/translate/Full Name');?></th>
        <th><?php echo $this->requestAction('dashboard/translate/Event Type');?></th>
        <th><?php echo $this->requestAction('dashboard/translate/Event');?></th>
    </tr>

<?php

    foreach($activity as $a)
    {
        if($this->Session->read('user'))
        {
            if($a['Event_log']['document_id']!=0)
            {
                //echo $a['Event_log']['document_id'];
                if($d = $job_id->find('first',array('conditions'=>array('id'=>$a['Event_log']['document_id']))))
                $jid = $d['Document']['job_id'];
                //echo $jm;
                $job_member = explode(',',$jm);
            }   
                
        }
        else
        {
            $job_member = array();
            $jid = '1';
        }
        ?>
        <?php if(in_array($jid,$job_member) || $this->Session->read('admin'))
        {
        ?>
        <tr>
            <td><?php echo $a['Event_log']['date']; ?></td>
            
            <td>
                <?php
                if($a['Event_log']['member_id']==0)
                    echo $a['Event_log']['username'];
                elseif($a['Event_log']['member_id']>0)    
                {
                     echo "<a href='".$base_url."members/view/".$a['Event_log']['member_id']."'>".$a['Event_log']['username']."</a>";
                }
                else
                     echo $a['Event_log']['username'];
                
                             
                    
                ?>
            </td>
            <td><?php echo $a['Event_log']['fullname'];?></td>
            <td><?php echo $a['Event_log']['event_type']; ?></td>
            <td><?php if($a['Event_log']['document_id']!=0){ ?><a href="<?php echo $base_url; ?>uploads/view_detail/<?php echo $a['Event_log']['document_id'];?>"><?php echo str_replace('Ful','ful',$a['Event_log']['event']); ?></a><?php } else { echo str_replace('Ful','ful',$a['Event_log']['event']);} ?></td>
        </tr>
    <?php } 
        }
 ?>
 </table>

</div>

<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('<', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('>', array('tag' => 'li')); ?>
</ul>
</div>




<?php } 
}
//} ?> 
<script>
$(function(){
   initialize('attach');
   function initialize(button_id){
            
            var button = $('#'+button_id), interval;
            new AjaxUpload(button,{
	       action: '',
		   name: 'myfile',
		   onSubmit : function(file, ext){
			// change button text, when user selects file			
			button.text('Wait');
			
			// If you want to allow uploading only 1 file at time,
			// you can disable upload button
			this.disable();
			
			// Uploding -> Uploading. -> Uploading...
			interval = window.setInterval(function(){
				var text = button.text();
				if (text.length < 13){
					button.text(text + '.');					
				} else {
					button.text('Wait');				
				}
			}, 200);
		},
		onComplete: function(file, response){
                        
                        if(response!="error"){
                               $('#attachment').val($('#attachment').val()+file+',');
                               $('#resp').val($('#resp').val()+response+',');
                        }
			else{
                            alert(response["error_string"]);
                        }
                        button.text('Attach');
                        window.clearInterval(interval);
						
			// enable upload button
			this.enable();
			
			// add file to the list
									
		}
            });
        } 
});
</script>