<tr>
    <td colspan="2" style="padding: 0;">
<table class="dep">
<tr class="entries">
    <td colspan="10"><strong>Personnel</strong></td>
</tr>
<tr class="entries">
    <td><strong>Position</strong></td><td><strong>Number of Staff</strong></td><td><strong>Hours worked each</strong></td><td><strong>Hours Billable</strong></td><td><strong>Travel Billable</strong></td><td><strong>Meal Per Diem Billable</strong></td>
</tr>
<?php
if($personnel)
{
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
            <td><?php echo $per['Personnel']['total_hours']?></td>
            <td>$<?php echo $per['Personnel']['hours_billable']?></td>
            <td>$<?php echo $per['Personnel']['travel_billable']?></td>
            <td>$<?php echo $per['Personnel']['meal_billable']?></td>
        </tr>
        <?php
    }
}
?>
</table>

<table class="misc" style="border-bottom:1px solid #ddd">
    
    <tr class="misc_entries"><td colspan="6"><strong>Equipment</strong></td></tr>
    <tr class="misc_entries"><td><strong>Item</strong></td><td><strong>Quantity</strong></td><td><strong>Amount Billable</strong></td></tr>
    <?php
if($equipment)
{
     $arr1 = array('Radio','Internet Stick','Tapes','SD Card','DVD','Hotel');     
    $arr2 = array('Security Vehicle Regular','Security Vehicle Large','15 Pessenger Van','School Bus','Coach Bus','Transport Truck');
    
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
            <td>$<?php echo $per['Equipment']['amount_billable'];?></td>
            
        </tr>
        <?php
        }
    }?>
    <tr class="misc_entries2" ><td colspan="6"><strong>Vehicle</strong></td></tr>
    <tr class="misc_entries2" ><td><strong>Item</strong></td><td><strong>Quantity</strong></td><td><strong>KM's</strong></td><td><strong>Fuel Costing (excluding tax and admin)</strong></td><td></td><td><strong>Amount Billable</strong></td></tr>
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
        <td>$<?php echo $eq['Equipment']['amount_billable'];?></td>
    </tr>  
      <?php  
      }
    }
   
    
}
?>
</table>
<table>
<tr><td><strong>Total: <span class="g_tot">$<?php echo $total;?></span></strong><input type="hidden" name="total" value="<?php if(isset($pers)) echo $total;?>" id="g_tot"  /></td></tr>
<tr><td><strong>Tax: <span class="tax">$<?php echo $tax;?></span></strong><input type="hidden" name="tax" value="<?php if(isset($pers)) echo $tax;?>" id="tax"  /></td></tr>
<tr><td><strong>Admin Fee: <span class="a_fee">$<?php  echo $a_fee;?></span></strong><input type="hidden" name="a_fee" value="<?php if(isset($pers)) echo $a_fee;?>" id="a_fee"  /></td></tr>
<tr><td><strong>Grand Total: <span class="g2_tot">$<?php echo $g_total;?></span></strong><input type="hidden" name="g2_tot" value="<?php if(isset($pers)) echo $g_total;?>" id="g2_tot"  /></td></tr>
</table>
</td>
</tr>