
<tr class="mobileins_more" style="display: none;">
    <td colspan="2">
        <table class="table">
        
            <tr>
                <td colspan="4"><strong>Mobile Inspection Report</strong></td>
            </tr>
            <tr>
                <td>No : </td><td><input type="text" name="mobile_ins[no]" class="required" value="<?php if(isset($mobins) && $mobins['MobileInspection']['no']){echo $mobins['MobileInspection']['no'];}?>" /></td>
                <td>Date : </td><td><input type="text" name="mobile_ins[date]" class="date_verify required" value="<?php if(isset($mobins) && $mobins['MobileInspection']['date']){echo $mobins['MobileInspection']['date'];}?>" /></td>
            </tr>
        </table>
         <br />
        <table class="table-bordered">
        <tr>
        <td>Client:</td>
        <td><input type="text" name="mobile_ins['client']" class="required" value="<?php if(isset($mobins) && $mobins['MobileInspection']['client']) echo $mobins['MobileInspection']['client'];?>"/></td>
        <td rowspan="4">Type Of Mobile Service<br /><br />
            <input type="radio" name="mobile_ins[mobile_service]" class="required" value="scheduled" <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='scheduled')echo "checked='checked'";?> /> Scheduled<br /><br />
            <input type="radio" name="mobile_ins[mobile_service]" class="required" value="alarm" <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='alarm')echo "checked='checked'";?> /> Alarm Response<br /><br />
            <input type="radio" name="mobile_ins[mobile_service]" class="required" value="hour" <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='hour')echo "checked='checked'";?> /> After Hours Request<br /><br />
            <input type="radio" name="mobile_ins[mobile_service]" class="required" value="other" <?php if(isset($mobins) && $mobins['MobileInspection']['mobile_service']=='other')echo "checked='checked'";?> /> Other<br /><br />
        </td>
        <td>Time Arrived</td>
        <td>Time Departed</td>
        </tr>
        <tr>
        <td rowspan="3">Address:</td>
        <td rowspan="3"><textarea name="mobile_ins[address]" rows="5" class="required"><?php if(isset($mobins)) echo $mobins['MobileInspection']['address'];?></textarea></td>
        <td><input type="text" class="time" style="width: 150px;" name="mobile_ins[time_arrived1]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived1']){echo $mobins['MobileInspection']['time_arrived1'];}?>" /></td>
        <td><input type="text" class="time" style="width: 150px;" name="mobile_ins[time_departed1]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_departed1']){echo $mobins['MobileInspection']['time_departed1'];}?>" /></td>
        </tr>

        <tr><td><input type="text" class="time" style="width: 150px;" name="mobile_ins[time_arrived2]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived2']){echo $mobins['MobileInspection']['time_arrived2'];}?>" /></td>
        <td><input type="text" class="time" style="width: 150px;" name="mobile_ins[time_departed2]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_departed2']){echo $mobins['MobileInspection']['time_departed2'];}?>" /></td></tr>
        <tr><td><input type="text" class="time" style="width: 150px;" name="mobile_ins[time_arrived3]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_arrived3']){echo $mobins['MobileInspection']['time_arrived3'];}?>"/></td>
        <td><input type="text" class="time" style="width: 150px;" name="mobile_ins[time_departed3]" placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_departed3']){echo $mobins['MobileInspection']['time_departed3'];}?>"/></td></tr>
        <tr><td>P.O. No.: <input type="text" style="width: 150px;" name="mobile_ins[pono]" class="required" value="<?php if(isset($mobins) && $mobins['MobileInspection']['pono']){echo $mobins['MobileInspection']['pono'];}?>" /></td>
        <td>Transit/Location No. <input type="text" style="width: 150px;" name="mobile_ins[transitno]" class="required" value="<?php if(isset($mobins) && $mobins['MobileInspection']['transitno']){echo $mobins['MobileInspection']['transitno'];}?>" /></td>
        <td>File Key No. <input type="text" style="width: 150px;" name="mobile_ins[filekeyno]" class="required" value="<?php if(isset($mobins) && $mobins['MobileInspection']['filekeyno']){echo $mobins['MobileInspection']['filekeyno'];}?>" /></td>
        <td><input type="text" class="time" style="width: 150px;" name="mobile_ins[time_arrived4]"  placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['date']){echo $mobins['MobileInspection']['time_arrived4'];}?>"/></td>
        <td><input type="text" class="time" style="width: 150px;" name="mobile_ins[time_departed4]"  placeholder="HH:MM" value="<?php if(isset($mobins) && $mobins['MobileInspection']['time_departed4']){echo $mobins['MobileInspection']['time_departed4'];}?>"/></td></tr>

        </table>
        <br />
        <br />
        <table class="table table-bordered addmoretab">
        <thead ><th width="10%">Time</th><th>Action Taken/Details Of Inspection</th></thead>
        <?php if(isset($mem_action)){
            ?>
            <input type="hidden" name="mobile_id" value="<?php echo $mobins['MobileInspection']['id'];?>"/>
        <?php
            foreach($mem_action as $action)
            {
        ?>
                
                <tr><td><input type="text" class="time" name="mobtime[]" value="<?php echo $action['MobileAction']['time'];?>"/></td>
                <td><textarea name="mobdetail[]" ><?php echo $action['MobileAction']['detail'];?></textarea></td>
                <td><a href='javascript:void(0)' onclick='$(this).closest("tr").remove();' id="delete" class='btn btn-danger'>Delete</a></td></tr>
                
        <?php
            }
            
        }?>
        <tr class="mobtime" ><td><input type="text" class="time" name="mobtime[]" />
        </td><td><textarea name="mobdetail[]" style="width:500px;height:150px"></textarea></td><td><input type="button" class="btn btn-primary" id="addmore" value="+Add More"/></td></tr >
        
        </table>
        <table>
        <thead><th>Operative Name:</th><th>Licence No:</th><th>Vehicle No:</th></thead>
        <tr><td><input type="text" name="mobile_ins[operative_name]" class="required"  value="<?php if(isset($mobins) && $mobins['MobileInspection']['operative_name']){echo $mobins['MobileInspection']['operative_name'];}?>" /></td>
        <td><input type="text" name="mobile_ins[licence_no]" class="required"  value="<?php if(isset($mobins) && $mobins['MobileInspection']['licence_no']){echo $mobins['MobileInspection']['licence_no'];}?>" /></td>
        <td><input type="text" name="mobile_ins[vehicle_no]" class="required"  value="<?php if(isset($mobins) && $mobins['MobileInspection']['vehicle_no']){echo $mobins['MobileInspection']['vehicle_no'];}?>" /></td>
        </tr>
        </table>
</td>            
</tr>
<script>
$(function(){
    $('#addmore').click(function(){
       $('.addmoretab').append("<tr><td><input type='text' class='time' name='mobtime[]' /></td><td><textarea name='mobdetail[]' style='width:500px;height:150px'></textarea></td><td><a href='javascript:void(0)' onclick='$(this).closest(\"tr\").remove();' class='btn btn-danger'>Delete</a></td></tr>"); 
    });
   <?php if($this->params['action'] == 'view_detail' ){ ?> 
    $('.mobileins_more').show();
    $('.mobileins_more input').attr('disabled','disabled');
    $('.mobileins_more textarea').attr('disabled','disabled');
    $('.mobtime , #delete').hide();
   <?php } ?> 
   
   $('.time').timepicker();
});
</script>
<style>input[type="radio"]{margin-top:0;}</style>
