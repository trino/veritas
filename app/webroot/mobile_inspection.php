    <td colspan="3" style="padding: 0;">
        <table class="table mobileins_table">
            <tr>
                <td style="width: 135px!important;border-top:none">No : </td><td style="border-top:none"><input type="text" name="mobile_ins[no]" class="" value="<?php if(isset($mobins) && $mobins['MobileInspection']['no']){echo $mobins['MobileInspection']['no'];}?>" /></td>
                <td style="width: 150px!important;border-top:none">Date : </td><td style="border-top:none"><input type="text" name="mobile_ins[date]" class="date_verify " value="<?php if(isset($mobins) && $mobins['MobileInspection']['date']){echo $mobins['MobileInspection']['date'];}?>" /></td>
            </tr>
        <tr>
        <td style="height:30px"><?php echo $this->requestAction('dashboard/translate/Client');?>:</td>
        <td><input type="text" name="mobile_ins[client]" class="" value="<?php if(isset($mobins) && $mobins['MobileInspection']['client']) echo $mobins['MobileInspection']['client'];?>"/></td>
        <td colspan="2" rowspan="2" style="padding: 0;">
            <table>
                <tr><td class="notop" style="height:32px;padding:14px 8px 0 8px;line-height:15px"><strong><?php echo $this->requestAction('dashboard/translate/Types of Mobile Service');?></strong></td><td class="notop" style="height:32px;padding:14px 8px 0 8px;line-height:15px"><strong><?php echo $this->requestAction('dashboard/translate/Time Arrived');?></strong></td><td class="notop" style="height:32px;padding:14px 8px 0 8px;line-height:15px"><strong><?php echo $this->requestAction('dashboard/translate/Time Departed');?></strong></td></tr>
                <tr>
                    <td style="border-left: 1px solid #ddd;">
                        <input type="radio" name="mobile_ins[mobile_service]" class="" value="scheduled" <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='scheduled')echo "checked='checked'";?> /> <?php echo $this->requestAction('dashboard/translate/Scheduled');?><br /><br />
                        <input type="radio" name="mobile_ins[mobile_service]" class="" value="alarm" <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='alarm')echo "checked='checked'";?> /> <?php echo $this->requestAction('dashboard/translate/Alarm Response');?><br /><br />
                        <input type="radio" name="mobile_ins[mobile_service]" class="" value="hour" <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='hour')echo "checked='checked'";?> /> <?php echo $this->requestAction('dashboard/translate/After Hours Request');?><br /><br />
                        <input type="radio" name="mobile_ins[mobile_service]" class="" value="other" <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='other')echo "checked='checked'";?> /> <?php echo $this->requestAction('dashboard/translate/Other');?><br /><br />
                    </td>
                    <td style="border-left: 1px solid #ddd;">
                        <input type="text" class="time" style="width: 135px;" name="mobile_ins[time_arrived1]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived1']){echo $mobins['MobileInspection']['time_arrived1'];}?>" />
                        <br /><br />
                        <input type="text" class="time" style="width: 135px;" name="mobile_ins[time_arrived2]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived2']){echo $mobins['MobileInspection']['time_arrived2'];}?>" />
                        <br /><br />
                        <input type="text" class="time" style="width: 135px;" name="mobile_ins[time_arrived3]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived3']){echo $mobins['MobileInspection']['time_arrived3'];}?>"/>
                        <br /><br />
                        <input type="text" class="time" style="width: 135px;" name="mobile_ins[time_arrived4]"  placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['date']){echo $mobins['MobileInspection']['time_arrived4'];}?>"/>
                    </td>
                    <td style="border-left: 1px solid #ddd;">
                        <input type="text" class="time" style="width: 135px;" name="mobile_ins[time_departed1]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_departed1']){echo $mobins['MobileInspection']['time_departed1'];}?>" />
                        <br /><br />
                        <input type="text" class="time" style="width: 135px;" name="mobile_ins[time_departed2]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_departed2']){echo $mobins['MobileInspection']['time_departed2'];}?>" />
                        <br /><br />
                        <input type="text" class="time" style="width: 135px;" name="mobile_ins[time_departed3]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_departed3']){echo $mobins['MobileInspection']['time_departed3'];}?>"/>
                        <br /><br />
                        <input type="text" class="time" style="width: 135px;" name="mobile_ins[time_departed4]"  placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_departed4']){echo $mobins['MobileInspection']['time_departed4'];}?>"/>
                    </td>
                </tr>
            </table>
        </td>
        </tr>
        <tr>
        <td><?php echo $this->requestAction('dashboard/translate/Address');?>:</td>
        <td><textarea name="mobile_ins[address]" rows="5" class=""><?php if(isset($mobins)) echo $mobins['MobileInspection']['address'];?></textarea></td>
        </tr>
        <tr><td colspan="4">
        <div style="width: 33%;float:left;">P.O. No.: <input type="text" style="width: 150px;" name="mobile_ins[pono]" class="" value="<?php if(isset($mobins) && $mobins['MobileInspection']['pono']){echo $mobins['MobileInspection']['pono'];}?>" /></div>
        <div style="width: 33%;float:left;"><?php echo $this->requestAction('dashboard/translate/Transit');?>/<?php echo $this->requestAction('dashboard/translate/Location No');?>. <input type="text" style="width: 150px;" name="mobile_ins[transitno]" class="" value="<?php if(isset($mobins) && $mobins['MobileInspection']['transitno']){echo $mobins['MobileInspection']['transitno'];}?>" /></div>
        <div style="width: 33%;float:left;"><?php echo $this->requestAction('dashboard/translate/File Key No');?>. <input type="text" style="width: 150px;" name="mobile_ins[filekeyno]" class="" value="<?php if(isset($mobins) && $mobins['MobileInspection']['filekeyno']){echo $mobins['MobileInspection']['filekeyno'];}?>" /></div><div class="clear"></div></td>
        </tr>
        </table>
        <table class="table table-bordered addmoretab mobileins_table">
        <thead ><th width="10%"><?php echo $this->requestAction('dashboard/translate/Time');?></th><th colspan="2"><?php echo $this->requestAction('dashboard/translate/Action Taken');?>/<?php echo $this->requestAction('dashboard/translate/Details Of Inspection');?></th></thead>
        <?php if(isset($mem_action)){
            ?>
            <input type="hidden" name="mobile_id" value="<?php echo $mobins['MobileInspection']['id'];?>"/>
        <?php
            foreach($mem_action as $action)
            {?>
            <tr><td><input type="text" class="time" name="mobtime[]" value="<?php echo $action['MobileAction']['time'];?>"/></td>
                <td><textarea name="mobdetail[]" ><?php echo $action['MobileAction']['detail'];?></textarea></td>
                <td><a href='javascript:void(0)' onclick='$(this).closest("tr").remove();' id="delete" class='btn btn-danger'><?php echo $this->requestAction('dashboard/translate/Delete');?></a></td></tr>
        <?php
            }
        }?>
        <tr class="mobtime" ><td><input type="text" class="time" name="mobtime[]" />
        </td><td><textarea name="mobdetail[]" style="width:500px;height:150px"></textarea></td><td><input type="button" class="btn btn-primary" id="addmore" value="+<?php echo $this->requestAction('dashboard/translate/Add More');?>"/></td></tr >
        </table>
        <table class="mobileins_table" style="border-bottom: 1px solid #ddd;">
        <tr><td><strong><?php echo $this->requestAction('dashboard/translate/Operative Name');?>:</strong><br /><input type="text" name="mobile_ins[operative_name]" class=""  value="<?php if(isset($mobins) && $mobins['MobileInspection']['operative_name']){echo $mobins['MobileInspection']['operative_name'];}?>" /></td>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Licence No');?>:</strong><br /><input type="text" name="mobile_ins[licence_no]" class=""  value="<?php if(isset($mobins) && $mobins['MobileInspection']['licence_no']){echo $mobins['MobileInspection']['licence_no'];}?>" /></td>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Vehicle No');?>:</strong><br /><input type="text" name="mobile_ins[vehicle_no]" class=""  value="<?php if(isset($mobins) && $mobins['MobileInspection']['vehicle_no']){echo $mobins['MobileInspection']['vehicle_no'];}?>" /></td></tr>
        </table>
        
        
        <div style="position: relative;padding:5px;">
            <div style="width: 50%;float:left;">
                <strong>SIGNATURE:</strong><br />
                    <iframe src="<?php echo $this->webroot;?>canvas/example.php" style="width: 100%;border:1px solid #AAA;border-radius:10px;height:340px;">
                        
                    </iframe>
            </div>        
            <?php
            
                if(isset($mobins) && $mobins['MobileInspection']['signature'])
                {
                    ?>
                    
                    <div style="float:left;width:40%;margin-left:5%;">
                    <b><?php echo $this->requestAction('dashboard/translate/Current Signature')?></b><br />
                <img src="<?php echo $this->webroot;?>canvas/<?php echo $mobins['MobileInspection']['signature'];?>" />
            </div>
                    <?php
                    
                }
                ?>
            
            
      <div class="clear"></div>      
    </div>
</td>            

<script>
$(function(){
    $('#addmore').click(function(){
       $('.addmoretab').append("<tr><td><input type='text' class='time' name='mobtime[]' /></td><td><textarea name='mobdetail[]' style='width:500px;height:150px'></textarea></td><td><a href='javascript:void(0)' onclick='$(this).closest(\"tr\").remove();' class='btn btn-danger'><?php echo $this->requestAction('dashboard/translate/Delete');?></a></td></tr>");
       $('.time').timepicker();
    });
   <?php if($this->params['action'] == 'view_detail' ){ ?> 
    $('.mobileins_more').show();
    $('.mobileins_table td').each(function(){
        if($(this).find('input').length >0 || $(this).find('textarea').length>0){
            var vaz = $(this).find('input').val();
            if($(this).find('textarea').length>0){
                var tex = $(this).find('textarea').val();
                $(this).html(tex);
            }
            $(this).html(vaz);
        }
      });
    $('.mobtime , #delete').hide();
   <?php } ?> 
   $('.time').timepicker();
});

$('.date_verify').datepicker({dateFormat: 'yy-mm-dd'});

</script>
<style>input[type="radio"]{margin-top:0;}</style>
<style>
.times .time{margin-right:8px;}
</style>
