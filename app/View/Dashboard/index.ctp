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



<?php if($this->Session->read('avatar')){
    if($activity)
{?>

<div id="table">
<h2>Document Activity Log</h2>
<table>
    <tr>
        <th>When</th>
        <th>Who</th>
        <th>What</th>
    </tr>

<?php

    foreach($activity as $a)
    {?>
        <tr>
            <td><?php echo $a['Document']['date']; ?></td>
            <td>
                <?php 
                    foreach($added as $aa)
                    {
                        if($a['Document']['addedBy']==$aa['Member']['id'])
                        {
                            echo $aa['Member']['email'];
                        }
                    }
                ?>
            </td>
            <td>Upload <?php echo $a['Document']['document_type']; ?></td>
        </tr>
    <?php } 
 ?>
 </table>
</div>
<?php } } ?> 
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