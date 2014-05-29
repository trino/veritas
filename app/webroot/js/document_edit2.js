
$(function(){
    <?php
    if(isset($vehicle) && $vehicle)
    {
        ?>
        var front = '<?php echo $vehicle['Vehicle_inspection']['front'];?>';
        var back = '<?php echo $vehicle['Vehicle_inspection']['back'];?>';
        var side = '<?php echo $vehicle['Vehicle_inspection']['side'];?>';
        
        var arr_f = front.split('_');
        
        var arr_b = back.split('_');
        var arr_s = side.split('_');
        $('.front').val('');
        $('.back').val('');
        $('.side').val('');
        if(arr_f.length >0)
        {
            $('.f area').each(function(){
                var co = $(this).attr('coords');
                if(jQuery.inArray( co, arr_f )>=0)
                $(this).click() ;               
            });
        }
        if(arr_b.length >0)
        {
            $('.b area').each(function(){
                var co = $(this).attr('coords');
                if(jQuery.inArray( co, arr_b )>=0)
                $(this).click() ;               
            });
        }
        if(arr_s.length >0)
        {
            $('.s area').each(function(){
                var co = $(this).attr('coords');
                
                if(jQuery.inArray( co, arr_s )>=0)
                $(this).click() ;               
            });
        }
        <?php
    }
    ?>
      $('.uploademail').click(function(){
        <?php if($this->request->params['action']=='document_edit'){?>
         $('.dialog-modals').load('<?php echo $base_url.'uploads/email/'.$doc['Document']['job_id'];?>');
         <?php }
         else
         {?>
             $('.dialog-modals').load('<?php echo $base_url.'uploads/email/'.$job_id;?>');
         <?php } ?>
               $('.dialog-modals').dialog({
                    
                    width: 400,
                    title:'Upload and Email',
               });
               });
    if($('.reporttype').val()=='5'){
        $('.uploademail').show();
        $('.incident_more').show();
        }
    else{
        $('.uploademail').hide();
        $('.incident_more').hide();
        }
     $('.reporttype').change(function(){
        if($(this).val()=='5')
        {
            $('.incident_more').show();
            $('.uploademail').show();
        }
        else
        {
            $('.uploademail').hide();
            $('.incident_more').hide();
        }
        if($(this).val()=='7')
        {
            $('#loss_prevention').show();
            $('.date_time').hide();
        }
        else
        {
            $('#loss_prevention').hide();
            $('.date_time').show();
        }    
    });
 $('.draft').click(function(){
       $('.draftval').val("1");
       $('#table input').each(function(){$(this).removeClass('required')});
       $('.activity_desc').removeClass('required');
       $('.activity_date').removeClass('required');
       $('.activity_time').removeClass('required');
       $('#repl').removeClass('required');
       $('.sbtbtn').click();
    }); 
    var test=1;
    var d = new Date;
    var  mins ='';
    if(d.getMinutes()<10)
        mins = "0"+d.getMinutes();
    else
        mins = d.getMinutes();
     <?php if(isset($doc['Document']['draft']) && $doc['Document']['draft']==0){?>    
    $('.activity_time').val(d.getHours()+':'+mins);
    var da = d.getFullYear()+'-'+Number(d.getMonth()+1)+'-'+d.getDate();
    $('.activity_date').val(da);
    <?php }?> 
    var test=1;
    $('#activity_more').click(function(){
     var t = new Date;
     var mis ='';
        var dt = t.getFullYear()+'-'+Number(t.getMonth()+1)+'-'+t.getDate();
         if(t.getMinutes()<10)
        mis = "0"+t.getMinutes();
    else
        mis = t.getMinutes(); 
       var more = '<tr>'+
'<td width="220px"><input type="text" value="'+dt+'" name="activity_date[]" class="activity_date test'+test+'"  /></td>'+
'<td width="220px"><input type="text" value="'+t.getHours()+':'+mis+'" name="activity_time[]" class="activity_time test'+test+'" /></td>'+
'<td width="350px"><textarea name="activity_desc[]"></textarea>   <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Remove</a></td>'+
'</tr>';
               $('.activity_more').append(more);
               $('.test'+test).each(function(){
        $(this).click();
        $(this).blur();
       });
       test++; 
    });
    $('.activity_date').live('click',function(){
        $(this).datepicker({dateFormat: 'yy-mm-dd'});
    });
    $('.activity_time').live('click',function(){
        $(this).timepicker();
    });
    $('.date_verify').datepicker({dateFormat: 'yy-mm-dd'});
    if($('.reporttype').val()=='7')
       {
            $('#loss_prevention').show();
            $('.date_time').hide();
       }     
       else
       {
            $('#loss_prevention').hide();
            $('.date_time').show();
       }
    $('.reporttype').change(function(){
       var inc_type = $(this).val(); 
       if(inc_type=='7')
       {
            $('#loss_prevention').show();
            $('.date_time').hide();
       }     
       else
       {
            $('#loss_prevention').hide();
            $('.date_time').show();
       }
    });
    $('.incident_date').datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date} );    
    $('#document_type').change(function()
    {
        var doctype = $(this).val();
       if(doctype == 'evidence')
        {
            $('.extra_evidence').show();
        }
        else
            $('.extra_evidence').hide();            
        if(doctype == 'siteOrder')
        {
            $('.site_more').show();
            
        }
        else
            $('.site_more').hide();
            
        if(doctype == 'personal_inspection')
        {
            $('.personal_more').show();
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        else
        {
            $('.personal_more').hide();
            $('.description_tr').show();
            $('.image_tr').show();
        }
        if(doctype == 'vehicle_inspection'){
            $('.vehicle_inspection').show();
            $('.description_tr').hide();
            $('.image_tr').hide();
            }
        else{
            $('.vehicle_inspection').hide();
            }    
       if(doctype == 'mobile_vehicle_trunk_inventory')
        {
            $('.inventory1_more').show();
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        else
        {
            $('.inventory1_more').hide();
         }
        if(doctype == 'mobile_inspection')
        {
            $('.mobileins_more').show();
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        else
        {
            $('.mobileins_more').hide();
        }
        if(doctype == 'mobile_log')
        {
            $('.mobilelog_more').show();
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        else
        {
            $('.mobilelog_more').hide();
        }
        if(doctype == 'employee'){
            $('.employee_more').show();
           }
        else
            $('.employee_more').hide();
         if(doctype == 'training'){
            $('.training_more').show();
            }
        else
            $('.training_more').hide();
        if(doctype == 'report'){
           $('.extra_memo').show();
           $('.add_more').show();
           $('.draftspan').show();
           $('.main_desc').html("<strong>Additional Notes</strong>");
           }
        else{
            $('.extra_memo').hide();
            $('.addmore').hide();
            $('.draftval').val("0");
            $('.main_desc').html("<strong>Description</strong>");
            $('.uploademail').hide();
            }
        if(doctype == 'client_feedback')
        {
            $('.client_more').show();
            $('.text_area_long').attr('onKeyDown',"limitText(this.form.description,this.form.countdown,500);");
            $('.text_area_long').attr('OnKeyUp',"limitText(this.form.description,this.form.countdown,500);");
            $('.desc_bot').html('(Maximum characters: 500)<br />'+
'You have <input readonly="readonly" type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="500" /> characters left.</font><br />');
        }
        else
        {
            $('.client_more').hide();        
            $('.text_area_long').attr('onKeyDown',"limitText(this.form.description,this.form.countdown,70);");
            $('.text_area_long').attr('OnKeyUp',"limitText(this.form.description,this.form.countdown,70);");
            $('.desc_bot').html('(Maximum characters: 70)<br />'+
'You have <input readonly="readonly" type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="70" /> characters left.</font><br />');
        }
        $('.extra_memo input').each(function(){
        $(this).click();
        $(this).blur();
       }); 
       $('.client_more input').each(function(){
        $(this).click();
        $(this).blur();
        });   
    });
    if($('#document_type').val() == 'evidence')
         $('.extra_evidence').show();
    if($('#document_type').val() == 'personal_inspection'){
            $('.personal_more').show();
            $('.description_tr').hide();
            $('.image_tr').hide();
            }
        else{
            $('.personal_more').hide();
            $('.description_tr').show();
            $('.image_tr').show();
            }
    if($('#document_type').val() == 'vehicle_inspection'){
            $('.vehicle_inspection').show();
            $('.description_tr').hide();
            $('.image_tr').hide();
            }
        else{
            $('.vehicle_inspection').hide();
           }
    if($('#document_type').val() == 'mobile_inspection'){
        $('.mobileins_more').show();
        $('.description_tr').hide();
            $('.image_tr').hide();
           }
        else{
            $('.mobileins_more').hide();
            }
    if($('#document_type').val() == 'mobile_log')
    {
        $('.mobilelog_more').show();
        $('.description_tr').hide();
            $('.image_tr').hide();
    }
    else
    {
            $('.mobilelog_more').hide();
    }
    if($('#document_type').val() == 'mobile_vehicle_trunk_inventory')
    {
        $('.inventory1_more').show();
        $('.description_tr').hide();
        $('.image_tr').hide();
    }
    else
    {
            $('.inventory1_more').hide();
    }         
    if($('#document_type').val() == 'siteOrder')
         $('.site_more').show();
    if($('#document_type').val() == 'training')
         $('.training_more').show();
    if($('#document_type').val() == 'employee')
         $('.employee_more').show();
    if($('#document_type').val() == 'report')
    {
        $('.draftspan').show();
        $('.add_more').show();
           $('.extra_memo').show();
           $('.main_desc').html("<strong>Additional Notes</strong>");
    }
    if($('#document_type').val() == 'client_feedback')
            $('.client_more').show(); 
    $('.extra_memo input').each(function(){
        $(this).click();
        $(this).blur();
        });
    $('.client_more input').each(function(){
        $(this).click();
        $(this).blur();
        });
        var checked = 0.0;
        var radcount = 0;
        $('.radios input').click(function(){
        $('.radios input:checked').each(function(){
            radcount++;
          checked = checked + parseFloat($(this).val());
          if(radcount==6)
          {
            var avg = (checked/30.0)*5;
            avg = avg.toFixed(2); 
            $('.overall').text(avg+'/5');
            $('.overallr').val(avg+'/5');
            checked = 0.0;
            radcount = 0;
          }
       }); });
});
function limitText(limitField, limitCount, limitNum)
{
    /*
    if (limitField.value.length > limitNum) 
    {
        limitField.value = limitField.value.substring(0, limitNum);
    }
     else
    {
        limitCount.value = limitNum - limitField.value.length;
    }*/
}