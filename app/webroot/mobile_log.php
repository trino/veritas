<tr class="mobilelog_more" style="display: none;">
    <td colspan="2">
        <table class="table mobilelog_table">
            
            <tr>
                <td width="20%">Mobile Guard:</td><td><input type="text"  name="log[guard]" class="" value="<?php if(isset($moblog) && $moblog['MobileLog']['guard']){echo $moblog['MobileLog']['guard'];}?>" /> </td>
                <td width="15%">Shift:</td><td><input type="text" class="time " name="log[shift_from]" value="<?php if(isset($moblog) && $moblog['MobileLog']['shift_from']){echo $moblog['MobileLog']['shift_from'];}?>" placeholder="From" style="width: 150px;"  />
                    <input type="text" class="time " name="log[shift_to]" value="<?php if(isset($moblog) && $moblog['MobileLog']['shift_to']){echo $moblog['MobileLog']['shift_to'];}?>" placeholder="To" style="width: 150px;" />
                </td>
                
            </tr>
            <?php if(isset($moblog))
            {?>
            <input type="hidden" name="log_id" value="<?php echo $moblog['MobileLog']['id'];?>"/>
            <?php } ?>
            <tr>
                <td>Start Date</td><td><input type="text" name="log[start_date]" value="<?php if(isset($moblog) && $moblog['MobileLog']['start_date']){echo $moblog['MobileLog']['start_date'];}?>" class="date_verify " /></td>
                <td>End Date</td><td><input type="text" name="log[end_date]" value="<?php if(isset($moblog) && $moblog['MobileLog']['end_date']){echo $moblog['MobileLog']['end_date'];}?>" class="date_verify " /></td>
            </tr>
            <tr>
                <td rowspan="8"></td>
                <td colspan="2">Toyota Patrol (2330 - 0430) </td>
                <td rowspan="8"></td>
            </tr>
            <tr>
                <td><input type="text" class="time" name="log[tyotafrom1]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom1']){echo $moblog['MobileLog']['tyotafrom1'];}?>" style="width: 150px;" /></td>
                <td><input type="text" class="time" name="log[tyotato1]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotato1']){echo $moblog['MobileLog']['tyotato1'];}?>" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td><input type="text" class="time" name="log[tyotafrom2]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom2']){echo $moblog['MobileLog']['tyotafrom2'];}?>" style="width: 150px;" /></td>
                <td><input type="text" class="time" name="log[tyotato2]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotato2']){echo $moblog['MobileLog']['tyotato2'];}?>" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td><input type="text" class="time" name="log[tyotafrom3]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom3']){echo $moblog['MobileLog']['tyotafrom3'];}?>" style="width: 150px;" /></td>
                <td><input type="text" class="time" name="log[tyotato3]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotato3']){echo $moblog['MobileLog']['tyotato3'];}?>" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td><input type="text" class="time" name="log[tyotafrom4]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom4']){echo $moblog['MobileLog']['tyotafrom4'];}?>" style="width: 150px;" /></td>
                <td><input type="text" class="time" name="log[tyotato4]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotato4']){echo $moblog['MobileLog']['tyotato4'];}?>" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td colspan="2">Toyota/ 105 Nashdene (2330 - 0430)</td>
            </tr>
             <tr>
                <td><input type="text" class="time" name="log[tyotafrom5]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom5']){echo $moblog['MobileLog']['tyotafrom5'];}?>" style="width: 150px;" /></td>
                <td><input type="text" class="time" name="log[tyotato5]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotato5']){echo $moblog['MobileLog']['tyotato5'];}?>" style="width: 150px;" /></td>
            </tr>
             <tr>
                <td><input type="text" class="time" name="log[tyotafrom6]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom6']){echo $moblog['MobileLog']['tyotafrom6'];}?>" style="width: 150px;" /></td>
                <td><input type="text" class="time" name="log[tyotato6]" value="<?php if(isset($moblog) && $moblog['MobileLog']['tyotato6']){echo $moblog['MobileLog']['tyotato6'];}?>" style="width: 150px;" /></td>
            </tr>
            
        </table>
        <table class="table addmoretab1 mobilelog_table">
            <tr><td colspan="5"><strong>Mobile / Site Check In</strong></td></tr>
            <tr><td>Arrival</td><td>Depart</td><td>Site Adddress</td><td>Guard Onsite</td><td></td></tr>
            <?php if(isset($mem_site)){
            
            foreach($mem_site as $action)
            {
        ?>
                
                <tr><td><input type="text" class="time" name="arrival[]" value="<?php echo $action['MobileSite']['arrival'];?>"/></td>
                <td><input type="text" name="depart[]" class="time" value="<?php echo $action['MobileSite']['depart'];?>"/></td>
                <td><input type="text" name="siteaddress[]" class="time" value="<?php echo $action['MobileSite']['siteaddress'];?>"/></td>
                <td><input type="text" name="guardonsite[]" class="time" value="<?php echo $action['MobileSite']['guardonsite'];?>"/></td>
                <td><a href='javascript:void(0)' onclick='$(this).closest("tr").remove();' class='btn btn-danger delete'>Delete</a></td></tr>
                
        <?php
            }
            
        }?>
            <tr class="mobtime">
                <td><input type="text" name="arrival[]" class="time" /></td>
                <td><input type="text" name="depart[]" class="time" /></td>
                <td><input type="text" name="siteaddress[]" /></td>
                <td><input type="text" name="guardonsite[]" /></td>
                <td><input type="button" value="+Add More" id="addcheck" class="btn btn-primary"/></td>
            </tr>
        </table>
        
        <table class="table mobilelog_table">
        <tr><td class="wdth" width="35%">Please Remember To Get Receipt For Gas At Petro Canada: </td><td ><input type="text" name="log[receipt]" value="<?php if(isset($moblog) && $moblog['MobileLog']['receipt']){echo $moblog['MobileLog']['receipt'];}?>"/></td></tr>
        </table>
        <table class="mobilelog_table">
        <tr><td width="2%">Points </td><td width="10%"><input type="text" name="log[points]" value="<?php if(isset($moblog) && $moblog['MobileLog']['points']){echo $moblog['MobileLog']['points'];}?>" /></td>
        <td width="1%">/</td><td width="10%"> <input type="text" name="log[ltr]" value="<?php if(isset($moblog) && $moblog['MobileLog']['ltr']){echo $moblog['MobileLog']['ltr'];}?>" /></td>
        <td width="7%">Total LT&nbsp;/ Total $</td>
        <td width="10%"><input type="text" name="log[total]" value="<?php if(isset($moblog) && $moblog['MobileLog']['total']){echo $moblog['MobileLog']['total'];}?>" /></td>
        </tr>
        </table>
        
        <table class="table table-bordered addmoretab2 mobilelog_table">
        <thead ><th width="10%">Time</th><th>Special Notes (Guard Request etc.)</th></thead>
        <?php if(isset($mem_note)){
         
            foreach($mem_note as $action)
            {
        ?>
                
                <tr><td><input type="text" class="time" name="mobtime[]" value="<?php echo $action['MobileNote']['time'];?>"/></td>
                <td><textarea name="mobdetail[]" ><?php echo $action['MobileNote']['detail'];?></textarea></td>
                <td><a href='javascript:void(0)' onclick='$(this).closest("tr").remove();' class="delete btn btn-danger">Delete</a></td></tr>
                
        <?php
            }
            
        }?>
        <tr class="mobtime" ><td><input type="text" class="time" name="mobtime[]" />
        </td><td><textarea name="mobdetail[]" style="width:500px;height:150px"></textarea></td>
        <td><input type="button" class="btn btn-primary" id="addmore1" value="+Add More"/></td></tr >
        
        
        </table>
        <table class="mobilelog_table">
        <tr><td>Sign</td><td><input name="log[sign]" value="<?php if(isset($moblog) && $moblog['MobileLog']['sign']){echo $moblog['MobileLog']['sign'];}?>" /></td><td></td></tr>
        </table>    
    </td>
