<style>
.times .time{margin-right:8px;}
</style>
<tr class="mobileins_more" style="border-bottom: 1px solid #DDD;">
    <td colspan="2" style="padding: 0;">
        <table class="mobileins_table" style="border-left:none;">
        
            <tr>
                <td style="width: 135px!important;border-top:none;">No : </td><td style="border-top: none;"><?php if(isset($mobins) && $mobins['MobileInspection']['no']){echo $mobins['MobileInspection']['no'];}else{echo "-";}?></td>
                <td style="width: 150px!important;border-top:none;">Date : </td><td style="border-top: none;"><?php if(isset($mobins) && $mobins['MobileInspection']['date']){echo $mobins['MobileInspection']['date'];}else{echo "-";}?></td>
            </tr>
        
        
        <tr>
         <td style="height:30px">Client:</td>
        <td><?php if(isset($mobins) && $mobins['MobileInspection']['client']) echo $mobins['MobileInspection']['client'];else{echo "-";}?></td>
        <td colspan="2" rowspan="2" style="padding: 0;">
            <table>
                <tr><td class="notop" style="height:32px;padding:14px 8px 0 8px;line-height:15px"><strong><?php echo $this->requestAction('dashboard/translate/Types of Mobile Service');?></strong></td><td class="notop" style="height:32px;padding:14px 8px 0 8px;line-height:15px"><strong>Time Arrived</strong></td><td class="notop" style="height:32px;padding:14px 8px 0 8px;line-height:15px"><strong>Time Departed</strong></td></tr>
                <tr>
                    <td style="border-left: 1px solid #ddd;">
                        <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='scheduled')echo "&#10004;";?> <?php echo $this->requestAction('dashboard/translate/Scheduled');?><br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='alarm')echo "&#10004;";?> <?php echo $this->requestAction('dashboard/translate/Alarm Response');?><br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='hour')echo "&#10004;";?> <?php echo $this->requestAction('dashboard/translate/After Hours Request');?><br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='other')echo "&#10004;";?> <?php echo $this->requestAction('dashboard/translate/Other');?><br /><br />
                    </td>
                    <td style="border-left: 1px solid #ddd;">
                        <?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived1']){echo $mobins['MobileInspection']['time_arrived1'];}else echo "-";?>
                        <br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived2']){echo $mobins['MobileInspection']['time_arrived2'];}else echo "-";?>
                        <br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived3']){echo $mobins['MobileInspection']['time_arrived3'];}else echo "-";?>
                        <br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['date']){echo $mobins['MobileInspection']['time_arrived4'];}else echo "-";?>
                    </td>
                    <td style="border-left: 1px solid #ddd;">
                        <?php if(isset($mobins) && $mobins['MobileInspection']['time_departed1']){echo $mobins['MobileInspection']['time_departed1'];}else echo "-";?>
                        <br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['time_departed2']){echo $mobins['MobileInspection']['time_departed2'];}else echo "-";?>
                        <br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['time_departed3']){echo $mobins['MobileInspection']['time_departed3'];}else echo "-";?>
                        <br /><br />
                        <?php if(isset($mobins) && $mobins['MobileInspection']['time_departed4']){echo $mobins['MobileInspection']['time_departed4'];}else echo "-";?>
                    </td>
                </tr>
            </table>            
        </td>
        
        </tr>
        <tr>
        <td><?php echo $this->requestAction('dashboard/translate/Address');?>:</td>
        <td><?php if(isset($mobins)) echo $mobins['MobileInspection']['address'];?></td>
        
        </tr>
        <tr><td colspan="4">
        <div style="width: 33%;float:left;">P.O. No.: <?php if(isset($mobins) && $mobins['MobileInspection']['pono']){echo $mobins['MobileInspection']['pono'];}else{echo "-";}?></div>
        <div style="width: 33%;float:left;"><?php echo $this->requestAction('dashboard/translate/Transit');?>/<?php echo $this->requestAction('dashboard/translate/Location No');?>. <?php if(isset($mobins) && $mobins['MobileInspection']['transitno']){echo $mobins['MobileInspection']['transitno'];}else{echo "-";}?></div>
        <div style="width: 33%;float:left;"><?php echo $this->requestAction('dashboard/translate/File Key No');?>. <?php if(isset($mobins) && $mobins['MobileInspection']['filekeyno']){echo $mobins['MobileInspection']['filekeyno'];}else{echo "-";}?></div><div class="clear"></div></td>
        </tr>

        
        </table>
        <table class="addmoretab mobileins_table" style="margin-bottom: 0;border-top:1px solid #DDD">
        <thead ><tr style="border-bottom: none!important;"><th width="10%" style="border-bottom: none!important;"><?php echo $this->requestAction('dashboard/translate/Time');?></th><th colspan="2" style="border-bottom: none!important;"><?php echo $this->requestAction('dashboard/translate/Action Taken');?>/<?php echo $this->requestAction('dashboard/translate/Details Of Inspection');?></th></tr></thead>
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
        <table class="mobileins_table" style="border-bottom: 1px solid #DDD;">
        <tr><td><strong><?php echo $this->requestAction('dashboard/translate/Operative Name');?>:</strong><br /><?php if(isset($mobins) && $mobins['MobileInspection']['operative_name']){echo $mobins['MobileInspection']['operative_name'];}else{echo "-";}?></td>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Licence No');?>:</strong><br /><?php if(isset($mobins) && $mobins['MobileInspection']['licence_no']){echo $mobins['MobileInspection']['licence_no'];}else{echo "-";}?></td>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Vehicle No');?>:</strong><br /><?php if(isset($mobins) && $mobins['MobileInspection']['vehicle_no']){echo $mobins['MobileInspection']['vehicle_no'];}else{echo "-";}?></td></tr>
        
        </table>
        
        <div style="position: relative;padding:5px;">
           
            <?php
            $signature = $mobins['MobileInspection']['signature'];
                if(isset($mobins) && $signature)
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

