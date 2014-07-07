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
    foreach($equipment as $per)
    {
        ?>
        <tr>
            <td><?php echo $per['Equipment']['items'];?></td>
            <td><?php echo $per['Equipment']['qty'];?></td>
            <td>$<?php echo $per['Equipment']['amount_billable'];?></td>
            
        </tr>
        <?php
    }
}
?>
</table>
</td>
</tr>