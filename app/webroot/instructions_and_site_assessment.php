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
<td colspan="3" style="padding: 0;">
    <div style="padding: 5px;">
    <div style="float: left;width:400px;line-height: 27px;">
        <strong>NOTE</strong> : A  SEPARATE  REPORT  MUST  BE  COMPLETED  FOR EACH CHANGE IN SECURITY PERSONNEL.<br/>AN  <strong>INITIAL  SITE  ASSESSMENT</strong>  MUST  CONTAIN  A  VISUAL LOG  OF  THE  FRONT,  REAR,  LEFT  AND  RIGHT  SIDES  OF PROPERTY.  FULL  DETAIL  MUST  BE  DOCUMENTED  OF  THE CURRENT STATE OF THE PROPERTY AT TIME OF ARRIVAL.
    </div>
    <div style="float: right;width:435px;">
        <table>
            <tr style="border-bottom: none;">
                <td><strong>GUARD NAME</strong></td><td><input type="text" name="guard_name" value="<?php echo $guard_name;?>" /></td>
            </tr>
            <tr style="border-bottom: none;">
                <td><strong>DATE (mm/dd/yyyy)</strong></td><td><input type="text" name="date" value="<?php echo $date;?>" /></td>
            </tr>
            <tr style="border-bottom: none;">
                <td><strong>LOSS LOCATION</strong></td><td><input type="text" name="loss_location" value="<?php echo $loss_location;?>" /></td>
            </tr>
            <tr style="border-bottom: none;">
                <td><strong>ARRIVAL TIME</strong> (military time)</td><td><input type="text" name="arrival_time" value="<?php echo $arrival_time;?>" /></td>
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
            <td><textarea style="width: calc(100% - 15px);height:300px;" name="instructions"><?php echo $instruct;?></textarea></td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="2">
                <strong>SITE ASSESSMENT:</strong>
            </td>
            
            
        </tr>
        <tr>
            <td style="width: 25%;"><em>SITE CONDITIONS</em></td><td style="width: 75%;"><textarea name="site_conditions" style="width: calc(100% - 15px);"><?php echo $site_conditions;?></textarea></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>FRONT</em></td><td style="width: 75%;"><textarea name="front" style="width: calc(100% - 15px);"><?php echo $front;?></textarea></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>BACK/REAR</em></td><td style="width: 75%;"><textarea name="back" style="width: calc(100% - 15px);"><?php echo $back;?></textarea></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>LEFT SIDE</em></td><td style="width: 75%;"><textarea name="left_side" style="width: calc(100% - 15px);"><?php echo $left_side;?></textarea></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>RIGHT SIDE</em></td><td style="width: 75%;"><textarea name="right_site" style="width: calc(100% - 15px);"><?php echo $right_side;?></textarea></td>
        </tr>
        <tr>
            <td style="width: 25%;"><em>ADDITIONAL NOTES</em></td><td style="width: 75%;"><textarea name="additional_notes" style="width: calc(100% - 15px);"><?php echo $additional_notes;?></textarea></td>
        </tr>
    </table>
    
    
    
    <div style="position: relative;padding:5px;">
    <div style="width: 50%;float:left;">
        <strong>SIGNATURE:</strong><br />
            <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:280px;">
                
            </iframe>
    </div>        
            <?php
                if($signature)
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b>Current Signature</b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $signature;?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
    
    
    
    
    
</td>
<script>
    $(function(){
       $('.loader').show();
       $('.date_time').hide(); 
    });
</script>


