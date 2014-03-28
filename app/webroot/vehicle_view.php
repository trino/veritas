<?php
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
<tr class="vehicle_inspection">
    <td colspan="2" style="padding: 0;">
        <table class="table" style="font-size: 13px;">
            <tr>
                <td colspan="4">    
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
                    <img src="<?php echo $base_url;?>img/front.jpg" usemap="#frontmap" class="map" />
                    <map name="frontmap" class="f">
                        <area shape="rect" id="star1" coords="0,0,100,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star2" coords="100,0,200,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star3" coords="200,0,300,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star4" coords="300,0,400,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star5" coords="0,109,100,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star6" coords="100,109,200,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star7" coords="200,109,300,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star8" coords="300,109,400,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        
                        <area shape="rect" id="star9" coords="0,218,100,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star10" coords="100,218,200,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star11" coords="200,218,300,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star12" coords="300,218,400,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    <input type="hidden" name="front" value="" class="front" value="<?php echo $f;?>" />
                </td>
                <td>
                    <img src="<?php echo $base_url;?>img/back.jpg" usemap="#backmap" class="map" />
                    <map name="backmap" class="b">
                        <area shape="rect" id="star13" coords="0,0,100,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star14" coords="100,0,200,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star15" coords="200,0,300,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star16" coords="300,0,400,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star17" coords="0,109,100,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star18" coords="100,109,200,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star19" coords="200,109,300,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star20" coords="300,109,400,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star21" coords="0,218,100,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star22" coords="100,218,200,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star23" coords="200,218,300,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star24" coords="300,218,400,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    
                    <input type="hidden" name="back" value="" class="back" value="<?php echo $b;?>" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <div style="float: left;">
                    <img src="<?php echo $base_url?>img/side.jpg" usemap="#sidemap" class="map" />
                    <map name="sidemap" class="s">
                        <area shape="rect" id="star33" coords="0,0,100,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star34" coords="100,0,200,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star35" coords="200,0,300,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star36" coords="300,0,400,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />                        
                        <area shape="rect" id="star37" coords="400,0,500,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star38" coords="500,0,600,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        
                        
                        
                        <area shape="rect" id="star41" coords="0,115,100,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star42" coords="100,115,200,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star43" coords="200,115,300,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star44" coords="300,115,400,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star39" coords="400,115,500,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star40" coords="500,115,600,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"ff0000","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    
                    <input type="hidden" name="side" value="" class="side" value="<?php echo $s;?>" />
                    
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
