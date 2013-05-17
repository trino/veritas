<?php include_once('inc.php');
?>



<h3 class="page-title">
	Veritas
	<small>Intelligence on Demand</small>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>">Home</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<div class="documentsDashboard">
<?php if($this->Session->read('view')=='1') { ?>



	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3"-->											
	<?php if((isset($canview['Canview']['contracts']) && $canview['Canview']['contracts']=='1')|| $this->Session->read('admin')){?>
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
    <?php }?>									

	<!-- tien-repsonsive div class="span3 responsive" data-tablet="span6" data-desktop="span3"-->
    <?php if((isset($canview['Canview']['evidence']) && $canview['Canview']['evidence']=='1')|| $this->Session->read('admin')){?>												
	<div class="dashboard-stat green">								
		<div class="whiteCorner"></div>								
		<a href="<?=$base_url;?>uploads/view_doc/evidence" class="overallLink more">									
			<div class="visual">										
				<i class="icon-shopping-cart"></i>									
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
    <?php if((isset($canview['Canview']['templates']) && $canview['Canview']['templates']=='1')|| $this->Session->read('admin')){?>
	<div class="dashboard-stat purple">
		<div class="whiteCorner"></div>
		<a href="<?=$base_url;?>uploads/view_doc/template" class="overallLink more">
		<div class="visual">
		<i class="icon-legal"></i>
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
	<!--
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
	</div>-->


<?php } ?>
</div><!-- Documents Dashboard -->



<?php //if($this->Session->read('avatar')){
    if($activity)
{?>

<div id="table">
<h2>Activity Log</h2>
<table>
    <tr>
        <th>Date</th>
        <th>Time</th>
        <th>User Name</th>
        <th>Full Name</th>
        <th>Event Type</th>
        <th>Event</th>
    </tr>

<?php

    foreach($activity as $a)
    {
        if($this->Session->read('user'))
        {
            if($a['Event_log']['document_id']!=0)
            {
                //echo $a['Event_log']['document_id'];
                $d = $job_id->find('first',array('conditions'=>array('id'=>$a['Event_log']['document_id'])));
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
            <td><?php echo $a['Event_log']['time'];?></td>
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
            <td><?php if($a['Event_log']['document_id']!=0){ ?><a href="<?php echo $base_url; ?>uploads/view_detail/<?php echo $a['Event_log']['document_id'];?>"><?php echo $a['Event_log']['event']; ?></a><?php } else { echo $a['Event_log']['event'];} ?></td>
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