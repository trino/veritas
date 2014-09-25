<tr>
    <td colspan="2" style="padding: 0;">
<?php
if($personnel && count($personnel)>0) 
{?>
<table class="dep">

<tr class="entries">
    <td colspan="11"><strong>Personnel</strong></td>
</tr>
<tr class="entries">
    <td><strong>Position</strong></td>
    <td><strong>Number of Staff</strong></td>
    <td><strong>Start Time</strong></td>
    <td><strong>End Time</strong></td>
    <td><strong>Hours worked each</strong></td>
    <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>><strong>Hours Billable</strong></td>
    <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>><strong>Travel Billable</strong></td>
    <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>><strong>Meal Per Diem Billable</strong></td>
    <td><strong>Admin Fee</strong></td>
</tr>
<?php
    foreach($personnel as $per)
    {
        $total = $per['Personnel']['total'];
        $tax = $per['Personnel']['tax'];
        $a_fee = $per['Personnel']['a_fee'];
        $g_total = $per['Personnel']['g_total'];
        ?>
        <tr>
            <td><?php echo $per['Personnel']['position']?></td>
            <td><?php echo $per['Personnel']['no_of_staff']?></td>
            <td><?php echo $per['Personnel']['start_time']?></td>
            <td><?php echo $per['Personnel']['end_time']?></td>
            <td ><?php echo $per['Personnel']['total_hours']?></td>
            <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>>$<?php echo $per['Personnel']['hours_billable']?></td>
            <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>>$<?php echo $per['Personnel']['travel_billable']?></td>
            <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>>$<?php echo $per['Personnel']['meal_billable']?></td>
            <td ><?php if($per['Personnel']['admin_fee']){?>&#10004;<?php }?></td>
        </tr>
        <?php
    }?>

</table>
<?php
}
?>
<?php
if($equipment && count($equipment)>0)
{?>
<table class="misc" style="border-bottom:1px solid #ddd">
    
    <tr class="misc_entries"><td colspan="7" style="padding-top: 50px;"><strong>Equipment</strong></td></tr>
    <tr class="misc_entries"><td><strong>Item</strong></td><td><strong>Quantity</strong></td>
    <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>><strong>Amount Billable</strong></td>
    <td><strong>Admin Fee</strong></td></tr>
    <?php

     $arr1 = array('Radio','Internet Stick','Tapes','SD Card','DVD','Hotel');     
     $arr2 = array('Security Vehicle Regular','Security Vehicle Large','15 Pessenger Van','School Bus','Coach Bus','Transport Truck');
     $arr3 = array('Air Fair');
     
    foreach($equipment as $per)
    {
        $total = $per['Equipment']['total'];
        $tax = $per['Equipment']['tax'];
        $a_fee = $per['Equipment']['a_fee'];
        $g_total = $per['Equipment']['g_total'];
        if(in_array($per['Equipment']['items'],$arr1)){
        ?>
        <tr>
            <td><?php echo $per['Equipment']['items'];?></td>
            <td><?php echo $per['Equipment']['qty'];?></td>
            <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>>$<?php echo $per['Equipment']['amount_billable'];?></td>
            <td><?php if($per['Equipment']['admin_fee']){?>&#10004;<?php }?></td>
        </tr>
        <?php
        }
    }?>
    <tr class="misc_entries2" ><td colspan="7" style="padding-top: 50px;"><strong>Vehicle</strong></td></tr>
    <tr class="misc_entries2" ><td><strong>Item</strong></td><td><strong>Quantity</strong></td><td><strong>KM's</strong></td>
    <td><strong>Fuel Cost (excluding tax and admin)</strong></td><td></td>
    <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>><strong>Amount Billable</strong></td><td><strong>Admin Fee</strong></td></tr>
    <?php
   
    foreach($equipment as $eq)
    {
       $total = $eq['Equipment']['total'];
            $tax = $eq['Equipment']['tax'];
            $a_fee = $eq['Equipment']['a_fee'];
            $g_total = $eq['Equipment']['g_total']; 
        if(in_array($eq['Equipment']['items'],$arr2)){
    ?>
    <tr><td><?php echo $eq['Equipment']['items'];?></td>
        <td><?php echo $eq['Equipment']['qty'];?></td>
        <td><?php echo $eq['Equipment']['kms'];?></td>
        <td>$<?php echo $eq['Equipment']['fuel_cost'];?></td><td></td>
        <td <?php if($this->Session->read('is_client')=='0'){ echo 'style="display:none;"';}?>>$<?php echo $eq['Equipment']['amount_billable'];?></td>
        <td><?php if($per['Equipment']['admin_fee']){?>&#10004;<?php }?></td>
    </tr>  
      <?php  
      }
    }
   
    
?>
</table>
<?php }
?>
<table class="misc" style="border-bottom:1px solid #ddd">
   
    <tr class="misc_entries3" ><td colspan="7"><strong>Other</strong></td></tr>
    <tr class="misc_entries3" ><td><strong>Item</strong></td><td></td><td></td><td ><strong>Fair</strong></td><td></td><td></td><td><strong>Admin Fee</strong></td></tr>
    <?php
    if(isset($equipment))
    foreach($equipment as $eq)
    {
        
        if(in_array($eq['Equipment']['items'],$arr3)){
            $total = $eq['Equipment']['total'];
            $tax = $eq['Equipment']['tax'];
            $a_fee = $eq['Equipment']['a_fee'];
            if($a_fee)
                $af_tot = $eq['Equipment']['a_fee'];
            $g_total = $eq['Equipment']['g_total'];
            if($eq['Equipment']['qty']<1)
                $eq['Equipment']['qty1']=1;
            else
                $eq['Equipment']['qty1']=$eq['Equipment']['qty'];
      ?>
    <tr><td id="<?php echo $eq['Equipment']['amount_billable']/$eq['Equipment']['qty1'];?>"><?php echo $eq['Equipment']['items'];?></td><td></td><td></td><td><?php echo "$".number_format($eq['Equipment']['fuel_cost'],2);?></td><td ></td><td></td><td><?php if($eq['Equipment']['admin_fee']){?>&#10004;<?php }?></td></tr>  
      <?php  
      }
      
    }
    ?>
</table>
<table style="border-bottom: 1px solid #DDD;<?php if($this->Session->read('is_client')=='0'){ echo 'display:none;';}?>" >
<tr><td style="padding-top: 50px;"><strong>Total: <span class="g_tot">$<?php echo number_format($total,2);?></span></strong><input type="hidden" name="total" value="<?php if(isset($pers)) echo $total;?>" id="g_tot"  /></td></tr>
<tr><td><strong>Tax: <span class="tax">$<?php echo number_format($tax,2);?></span></strong><input type="hidden" name="tax" value="<?php if(isset($pers)) echo $tax;?>" id="tax"  /></td></tr>
<tr><td><strong>Admin Fee: <span class="a_fee">$<?php  echo number_format($a_fee,2);?></span></strong><input type="hidden" name="a_fee" value="<?php if(isset($pers)) echo $a_fee;?>" id="a_fee"  /></td></tr>
<tr><td><strong>Grand Total: <span class="g2_tot">$<?php echo number_format($g_total,2);?></span></strong><input type="hidden" name="g2_tot" value="<?php if(isset($pers)) echo $g_total;?>" id="g2_tot"  /></td></tr>
</table>
</td>
</tr>