</tr>

<script>
$(function(){
    
    $('.time').timepicker(); 
    $('#addcheck').click(function(){
       $('.addmoretab1').append('<tr><td><input type="text" class="time" name="arrival[]" /></td><td><input type="text" class="time" name="depart[]" /></td><td><input type="text" name="siteaddress[]" /></td><td><input type="text" name="guardonsite[]" /></td><td><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove();" class="btn btn-danger">Delete</a></td></tr>'); 
         $('.time').timepicker();
    });
    $('#addmore1').click(function(){
       $('.addmoretab2').append("<tr><td><input type='text' class='time' name='mobtime[]' /></td><td><textarea name='mobdetail[]' style='width:500px;height:150px'></textarea></td><td><a href='javascript:void(0)' onclick='$(this).closest(\"tr\").remove();' class='btn btn-danger'>Delete</a></td></tr>"); 
         $('.time').timepicker();
    });
    
     <?php if($this->params['action'] == 'view_detail' ){ ?> 
    $('.mobilelog_more').show();
    
    $('.mobilelog_table td').each(function(){
        
        if($(this).find('input').length >0 || $(this).find('textarea').length>0){
            var vaz = $(this).find('input').val();
            if($(this).find('textarea').length>0){
                var tex = $(this).find('textarea').val();
                $(this).html(tex);
            }
            
            
            $(this).html(vaz);
        }
        
        
    });
    //$('.mobilelog_more input').attr('disabled','disabled');
    //$('.mobilelog_more textarea').attr('disabled','disabled');
    $('.mobtime , .delete').hide();
   <?php } ?> 
});
</script>