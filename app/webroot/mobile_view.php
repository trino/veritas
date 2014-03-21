<style>
.times .time{margin-right:8px;}
</style>
<tr class="mobileins_more">
    <td colspan="2" style="padding: 0;">
        <table class="table mobileins_table">
        
            <tr>
                <td style="width: 135px!important;">No : </td><td><?php if(isset($mobins) && $mobins['MobileInspection']['no']){echo $mobins['MobileInspection']['no'];}else{echo "-";}?></td>
                <td style="width: 150px!important;">Date : </td><td><?php if(isset($mobins) && $mobins['MobileInspection']['date']){echo $mobins['MobileInspection']['date'];}else{echo "-";}?></td>
            </tr>
        
        
        <tr>
        <td>Client:</td>
        <td><?php if(isset($mobins) && $mobins['MobileInspection']['client']) echo $mobins['MobileInspection']['client'];else{echo "-";}?></td>
        <td style="border-left: 1px solid #e5e5e5;"><strong>Type Of Mobile Service</strong>
            
        </td>
        <td><div style="width: 150px;float:left;margin-right: 26px;"><strong>Time Arrived</strong></div><div style="width: 150px;float:left;"><strong>Time Departed</strong></div><div class="clear"></div></td>
        </tr>
        <tr>
        <td>Address:</td>
        <td><?php if(isset($mobins)) echo $mobins['MobileInspection']['address'];?></td>
        <td style="border-top: 1px solid #f5f5f5;border-left: 1px solid #e5e5e5;">
            <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='scheduled')echo "&#10004;";?> Scheduled<br /><br />
            <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='alarm')echo "&#10004;";?> Alarm Response<br /><br />
            <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='hour')echo "&#10004;";?> After Hours Request<br /><br />
            <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='other')echo "&#10004;";?> Other<br /><br />
            
            
            
        </td>
        <td class="times" style="border-top: 1px solid #f5f5f5;">
        <div style="width: 150px;float:left;margin-right: 26px;"><?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived1']){echo $mobins['MobileInspection']['time_arrived1'];}else echo "-";?></div>
        <div style="width: 150px;float:left;margin-right: 26px;"><?php if(isset($mobins) && $mobins['MobileInspection']['time_departed1']){echo $mobins['MobileInspection']['time_departed1'];}else echo "-";?></div><div class="clear"></div>
        <br />
        <div style="width: 150px;float:left;margin-right: 26px;"><?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived2']){echo $mobins['MobileInspection']['time_arrived2'];}else echo "-";?></div>
        <div style="width: 150px;float:left;margin-right: 26px;"><?php if(isset($mobins) && $mobins['MobileInspection']['time_departed2']){echo $mobins['MobileInspection']['time_departed2'];}else echo "-";?></div><div class="clear"></div>
        <br />
        <div style="width: 150px;float:left;margin-right: 26px;"><?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived3']){echo $mobins['MobileInspection']['time_arrived3'];}else echo "-";?></div>
        <div style="width: 150px;float:left;margin-right: 26px;"><?php if(isset($mobins) && $mobins['MobileInspection']['time_departed3']){echo $mobins['MobileInspection']['time_departed3'];}else echo "-";?></div><div class="clear"></div>
        <br />
        <div style="width: 150px;float:left;margin-right: 26px;"><?php if(isset($mobins) && $mobins['MobileInspection']['date']){echo $mobins['MobileInspection']['time_arrived4'];}else echo "-";?></div>
        <div style="width: 150px;float:left;margin-right: 26px;"><?php if(isset($mobins) && $mobins['MobileInspection']['time_departed4']){echo $mobins['MobileInspection']['time_departed4'];}else echo "-";?></div><div class="clear"></div>
        </td>
        </tr>
        <tr><td colspan="4">
        <div style="width: 33%;float:left;">P.O. No.: <?php if(isset($mobins) && $mobins['MobileInspection']['pono']){echo $mobins['MobileInspection']['pono'];}else{echo "-";}?></div>
        <div style="width: 33%;float:left;">Transit/Location No. <?php if(isset($mobins) && $mobins['MobileInspection']['transitno']){echo $mobins['MobileInspection']['transitno'];}else{echo "-";}?></div>
        <div style="width: 33%;float:left;">File Key No. <?php if(isset($mobins) && $mobins['MobileInspection']['filekeyno']){echo $mobins['MobileInspection']['filekeyno'];}else{echo "-";}?></div><div class="clear"></div></td>
        </tr>

        
        </table>
        <table class="table table-bordered addmoretab mobileins_table" style="margin-bottom: 0;">
        <thead ><th width="10%">Time</th><th colspan="2">Action Taken/Details Of Inspection</th></thead>
        <?php if(isset($mem_action)){
            ?>
            <input type="hidden" name="mobile_id" value="<?php echo $mobins['MobileInspection']['id'];?>"/>
        <?php
            foreach($mem_action as $action)
            {
        ?>
                
                <tr><td><?php if($action['MobileAction']['time'])echo $action['MobileAction']['time'];else echo "-";?></td>
                <td colspan="2"><?php if($action['MobileAction']['detail'])echo $action['MobileAction']['detail'];else echo "-";?></td>
                </tr>
                
        <?php
            }
            
        }?>
        
        
        </table>
        <table class="mobileins_table">
        <tr><td><strong>Operative Name:</strong><br /><?php if(isset($mobins) && $mobins['MobileInspection']['operative_name']){echo $mobins['MobileInspection']['operative_name'];}else{echo "-";}?></td>
        <td><strong>Licence No:</strong><br /><?php if(isset($mobins) && $mobins['MobileInspection']['licence_no']){echo $mobins['MobileInspection']['licence_no'];}else{echo "-";}?></td>
        <td><strong>Vehicle No:</strong><br /><?php if(isset($mobins) && $mobins['MobileInspection']['vehicle_no']){echo $mobins['MobileInspection']['vehicle_no'];}else{echo "-";}?></td></tr>
        
        </table>
</td>            
</tr>

