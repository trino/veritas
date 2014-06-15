<?php
if(isset($instructions)&&$instructions)
{
    $in = $instructions['Instruction'];
    $guard_name = $in['guard_name'];
    $date = $in['date'];
    $loss_location = $in['loss_location'];
    $arrival_time = $in['arrival_time'];
    $instruct = $in['instructions'];
    $site_conditions = $in['site_conditions'];
    $front = $in['front'];
    $back = $in['back'];
    $left_side = $in['left_side'];
    $right_side = $in['right_side'];
    $additional_notes = $in['additional_notes'];
    $signature = $in['signature'];
}
else
{
    
    $guard_name = '';
    $date = '';
    $loss_location = '';
    $arrival_time = '';
    $instruct = '';
    $site_conditions = '';
    $front = '';
    $back = '';
    $left_side = '';
    $right_side = '';
    $additional_notes = '';
    $signature = '';
}
?>
<tr>
<td colspan="2" style="padding: 0;">
    <div style="padding: 5px;">
    <div style="float: left;width:400px;line-height: 27px;">
        <strong>NOTE</strong> : A  SEPARATE  REPORT  MUST  BE  COMPLETED  FOR EACH CHANGE IN SECURITY PERSONNEL.<br/>AN  <strong>INITIAL  SITE  ASSESSMENT</strong>  MUST  CONTAIN  A  VISUAL LOG  OF  THE  FRONT,  REAR,  LEFT  AND  RIGHT  SIDES  OF PROPERTY.  FULL  DETAIL  MUST  BE  DOCUMENTED  OF  THE CURRENT STATE OF THE PROPERTY AT TIME OF ARRIVAL.
    </div>
    <div style="float: right;width:435px;">
        <table>
            <tr style="border-bottom: none;">
                <td style="border-top: none;"><strong>GUARD NAME</strong></td><td style="border-top: none;"><?php echo $guard_name;?></td>
            </tr>
            <tr style="border-bottom: none;">
                <td style="border-top: none;"><strong>DATE (mm/dd/yyyy)</strong></td><td style="border-top: none;"><?php echo $date;?></td>
            </tr>
            <tr style="border-bottom: none;">
                <td style="border-top: none;"><strong>LOSS LOCATION</strong></td><td style="border-top: none;"><?php echo $loss_location;?></td>
            </tr>
            <tr style="border-bottom: none;">
                <td style="border-top: none;"><strong>ARRIVAL TIME</strong> (military time)</td><td style="border-top: none;"><?php echo $arrival_time;?></td>
            </tr>
        </table>
    </div>
    <div style="clear: both;"></div>
    </div>
    <table class="table"> 
        <tr>
            <td><strong>INSTRUCTIONS (include details on who initiated the changes and the time of changes):</strong></td>
        </tr>
        
        <tr>
            <td><?php echo $instruct;?></td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="2">
                <strong>SITE ASSESSMENT:</strong>
            </td>
            
            
        </tr>
        <tr>
            <td style="width: 25%;"><em>SITE CONDITIONS</em></td><td style="width: 75%;"><?php echo $site_conditions;?></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>FRONT</em></td><td style="width: 75%;"><?php echo $front;?></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>BACK/REAR</em></td><td style="width: 75%;"><?php echo $back;?></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>LEFT SIDE</em></td><td style="width: 75%;"><?php echo $left_side;?></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>RIGHT SIDE</em></td><td style="width: 75%;"><?php echo $right_side;?></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>ADDITIONAL NOTES</em></td><td style="width: 75%;"><?php echo $additional_notes;?></td>
        </tr>
    </table>
    
    
    
    <div style="position: relative;padding:5px;">
           
            <?php
                if($signature)
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <strong>SIGNATURE:</strong><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $signature;?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
    
    
    
    
    
</td>
</tr>
<script>
    $(function(){
       $('.loader').show();
       $('.date_time').hide(); 
    });
</script>


