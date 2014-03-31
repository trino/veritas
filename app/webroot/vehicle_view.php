<?php

$first_hi = 0;
$second_hi = 0;
$third_hi = 0;
if($vn)
{
    foreach($vn as $v)
    {
          if($v['Vehicle_note']['image']=='first')
          {
             $first_hi=1;  
             $varr['first'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['notes']; 
             $varr['number'][$v['Vehicle_note']['coords']]['first'] = $v['Vehicle_note']['note_no'];                               
          }
          else
          if($v['Vehicle_note']['image']=='second')
          {
             $second_hi=1;
             $varr['second'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['notes'];  
             $varr['number'][$v['Vehicle_note']['coords']]['second'] = $v['Vehicle_note']['note_no'];                             
          }
          else
          if($v['Vehicle_note']['image']=='third')
          {
             $third_hi=1; 
             $varr['third'][$v['Vehicle_note']['coords']] = $v['Vehicle_note']['notes'];   
             $varr['number'][$v['Vehicle_note']['coords']]['third'] = $v['Vehicle_note']['note_no'];                           
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
<tr class="vehicle_inspection" style="border-bottom: 1px solid #DDD;">
    <td colspan="2" style="padding: 0;border-top:none;">
        <table class="" style="font-size: 13px;">
            <tr>
                <td colspan="4" style="border-top: none;">    
                    <strong>Vehicle Inspection Sheet</strong>
                </td>
            </tr>
            <tr>
                <td style="width: 95px;">Date</td><td><?php echo $date;?></td>
                <td style="width: 95px;">Shift Times</td>
                <td>
                    
                        <?php
                        echo $hf.':'.$mf;
                        ?>
                    &nbsp; - &nbsp;
                   
                        <?php
                        echo $ht.':'.$mt;
                        ?>
                    
                </td>
            </tr>
            <tr>
                <td>Guard Name</td><td><?php echo $gn;?></td>
                <td>Vehicle Unit Number</td><td><?php echo $vun;?></td>
            </tr>
            <tr>
                <td>License Plate Number</td><td><?php echo $p;?></td>
                <td>Start KMs</td><td><?php echo $sk;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Finish KMs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fk;?></td>
            </tr>
            
        </table>
        <table class="checkboxes">
            <tr>
                <td colspan="4" style="background: #000;color:#FFF"><strong>EQUIPMENT CHECK LIST</strong></td>
            </tr>
            <tr>
                <td><?php if($l==1){?>&#10004;<?php }?> Light</td>
                <td><?php if($h==1){?>&#10004;<?php }?> Horn</td>
                <td><?php if($rl==1){?>&#10004;<?php }?> Amber Rotating Light</td>
                <td><?php if($sl==1){?>&#10004;<?php }?> Spot Light</td>
            </tr>
            <tr>
                <td><?php if($sf==1){?>&#10004;<?php }?> Safety Kit</td>
                <td><?php if($fb==1){?>&#10004;<?php }?> File Box/Reports</td>
                <td><?php if($lb==1){?>&#10004;<?php }?> Lock Box</td>
                <td><?php if($fa==1){?>&#10004;<?php }?> First Aid Kit</td>
            </tr>
            <tr>
                <td colspan="4"><?php if($o==1){?>&#10004;<?php }?> Ownership & Insurance</td>
                
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2"><strong>Highlighted area with noticeable dents or scratches</strong></td>
            </tr>
            <tr>
                <td>
                    
                    <img src="<?php echo $base_url;?>img/front.jpg" />
                    
                    <div class="notes">
                    <?php
                        if(isset($varr['first']) && $varr['first']){
                            $i=0;
                            echo "<br/>";
                                        foreach($varr['first'] as $k=>$v)
                                        {
                                         $i++;
                                         echo "<strong>Note for ".$varr['number'][$k]['first'].'</strong><br/>'.$v.'<br/><br/>';   
                                                                                        
                                        } 
                                        
                                }
                        
                      ?>
                    </div>
                </td>
                <td>
                    <img src="<?php echo $base_url;?>img/back.jpg" />
                    
                    <div class="notes">
                    <?php
                        if(isset($varr['second']) && $varr['second']){
                            $i=0;
                            echo "<br/>";
                                        foreach($varr['second'] as $k=>$v)
                                        {
                                         $i++;
                                         echo "<strong>Note for ".$varr['number'][$k]['second'].'</strong><br/>'.$v.'<br/><br/>'; 
                                                                                        
                                        } 
                                        
                                }
                             
                      ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <div style="float: left;">
                    <img src="<?php echo $base_url?>img/side.jpg" />
                    
                    <div class="notes">
                    <?php
                        if(isset($varr['third']) && $varr['third']){
                            $i=0;
                            echo "<br/>";
                                        foreach($varr['third'] as $k=>$v)
                                        {
                                         $i++;
                                         echo "<strong>Note for ".$varr['number'][$k]['third'].'</strong><br/>'.$v.'<br/><br/>'; 
                                                                                        
                                        } 
                                        
                                }
                             
                      ?>
                    </div>
                    
                    </div>
                    <div style="float: left;margin-left:20px;margin-top:30px">
                        <strong>Notes for Dents and Scratches<br /></strong><?php echo $n;?>
                    </div>
                    <div class="clear"></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="2">Operation Review : <?php echo $or;?></td>                
            </tr>
        </table>        
    </td>
    
</tr>
