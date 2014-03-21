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
$s = $veh['safety'];
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
$s = '';
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
                <td>Date</td><td><input type="text" name="vehicle_date" class="date_verify" value="<?php echo $date;?>" /></td>
                <td>Shift Times</td>
                <td>
                    <select name="hour_from" style="width: 90px;">
                        <option value="">Hour</option>
                        <?php
                        for($i=0;$i<=23;$i++)
                        {
                            if($i<10)
                            $i="0".$i;
                            ?>
                            <option value="<?php echo $i;?>" <?php if($hf and $hf==$i)echo "selected='selected'";?>><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>&nbsp;
                    <select name="min_from" style="width: 90px;">
                        <option value="">Minute</option>
                        <?php
                        for($i=1;$i<=60;$i++)
                        {
                            if($i<10)
                            $i="0".$i;
                            ?>
                            <option value="<?php echo $i;?>" <?php if($mf and $mf==$i)echo "selected='selected'";?>><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>&nbsp; - &nbsp;
                    <select name="hour_to" style="width: 90px;">
                        <option value="">Hour</option>
                        <?php
                        for($i=0;$i<=23;$i++)
                        {
                            if($i<10)
                            $i="0".$i;
                            ?>
                            <option value="<?php echo $i;?>" <?php if($ht and $ht==$i)echo "selected='selected'";?>><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>&nbsp;
                    <select name="min_to" style="width: 90px;">
                        <option value="">Minute</option>
                        <?php
                        for($i=1;$i<=60;$i++)
                        {
                            if($i<10)
                            $i="0".$i;
                            ?>
                            <option value="<?php echo $i;?>" <?php if($mt and $mt==$i)echo "selected='selected'";?>><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Guard Name</td><td><input type="text" name="guard" value="<?php echo $gn;?>" /></td>
                <td>Vehicle Unit Number</td><td><input type="text" name="vehicle_unit_number" value="<?php echo $vun;?>" /></td>
            </tr>
            <tr>
                <td>License Plate Number</td><td><input type="text" name="plate" value="<?php echo $p;?>" /></td>
                <td colspan="2">Start KMs <input type="text" name="start_km" style="width:100px;" value="<?php echo $sk;?>" />&nbsp;&nbsp;&nbsp;Finish KMs<input type="text" name="finish_km" style="width:100px;" value="<?php echo $fk;?>" /></td>
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
                <td><input type="checkbox" name="safety" value="1" <?php if($s==1){?>checked="checked"<?php }?> /> Safety Kit</td>
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
                <td colspan="2"><strong>Check Vehicle for dents(X) and scratches(O)</strong></td>
            </tr>
            <tr>
                <td>
                    <img src="<?php echo $base_url;?>img/front.jpg" usemap="#frontmap" class="map" />
                    <map name="frontmap" class="f">
                        <area shape="rect" id="star1" coords="0,0,100,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star2" coords="100,0,200,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star3" coords="200,0,300,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star4" coords="300,0,400,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star5" coords="0,109,100,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star6" coords="100,109,200,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star7" coords="200,109,300,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star8" coords="300,109,400,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        
                        <area shape="rect" id="star9" coords="0,218,100,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star10" coords="100,218,200,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star11" coords="200,218,300,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star12" coords="300,218,400,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    <input type="hidden" name="front" value="" class="front" value="<?php echo $f;?>" />
                </td>
                <td>
                    <img src="<?php echo $base_url;?>img/back.jpg" usemap="#backmap" class="map" />
                    <map name="backmap" class="b">
                        <area shape="rect" id="star13" coords="0,0,100,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star14" coords="100,0,200,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star15" coords="200,0,300,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star16" coords="300,0,400,109" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star17" coords="0,109,100,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star18" coords="100,109,200,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star19" coords="200,109,300,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star20" coords="300,109,400,218" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        
                        <area shape="rect" id="star21" coords="0,218,100,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star22" coords="100,218,200,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star23" coords="200,218,300,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star24" coords="300,218,400,327" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    
                    <input type="hidden" name="back" value="" class="back" value="<?php echo $b;?>" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <div style="float: left;">
                    <img src="<?php echo $base_url?>img/side.jpg" usemap="#sidemap" class="map" />
                    <map name="sidemap" class="s">
                        <area shape="rect" id="star33" coords="0,0,100,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star34" coords="100,0,200,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star35" coords="200,0,300,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star36" coords="300,0,400,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />                        
                        <area shape="rect" id="star37" coords="400,0,500,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star38" coords="500,0,600,115" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        
                        
                        
                        <area shape="rect" id="star41" coords="0,115,100,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star42" coords="100,115,200,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star43" coords="200,115,300,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star44" coords="300,115,400,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                        <area shape="rect" id="star39" coords="400,115,500,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}'/>
                        <area shape="rect" id="star40" coords="500,115,600,230" href="javascript:void(0);" class="group" data-maphilight='{"strokeColor":"0000ff","strokeWidth":5,"fillColor":"ff0000","fillOpacity":0.6}' />
                    </map>
                    
                    <input type="hidden" name="side" value="" class="side" value="<?php echo $s;?>" />
                    
                    </div>
                    <div style="float: left;margin-left:20px;margin-top:30px">
                        <textarea name="note" placeholder="Note" style="width:400px;height:157px;"><?php echo $n;?></textarea>
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
