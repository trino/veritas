<tr class="mobilelog_more">
    <td colspan="2" style="padding: 0;">
        <table class="table mobilelog_table">
            
            <tr>
                <td style="width:100px!important;">Mobile Guard:</td><td><?php if(isset($moblog) && $moblog['MobileLog']['guard']){echo $moblog['MobileLog']['guard'];}?> </td>
                <td style="width:100px!important;">Shift:</td><td><?php if(isset($moblog) && $moblog['MobileLog']['shift_from']){echo $moblog['MobileLog']['shift_from'];}?> - <?php if(isset($moblog) && $moblog['MobileLog']['shift_to']){echo $moblog['MobileLog']['shift_to'];}?></td>
                
            </tr>
            <?php if(isset($moblog))
            {?>
            <input type="hidden" name="log_id" value="<?php echo $moblog['MobileLog']['id'];?>"/>
            <?php } ?>
            <tr>
                <td>Start Date</td><td><?php if(isset($moblog) && $moblog['MobileLog']['start_date']){echo $moblog['MobileLog']['start_date'];}?></td>
                <td>End Date</td><td><?php if(isset($moblog) && $moblog['MobileLog']['end_date']){echo $moblog['MobileLog']['end_date'];}?></td>
            </tr>
            <tr>
                <td colspan="4">
                
                <div style="width: 360px;margin:10px auto;">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2">
                                <center><strong>Toyota Patrol (2330 - 0430)</strong></center>
                            </td>
                        </tr>
                        <tr>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom1']){echo $moblog['MobileLog']['tyotafrom1'];}?></td>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotato1']){echo $moblog['MobileLog']['tyotato1'];}?></td>
                        </tr>
                         <tr>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom2']){echo $moblog['MobileLog']['tyotafrom2'];}?></td>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotato2']){echo $moblog['MobileLog']['tyotato2'];}?></td>
                        </tr>
                         <tr>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom3']){echo $moblog['MobileLog']['tyotafrom3'];}?></td>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotato3']){echo $moblog['MobileLog']['tyotato3'];}?></td>
                        </tr>
                         <tr>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom4']){echo $moblog['MobileLog']['tyotafrom4'];}?></td>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotato4']){echo $moblog['MobileLog']['tyotato4'];}?></td>
                        </tr>
                         <tr>
                            <td colspan="2"><center><strong>Toyota/ 105 Nashdene (2330 - 0430)</strong></center></td>
                        </tr>
                         <tr>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom5']){echo $moblog['MobileLog']['tyotafrom5'];}?></td>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotato5']){echo $moblog['MobileLog']['tyotato5'];}?></td>
                        </tr>
                         <tr>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom6']){echo $moblog['MobileLog']['tyotafrom6'];}?></td>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotato6']){echo $moblog['MobileLog']['tyotato6'];}?></td>
                        </tr>
                    </table>
                </div>
                </td>
                
            </tr>
            
            
        </table>
        <table class="table addmoretab1 mobilelog_table">
            <tr><td colspan="5"><strong>Mobile / Site Check In</strong></td></tr>
            <tr><td>Arrival</td><td>Depart</td><td>Site Adddress</td><td>Guard Onsite</td></tr>
            <?php if(isset($mem_site)){
            
            foreach($mem_site as $action)
            {
        ?>
                
                <tr><td><?php echo $action['MobileSite']['arrival'];?></td>
                <td><?php echo $action['MobileSite']['depart'];?></td>
                <td><?php echo $action['MobileSite']['siteaddress'];?></td>
                <td><?php echo $action['MobileSite']['guardonsite'];?></td>
                </tr>
                
        <?php
            }
            
        }?>
            
        </table>
        
        <table class="table mobilelog_table">
        <tr><td class="wdth" width="35%">Please Remember To Get Receipt For Gas At Petro Canada: </td><td ><?php if(isset($moblog) && $moblog['MobileLog']['receipt']){echo $moblog['MobileLog']['receipt'];}?></td></tr>
        </table>
        <table class="mobilelog_table">
        <tr><td width="2%">Points </td><td width="10%"><?php if(isset($moblog) && $moblog['MobileLog']['points']){echo $moblog['MobileLog']['points'];}?></td>
        <td width="1%">/</td><td width="10%"> <?php if(isset($moblog) && $moblog['MobileLog']['ltr']){echo $moblog['MobileLog']['ltr'];}?></td>
        <td width="7%">Total LT&nbsp;/ Total $</td>
        <td width="10%"><?php if(isset($moblog) && $moblog['MobileLog']['total']){echo $moblog['MobileLog']['total'];}?></td>
        </tr>
        </table>
        
        <table class="table table-bordered addmoretab2 mobilelog_table" style="margin-bottom: 0;">
        <thead ><th width="10%">Time</th><th>Special Notes (Guard Request etc.)</th></thead>
        <?php if(isset($mem_note)){
         
            foreach($mem_note as $action)
            {
        ?>
                
                <tr><td><?php echo $action['MobileNote']['time'];?></td>
                <td><?php echo $action['MobileNote']['detail'];?></td>
                </tr>
                
        <?php
            }
            
        }?>
        
        
        
        </table>
        <table class="mobilelog_table">
        <tr><td>Sign</td><td><?php if(isset($moblog) && $moblog['MobileLog']['sign']){echo $moblog['MobileLog']['sign'];}?></td></tr>
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