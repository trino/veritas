<?php
$first_hi = 0;
$second_hi = 0;
$third_hi = 0;
if(isset($vn) && $vn)
{
    foreach($vn as $v)
    {
          if($v['Vehicle_note']['image']=='first')
          {
             $first_hi=1;  
             $varr['first'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['notes']; 
             $varr['fid'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['note_no'];                                
          }
    }
    foreach($vn as $v)
    {
          if($v['Vehicle_note']['image']=='second')
          {
             $second_hi=1;
             $varr['second'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['notes'];
             $varr['sid'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['note_no'];                               
          }
    }
    foreach($vn as $v)
    {
          if($v['Vehicle_note']['image']=='third')
          {
             $third_hi=1; 
             $varr['third'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['notes'];        
             $varr['tid'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['note_no'];                      
          }
    }
}
if(isset($vehicle) && $vehicle){
$veh = $vehicle['Vehicle_inspection'];
$date = $veh['vehicle_date'];
$hf = $veh['hour_from'];
$mf = $veh['min_from'];
$ht = $veh['hour_to'];
$mt = $veh['min_to'];
$gn = $veh['guard'];
$vun = $veh['vehicle_unit_number'];
$p=$veh['plate'];
$sk = $veh['start_km'];
$fk= $veh['finish_km'];
$l = $veh['light'];
$h = $veh['horn'];
$rl=$veh['rotating_light'];
$sl = $veh['spot_light'];
$sf = $veh['safety'];
$fb = $veh['file_box'];
$lb = $veh['lock_box'];
$fa = $veh['first_aid'];
$o = $veh['ownership'];
$f=$veh['front'];
$b=$veh['back'];
$s = $veh['side'];
$n = $veh['note'];
$or = $veh['operation_review'];
}
else
{

$date = '';
$hf = '';
$mf = '';
$ht = '';
$mt = '';
$gn = '';
$vun = '';
$p='';
$sk = '';
$fk= '';
$l = '';
$h = '';
$rl='';
$sl = '';
$sf = '';
$fb = '';
$lb = '';
$fa = '';
$o = '';
$f='';
$b='';
$s = '';
$n = '';
$or = '';    
}
?>
<tr class="vehicle_inspection" style="display: none;">
    <td colspan="2" style="padding: 0;">
        <table class="table">
            <tr>
                <td colspan="4">    
                    <strong>Vehicle Inspection Sheet</strong>
                </td>
            </tr>
            <tr>
                <td style="width: 95px;">Date</td><td><input type="text" name="vehicle_date" class="date_verify" value="<?php echo $date;?>" /></td>
                <td style="width: 95px;">Shift Times</td>
                <td>
                <?php
                if($hf || $mf)
                {
                    $val1 = trim($hf).':'.trim($mf);
                }
                else
                $val1 = '';
                if($ht || $mt)
                {
                    $val2 = trim($ht).':'.trim($mt);
                }
                else
                $val2 = '';
                ?>
                    <input type="text" name="from" class="time" value="<?php echo $val1;?>" placeholder="Date From" /> &nbsp; - 
                     &nbsp; <input type="text" name="to" class="time" value="<?php echo $val2;?>" placeholder="Date To" />
                </td>
            </tr>
            <tr>
                <td>Guard Name</td><td><input type="text" name="guard" value="<?php echo $gn;?>" /></td>
                <td>Vehicle Unit Number</td><td><input type="text" name="vehicle_unit_number" value="<?php echo $vun;?>" /></td>
            </tr>
            <tr>
                <td>License Plate Number</td><td><input type="text" name="plate" value="<?php echo $p;?>" /></td>
                <td>Start KMs</td><td><input type="text" name="start_km" style="width:100px;" value="<?php echo $sk;?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Finish KMs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="finish_km" style="width:100px;" value="<?php echo $fk;?>" /></td>
            </tr>
            
        </table>
        <table class="checkboxes">
            <tr>
                <td colspan="4" style="background: #000;color:#FFF"><strong>EQUIPMENT CHECK LIST</strong></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="light" value="1" <?php if($l==1){?>checked="checked"<?php }?> /> Light</td>
                <td><input type="checkbox" name="horn" value="1" <?php if($h==1){?>checked="checked"<?php }?> /> Horn</td>
                <td><input type="checkbox" name="rotating_light" value="1" <?php if($rl==1){?>checked="checked"<?php }?> /> Amber Rotating Light</td>
                <td><input type="checkbox" name="spot_light" value="1" <?php if($sl==1){?>checked="checked"<?php }?> /> Spot Light</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="safety" value="1" <?php if($sf==1){?>checked="checked"<?php }?> /> Safety Kit</td>
                <td><input type="checkbox" name="file_box" value="1" <?php if($fb==1){?>checked="checked"<?php }?> /> File Box/Reports</td>
                <td><input type="checkbox" name="lock_box" value="1" <?php if($lb==1){?>checked="checked"<?php }?> /> Lock Box</td>
                <td><input type="checkbox" name="first_aid" value="1" <?php if($fa==1){?>checked="checked"<?php }?> /> First Aid Kit</td>
            </tr>
            <tr>
                <td colspan="4"><input type="checkbox" name="ownership" value="1" <?php if($o==1){?>checked="checked"<?php }?> /> Ownership & Insurance</td>
                
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2"><strong>Highlight area with noticeable dents or scratches</strong></td>
            </tr>
            <tr>
                <td>
                    
                    <img src="<?php echo $base_url;?>img/front.jpg" usemap="#frontmap" class="map" />
                    <map name="frontmap" class="f">
                        <area shape="rect" id="star_1" coords="0,0,100,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_2" coords="100,0,200,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_3" coords="200,0,300,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_4" coords="300,0,400,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star_5" coords="0,109,100,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_6" coords="100,109,200,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_7" coords="200,109,300,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_8" coords="300,109,400,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        
                        <area shape="rect" id="star_9" coords="0,218,100,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_10" coords="100,218,200,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star_11" coords="200,218,300,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star_12" coords="300,218,400,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    <input type="hidden" name="front" value="" class="front" value="<?php echo $f;?>" />
                    <div class="firsthidden" <?php if(!$first_hi){?>style="display: none;"<?php }?>>
                                        
                    </div>
                </td>
                <td>
                    <img src="<?php echo $base_url;?>img/back.jpg" usemap="#backmap" class="map" />
                    <map name="backmap" class="b">
                        <area shape="rect" id="star2_1" coords="0,0,100,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star2_2" coords="100,0,200,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star2_3" coords="200,0,300,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star2_4" coords="300,0,400,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star2_5" coords="0,109,100,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star2_6" coords="100,109,200,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star2_7" coords="200,109,300,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star2_8" coords="300,109,400,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star2_9" coords="0,218,100,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star2_10" coords="100,218,200,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star2_11" coords="200,218,300,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star2_12" coords="300,218,400,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    
                    <input type="hidden" name="back" value="" class="back" value="<?php echo $b;?>" />
                    
                    <div class="secondhidden" <?php if(!$second_hi){?>style="display: none;"<?php }?>>
                       
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <div style="float: left;">
                    <img src="<?php echo $base_url?>img/side.jpg" usemap="#sidemap" class="map" />
                    <map name="sidemap" class="s">
                        <area shape="rect" id="star3_1" coords="0,0,100,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star3_2" coords="100,0,200,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star3_3" coords="200,0,300,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star3_4" coords="300,0,400,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />                        
                        <area shape="rect" id="star3_5" coords="400,0,500,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star3_6" coords="500,0,600,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        
                        
                        
                        <area shape="rect" id="star3_7" coords="0,115,100,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star3_8" coords="100,115,200,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star3_9" coords="200,115,300,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star3_10" coords="300,115,400,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star3_11" coords="400,115,500,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star3_12" coords="500,115,600,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    
                    <input type="hidden" name="side" value="" class="side" value="<?php echo $s;?>" />
                    <div class="thirdhidden" <?php if(!$third_hi){?>style="display: none;"<?php }?>>
                        
                    </div>
                    
                    </div>
                    <div style="float: left;margin-left:20px;margin-top:30px">
                        <strong>Notes for Dents and Scratches<br /></strong>
                        <textarea name="note" placeholder="" style="width:400px;height:157px;"><?php echo $n;?></textarea>
                    </div>
                    <div class="clear"></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="2">Operation Review : <input type="text" name="operation_review" value="<?php echo $or;?>" /></td>                
            </tr>
        </table>        
    </td>
    
</tr>
<script>
$(function(){
    setInterval(function(){
        <?php
                        if(isset($vn) && $vn)
                        {
                            foreach($vn as $v)
                            {
                                if($v['Vehicle_note']['image']=='first')
                                {
                                    ?>
                                    $('.firsthidden input').each(function(){
                                        var cl = $(this).attr('class').replace(' valid');
                                        <?php
                                        foreach($varr['first'] as $k=>$v)
                                        {
                                            ?>
                                            if(cl == '<?php echo $k;?>')
                                            {
                                                $('.'+cl).val('<?php echo $v?>');
                                            }
                                            <?php
                                        } 
                                        ?> 
                                        
                                    });
                                    
                                    <?php
                                }
                                else
                                if($v['Vehicle_note']['image']=='second')
                                {
                                    ?>
                                    $('.secondhidden input').each(function(){
                                        var cl = $(this).attr('class').replace(' valid');
                                        <?php
                                        foreach($varr['second'] as $k=>$v)
                                        {
                                            ?>
                                            if(cl == '<?php echo $k;?>')
                                            {
                                                $('.'+cl).val('<?php echo $v?>');
                                            }
                                            <?php
                                        } 
                                        ?> 
                                        
                                    });
                                    
                                    <?php
                                }
                                else
                                if($v['Vehicle_note']['image']=='third')
                                {
                                    ?>
                                    $('.thirdhidden input').each(function(){
                                        var cl = $(this).attr('class').replace(' valid');
                                        <?php
                                        foreach($varr['third'] as $k=>$v)
                                        {
                                            ?>
                                            if(cl == '<?php echo $k;?>')
                                            {
                                                $('.'+cl).val('<?php echo $v?>');
                                            }
                                            <?php
                                        } 
                                        ?> 
                                        
                                    });
                                    
                                    <?php
                                }
                            }
                        }
                        ?>
        
    },3000);
    
});
</script>
