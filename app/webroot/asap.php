<td colspan="3" style="background: #f5f5f5;padding-left:15px ;" class="asap">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/asap.css" />
    <div class="header clearfix">
		<div class="header_left f_left"><img src="<?php echo $this->webroot;?>img/asap1.png" /></div>
		<div class="header_right f_right">ACTIVITY LOG REPORT</div>
	</div>

	<div class="top_content clearfix">
		<div class="top_left f_left">
			<div class="note">
				NOTE: A SEPARATE REPORT MUST BE COMPLETED FOR EACH CHANGE IN SECURITY PERSONNEL AS WELL AS INCIDENTS REPORTED ON AN INCIDENT REPORT FORM. USE ADDITIONAL PAGE(S) IF MORE SPACE IS REQUIRED.
			</div>
			<div class="weather_table clearfix">
				<div class="f_left weather"><strong>WEATHER</strong></div>
				<table style="width:91.1%;float:right;">

					<tr>
						<th style="text-align:right;">SHIFT</th>
						<th>DATE</th>
						<th>TIME</th>
						<th>CONDITIONS</th>
					</tr>
					<tr>
						<td>Start</td>
						<td class="small_width"><input type="text" name="d1" class="activity_date" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d1'];?>"></td>
						<td class="small_width"><input type="text" class="activity_time" name="t1" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t1'];?>"></td>
						<td><input type="text" name="c1" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['c1'];?>"></td>
					</tr>
					<tr>
						<td>Change</td>
						<td class="small_width"><input type="text" name="d2" class="activity_date" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d2'];?>"></td>
						<td class="small_width"><input type="text" class="activity_time" name="t2" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t2'];?>"></td>
						<td><input type="text" name="c2" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['c2'];?>"></td>
					</tr>
					<tr>
						<td>Finish</td>
						<td class="small_width"><input type="text" name="d3" class="activity_date" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d3'];?>"></td>
						<td class="small_width"><input type="text" class="activity_time" name="t3" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t3'];?>"></td>
						<td><input type="text" name="c3" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['c3'];?>"></td>
					</tr>

				</table>
			</div>
		</div>
		<div class="top_right f_right">
		
			<div><label>GUARD NAME:</label><input type="text" name="name" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['name'];?>"></div>
			<div><label>DATE(mm/dd/yy):</label><input type="text" class="activity_date" name="date" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['date'];?>"></div>
			<div><label>LOSS LOCATION:</label><input type="text" name="location" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['location'];?>"></div>
			<div><label>WHOM DID YOU RELIEVE?</label><input type="text" name="whom" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['whom'];?>"></div>
			<div><label>WHO RELIEVED YOU?</label><input type="text" name="who" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['who'];?>"></div>
	
		</div>
	</div>
	<div class="main_table">
		<table style="width:99%;" class="tableadd">
			<tr>
				<th><strong>DATE</strong></th>
				<th><strong>TIME</strong></th>
				<th><strong>LOG REPORTS DETAILS</strong></th>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d4" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d4'];?>"></td>
				<td><input type="text" class="activity_time" name="t4" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t4'];?>"></td>
				<td><input type="text" name="l4" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l4'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d5" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d5'];?>"></td>
				<td><input type="text" class="activity_time" name="t5" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t5'];?>"></td>
				<td><input type="text" name="l5" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l5'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d6" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d6'];?>"></td>
				<td><input type="text" class="activity_time" name="t6" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t6'];?>"></td>
				<td><input type="text" class="activity_time" name="l6" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l6'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d7" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d7'];?>"></td>
				<td><input type="text" class="activity_time" name="t7" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t7'];?>"></td>
				<td><input type="text" name="l7" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l7'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d8" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d8'];?>"></td>
				<td><input type="text" class="activity_time" name="t8" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t8'];?>"></td>
				<td><input type="text" name="l8" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l8'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d9" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d9'];?>"></td>
				<td><input type="text" class="activity_time" name="t9" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t9'];?>"></td>
				<td><input type="text" name="l9" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l9'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d10" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d10'];?>"></td>
				<td><input type="text" class="activity_time" name="t10" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t10'];?>"></td>
				<td><input type="text" name="l10" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l10'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d11" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d11'];?>"></td>
				<td><input type="text" class="activity_time" name="t11" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t11'];?>"></td>
				<td><input type="text" name="l11" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l11'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d12" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d12'];?>"></td>
				<td><input type="text" class="activity_time" name="t12" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t12'];?>"></td>
				<td><input type="text" name="l12" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l12'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d13" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d13'];?>"></td>
				<td><input type="text" class="activity_time" name="t13" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t13'];?>"></td>
				<td><input type="text" name="l13" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l13'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d14" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d14'];?>"></td>
				<td><input type="text" class="activity_time" name="t14" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t14'];?>"></td>
				<td><input type="text" name="l14" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l14'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d15" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d15'];?>"></td>
				<td><input type="text" class="activity_time" name="t15" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t15'];?>"></td>
				<td><input type="text" name="l15" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l15'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d16" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d16'];?>"></td>
				<td><input type="text" class="activity_time" name="t16" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t16'];?>"></td>
				<td><input type="text" name="l16" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l16'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d17" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d17'];?>"></td>
				<td><input type="text" class="activity_time" name="t17" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t17'];?>"></td>
				<td><input type="text" name="l17" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l17'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d18" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d18'];?>"></td>
				<td><input type="text" class="activity_time" name="t18" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t18'];?>"></td>
				<td><input type="text" name="l18" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l18'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d19" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d19'];?>"></td>
				<td><input type="text" class="activity_time" name="t19" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t19'];?>"></td>
				<td><input type="text" name="l19" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l19'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d20" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d20'];?>"></td>
				<td><input type="text" class="activity_time" name="t20" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t20'];?>"></td>
				<td><input type="text" name="l20" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l20'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d21" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d21'];?>"></td>
				<td><input type="text" class="activity_time" name="t21" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t21'];?>"></td>
				<td><input type="text" name="l21" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l21'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d22" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d22'];?>"></td>
				<td><input type="text" class="activity_time" name="t22" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t22'];?>"></td>
				<td><input type="text" name="l22" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l22'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d23" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d23'];?>"></td>
				<td><input type="text" class="activity_time" name="t23" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t23'];?>"></td>
				<td><input type="text" name="l23" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l23'];?>"></td>
			</tr>
			<tr>
				<td><input type="text" class="activity_date" name="d24" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['d24'];?>"></td>
				<td><input type="text" class="activity_time" name="t24" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['t24'];?>"></td>
				<td><input type="text" name="l24" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['l24'];?>"></td>
			</tr>
            <?php foreach($logs as $log){?>
            <tr>
				<td><input type="text" class="activity_date" name="asapdate[]" value="<?php echo $log['AdditionalLog']['asapdate'];?>"></td>
				<td><input type="text" class="activity_time" name="asaptime[]" value="<?php echo  $log['AdditionalLog']['asaptime'];?>"></td>
				<td><input type="text" name="asapdesc[]" value="<?php echo  $log['AdditionalLog']['asapdesc'];?>"></td>
			</tr>        
            <?php }?>
		

	
</table>
</div>
<div class="addremove">

<a href="javascript:void(0);" class="btn btn-primary addrow" >+Add More</a>
<a href="javascript:void(0);" class="btn btn-danger removelast" onclick="if($('.tableadd tr').length=='22')$(this).hide();else $('.tableadd tr:last-child').remove();" >Remove Last</a>

</div>

<div class="bottom_content clearfix">
	<div class="signature f_left">
		<span>NAME:</span><input type="text" name="signature" value="<?php if(isset($asap['ActivityLog']))echo $asap['ActivityLog']['signature'];?>">
	</div>
</div>
</td>
<script>
$(function(){
    $('.addrow').click(function(){
        
        $('.tableadd').append('<tr><td><input type="text" class="activity_date" name="asapdate[]" value=""></td>'
				+'<td><input type="text" class="activity_time" name="asaptime[]" value=""></td>'
				+'<td><input type="text" name="asapdesc[]" value=""></td>'
			+'</tr>');
   $('.removelast').show();
    })
   <?php if($this->params['action']=='view_detail')
   {?>
   
   $('.asap input').attr('readonly','readonly');
   $('.addremove').hide();
   
   <?php } ?> 
});
</script>