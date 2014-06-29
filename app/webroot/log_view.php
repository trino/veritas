<tr class="mobilelog_more">
    <td colspan="2" style="padding: 0;">
        <table class="table mobilelog_table" style="border-left: none!important;border-right: none!important;">
            
            <tr>
                <td style="width:100px!important;border-top:none;"><strong><?php echo $this->requestAction('dashboard/translate/Mobile Guard');?>:</strong></td><td style="border-top:none;"><?php if(isset($moblog) && $moblog['MobileLog']['guard']){echo $moblog['MobileLog']['guard'];}?> </td>
                <td style="width:100px!important;border-top:none;"><strong><?php echo $this->requestAction('dashboard/translate/Shift');?>:</strong></td><td style="border-top:none;"><?php if(isset($moblog) && $moblog['MobileLog']['shift_from']){echo $moblog['MobileLog']['shift_from'];}?> - <?php if(isset($moblog) && $moblog['MobileLog']['shift_to']){echo $moblog['MobileLog']['shift_to'];}?></td>
                
            </tr>
            <?php if(isset($moblog))
            {?>
            <input type="hidden" name="log_id" value="<?php echo $moblog['MobileLog']['id'];?>"/>
            <?php } ?>
            <tr>
                <td><strong><?php echo $this->requestAction('dashboard/translate/Start Date');?></strong></td><td><?php if(isset($moblog) && $moblog['MobileLog']['start_date']){echo $moblog['MobileLog']['start_date'];}?></td>
                <td><strong><?php echo $this->requestAction('dashboard/translate/End Date');?></strong></td><td><?php if(isset($moblog) && $moblog['MobileLog']['end_date']){echo $moblog['MobileLog']['end_date'];}?></td>
            </tr>
            <tr>
                <td colspan="4">
                
                <div style="width: 360px;margin:10px auto;">
                    <table class="table table-bordered" style="border-left: none!important;border-right: 1px solid #e5e5e5!important;">
                        <tr>
                            <td colspan="2">
                                <center><strong> <?php echo $this->requestAction('dashboard/translate/ASAP Patrol');?> (2200 - 0900)</strong></center>
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
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotafrom7']){echo $moblog['MobileLog']['tyotafrom7'];}?></td>
                            <td><?php if(isset($moblog) && $moblog['MobileLog']['tyotato7']){echo $moblog['MobileLog']['tyotato7'];}?></td>
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
        <table class="table addmoretab1 mobilelog_table" style="border-left: none!important;border-right: none!important;">
            <tr><td colspan="5"><strong><?php echo $this->requestAction('dashboard/translate/Mobile');?> / <?php echo $this->requestAction('dashboard/translate/Site Check In');?></strong></td></tr>
            <tr><td><strong><?php echo $this->requestAction('dashboard/translate/Arrival');?></strong></td><td><strong><?php echo $this->requestAction('dashboard/translate/Depart');?></strong></td><td><strong><?php echo $this->requestAction('dashboard/translate/Site Adddress');?></strong></td><td><strong><?php echo $this->requestAction('dashboard/translate/Guard Onsite');?></strong></td></tr>
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
        
        <table class="table mobilelog_table" style="border-left: none!important;border-right: none!important;">
        <tr><td class="wdth" width="35%"><strong><?php echo $this->requestAction('dashboard/translate/Please Remember To Get Receipt For Gas At Petro Canada');?>:</strong></td><td ><?php if(isset($moblog) && $moblog['MobileLog']['receipt']){echo $moblog['MobileLog']['receipt'];}?></td></tr>
        </table>
        <table class="mobilelog_table">
        <tr><td colspan="6"><strong><?php echo $this->requestAction('dashboard/translate/Points');?></strong> &nbsp; <?php if(isset($moblog) && $moblog['MobileLog']['points']){echo $moblog['MobileLog']['points'];}?>&nbsp;<strong>/</strong>&nbsp;<?php if(isset($moblog) && $moblog['MobileLog']['ltr']){echo $moblog['MobileLog']['ltr'];}?>&nbsp; <strong><?php echo $this->requestAction('dashboard/translate/Total LT');?></strong>&nbsp;<strong>/ <?php echo $this->requestAction('dashboard/translate/Total');?> $<strong></strong>&nbsp;<?php if(isset($moblog) && $moblog['MobileLog']['total']){echo $moblog['MobileLog']['total'];}?></td>
        </tr>
        </table>
        
        <table class="addmoretab2 mobilelog_table" style="margin-bottom: 0;border-left: none!important;border-right: none!important;border-top:1px solid #DDD;">
        <thead ><th width="10%"><strong><?php echo $this->requestAction('dashboard/translate/Time');?></strong></th><th><strong><?php echo $this->requestAction('dashboard/translate/Special Notes (Guard Request etc.)');?></strong></th></thead>
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
        <!--<table class="mobilelog_table" style="border-left: none!important;border-right: none!important;">
        <tr><td colspan="2" style="border-top: none;"><strong><?php echo $this->requestAction('dashboard/translate/Sign');?></strong> : <?php if(isset($moblog) && $moblog['MobileLog']['sign']){echo $moblog['MobileLog']['sign'];}?></td></tr>
        </table>-->
           
        <div style="position: relative;padding:5px;">
           
            <?php
            $signature = $moblog['MobileLog']['signature'];
                if(isset($moblog) && $signature)
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