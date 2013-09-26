<?php include_once('inc.php');?>



<h3 class="page-title">
	Upload Document For <?php echo stripslashes($job_name);?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Upload Document  </a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<script type="text/javascript">
$(function(){
   $('#document').val('1');
   $('#image').val('1');
   $('#video').val('1'); 
   $('#my_form').validate();
});
function add_document()
{
    var doc=$('#document').val();
    doc = parseInt(doc);
    doc = doc + 1;
    var output = "<div id='document_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='file' name='document_"+doc+"' /><a href='javascript:void(0);' onclick='remove_document();' class='btn btn-danger'>Remove</a></div><div class='clear'></div></div>";   
    
    if(doc>1)
    {
        $('#remove_doc').show();
    }
    $('#document').val(doc);
    $('#doc').append(output);
}   


function add_image()
{
    var doc=$('#image').val();
    doc = parseInt(doc);
    doc = doc + 1;
    var output = "<div id='image_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='file' name='image_"+doc+"' /></div><div class='clear'></div></div>";   
    
    if(doc>1)
    {
        $('#remove_img').show();
    }
    $('#image').val(doc);
    $('#img').append(output);
}

function add_video()
{
    var doc=$('#video').val();
    doc = parseInt(doc);
    doc = doc + 1;
    var output = "<div id='video_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='file' name='video_"+doc+"' /></div><div class='clear'></div></div>";   
    if(doc>1)
    {
        $('#remove_vid').show();
    }
    $('#video').val(doc);
    $('#vid').append(output);
}

function add_youtube()
{
    var doc=$('#youtube').val();
    doc = parseInt(doc);
    doc = doc + 1;
    var output = "<div id='youtube_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='text' name='youtube_"+doc+"' /></div><div class='clear'></div></div>";   
    if(doc>1)
    {
        $('#remove_youtube').show();
    }
    $('#youtube').val(doc);
    $('#you').append(output);
}
function remove_document()
{
    var doc=$('#document').val();
    if(doc>1)
    {
        $('#document_'+doc).remove();
        doc = parseInt(doc);
        doc = doc - 1;
        $('#document').val(doc);
    }
    if(doc==1)
    {
        $('#remove_doc').hide();
    }
}

function remove_image()
{
    var doc=$('#image').val();
    if(doc>1)
    {
        $('#image_'+doc).remove();
        doc = parseInt(doc);
        doc = doc - 1;
        $('#image').val(doc);
    }
    if(doc==1)
    {
        $('#remove_img').hide();
    }
}

function remove_video()
{
    var doc=$('#video').val();
    if(doc>1)
    {
        $('#video_'+doc).remove();
        doc = parseInt(doc);
        doc = doc - 1;
        $('#video').val(doc);
    }
    if(doc==1)
    {
        $('#remove_vid').hide();
    }
}

function remove_youtube()
{
    var doc=$('#youtube').val();
    if(doc>1)
    {
        $('#youtube_'+doc).remove();
        doc = parseInt(doc);
        doc = doc - 1;
        $('#youtube').val(doc);
    }
    if(doc==1)
    {
        $('#remove_youtube').hide();
    }
}
</script>


<form id="my_form" action="" method="post" enctype="multipart/form-data">

<div id="table">
<table>

<tr style="display: none;"><td style=""><b>Location</b></td><td><div class="right"><input type="text" name="location" class="" /></div></td></tr>
<tr><td><b>Document Type</b></td>
<td><div class="right">
<select name="document_type" class="required" id="document_type">
    <option value="">Choose document type</option>
    <?php if($admin_doc['AdminDoc']['contracts']=='1' && ((isset($canupdate['Canupload']['contracts'])&& $canupdate['Canupload']['contracts']=='1') || $this->Session->read('admin'))){?>
    <option value="contract">Contracts</option>
    <?php } ?>
    <?php if($admin_doc['AdminDoc']['evidence']=='1' && ((isset($canupdate['Canupload']['evidence'])&& $canupdate['Canupload']['evidence']=='1') || $this->Session->read('admin'))){?>
    <option value="evidence">Evidence</option>
    <?php } ?>
    <?php if($admin_doc['AdminDoc']['templates']=='1' && ((isset($canupdate['Canupload']['templates'])&& $canupdate['Canupload']['templates']=='1') || $this->Session->read('admin'))){?>
    <option value="template">Templates</option>
    <?php }?>
     <?php if($admin_doc['AdminDoc']['report']=='1' && ((isset($canupdate['Canupload']['report'])&& $canupdate['Canupload']['report']=='1') || $this->Session->read('admin'))){?>
    <option value="report" <?php if($typee=='activity_log'){?>selected="selected"<?php }?>>Report</option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['site_orders']=='1' && ((isset($canupdate['Canupload']['siteOrder'])&& $canupdate['Canupload']['siteOrder']=='1') || $this->Session->read('admin'))){?>
    <option value="siteOrder">Site Orders</option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['training']=='1' && ((isset($canupdate['Canupload']['training'])&& $canupdate['Canupload']['training']=='1') || $this->Session->read('admin'))){?>
    <option value="training">Training</option>
    <?php }?>
     <?php if($admin_doc['AdminDoc']['employee']=='1' && ((isset($canupdate['Canupload']['employee'])&& $canupdate['Canupload']['employee']=='1') || $this->Session->read('admin'))){?>
    <option value="employee">Employee</option>
    <?php }?>
     <?php if($admin_doc['AdminDoc']['kpiaudits']=='1' && ((isset($canupdate['Canupload']['KPIAudits'])&& $canupdate['Canupload']['KPIAudits']=='1') || $this->Session->read('admin'))){?>
    <option value="KPIAudits">KPI Audits</option>
    <?php }?>
    <?php if((isset($canupdate['Canupload']['client_feedback'])&& $canupdate['Canupload']['client_feedback']=='1') ){?>
    <option value="client_feedback" <?php if($typee=='client_feedback'){?>selected="selected"<?php }?>>Client Feedback</option>
    <?php }?>
    <!--<option value="training_manuals">Training Manuals</option>-->
</select>
</div></td>
</tr>
<tr class="site_more" style="display: none;">
<td colspan="2">
<table>
<tr>
<td><strong>Site Order Type</strong></td>
<td>
    <select name="site_type" class="required">
        <option value="">Select Site Order</option>
        <option value="Post Orders">Post Orders</option>
        <option value="Operational Memos">Operational Memos</option>
        <option value="Site Maps">Site Maps</option>
        <option value="Forms">Forms</option>
    </select> 
</td>
</tr>
</table>
</td></tr>
<tr class="training_more" style="display: none;">
<td colspan="2">
<table>
<tr>
<td><strong>Health & Safety Manuals</strong></td>
<td>
    <select name="training_type" class="required">
        <option value="">Select Training Options</option>
        <option value="Health & Safety Manuals">Health & Safety Manuals</option>
    </select> 
</td>
</tr>
</table>
</td>
</tr>
<tr class="employee_more" style="display: none;">
<td colspan="2">
<table>
<tr>
<td><strong>Employee Options</strong></td>
<td>
    <select name="employee_type" class="required">
        <option value="">Select Employee Options</option>
        <option value="Job Descriptions">Job Descriptions</option>
        <option value="Drug Free Policy">Drug Free Policy</option>
        <option value="Schedules">Schedules</option>
    </select> 
</td>
</tr>
</table>
</td></tr>
<tr class="client_more" style="display: none;">
<td colspan="2">
<table>
<tr>
<td>Date</td>
<td><input type="text" value="" name="memo_date" class="activity_date required" /></td>
</tr>
<tr>
<td>Time </td>
<td><input type="text" value="" name="memo_time" class="activity_time required" /></td>
</tr>

<tr>
<td>Feedback Type</td>
<td>
<select name="memo_type" class="memo_type required">
    <option value="">Select Feedback Type</option>
    <option value="observation">Observation</option>
    <option value="feedback">Feeback</option>
    <option value="non_compliance">Non-Compliance</option>
    <option value="great_job">Great Job</option>
</select>
</td>
</tr>
<td>Guard Name</td>
<td><input type="text" value="" name="guard_name" class="required" /></td>
</tr>
</table>
</td>
</tr>
<tr class="extra_evidence" style="display: none;">
<td colspan="2">
<table>
<tr><td><b>Evidence Type</b></td>
<td>
<select name="evidence_type" class="required evtype">
    <option value="">Choose evidence type</option>
    <option value="Incident Report">Incident Report</option>
    <option value="Line Crossing Sheet">Line Crossing Sheet</option>
    <option value="Shift Summary">Shift Summary</option>
    <option value="Incident Video">Incident Video</option>
    <option value="Executive Summary">Executive Summary</option>
    <option value="Average Picket Count">Average Picket Count</option>
    <option value="Victim Statement">Victim Statement</option>
    <option value="Miscellaneous">Miscellaneous</option>
</select>
</td>
</tr>
<tr><td><strong>Date of Incident</strong></td>
<td><input type="text" value="" class="incident_date required" name="incident_date" /></td></tr>

</table>
</td></tr>
<tr class="extra_memo" style="display: none;">
<td colspan="2">

<!--<table>

<thead><th><b>Client Memo</b></th>
<th>
<textarea name="client_memo" class="required"></textarea>
</th>
</thead>
</table>-->
<table width="60%">
<thead>
<!--<th colspan="3"><strong>Activity Log</strong></th></thead>-->
<thead><th>Report Type</th>
<th colspan="2">
<select name="report_type" class="required reporttype">
    <option value="">Select Report Type</option>
    <option value="1" <?php if($typee){?>selected="selected"<?php }?>>Activity Log</option>
    <option value="2">Mobile Inspection</option>
    <option value="3">Mobile Security</option>
    <option value="4">Security Occurance</option>
    <option value="5" >Incident Report</option>
    <option value="6" >Sign-off Sheets</option>
</select>
</th>
</thead>
<thead class="incident_more" style="display: none;">
<th>Incident Report Options</th>
<th colspan="2">
<select name="incident_type" class="required ">
    <option value="">Select Incident Report Type</option>
    <option value="Alarm Activation">Alarm Activation</option>
    <option value="Burglary">Burglary</option>
    <option value="Property Damage">Property Damage</option>
    <option value="Miscellaneous">Miscellaneous</option>
    <option value="Shoplift Loss">Shoplift Loss</option>
    <option value="Disorderly Person">Disorderly Person</option>
    <option value="Accident - Employee">Accident - Employee</option>
    <option value="Shoplift Apprehension">Shoplift Apprehension</option>
    <option value="Fraud Apprehension">Fraud Apprehension</option>
    <option value="Accident - Customer">Accident - Customer</option>
    <option value="Shoplift Recovery">Shoplift Recovery</option>
    <option value="Fraud Recovery">Fraud Recovery</option>
    <option value="Non-Productive Stop">Non-Productive Stop</option>
    <option value="Suspicion Internal Theft">Suspicion Internal Theft</option>
    <option value="Fraud Loss">Fraud Loss</option>
</select>
</th>
</thead>
<thead>
<th width="220px">Date</th>
<th width="220px">Time</th>
<th width="350px">Description</th>
</thead>
<tr>
<td width="220px"><input type="text" value="" name="activity_date[]" class="activity_date required" /></td>
<td width="220px"><input type="text" value="" name="activity_time[]" class="activity_time required" /></td>

<td width="350px"><textarea name="activity_desc[]" class="required activity_desc"></textarea></td>
</tr>
<tr><td colspan="3" style="padding: 0;">
<table class="activity_more" style="">
</table>
</td></tr>
<tr><td colspan="3"><a href="javascript:void(0);" id="activity_more" class="btn btn-primary">+Add More</a></td></tr>
</table>
</td>
</tr>
<!--<tr><td><b>Title</b></td><td><div class="right"><input type="text" name="title" class="required" /></div></td></tr>-->
<tr><td class="main_desc"><strong>Description</strong></td>
<td><textarea name="description" class="text_area_long" cols="10" rows="5" id="repl" onKeyDown="limitText(this.form.description,this.form.countdown,70);"
onKeyUp="limitText(this.form.description,this.form.countdown,70);"></textarea>
<br />
<font size="1" class="desc_bot">(Maximum characters: 70)<br />
You have <input readonly="readonly" type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="70" /> characters left.</font><br />
</td></tr>
<!--<tr><td><b>Description</b></td><td><div class="right"><textarea cols="35" name="description" class="required"></textarea></div></td></tr>-->

<tr><td><b>Images/Videos/Docs</b></td><td><div class="right"><!--a href="javascript:void(0)" onclick="$('#document_1).trigger('click');" class="btn btn-info">Upload File</a>--><input type="file" name="document_1" class="" id='document_1' value="" style="display: block;" /><!--<a href="javascript:void(0)" onclick="add_document()" class="btn btn-primary">Add</a>--></div><div id="doc"></div></td></tr>
<!--
<tr><td><b>Images</b></td><td><div class="right"><input type="file" name="image_1" /><a href="javascript:void(0);" onclick="add_image()" class="btn btn-primary">Add</a><span id="remove_img" style="display: none;"> &nbsp; <a href="javascript:void(0);" onclick="remove_image();" class="btn btn-danger">Remove</a></span></div><div id="img"></div></td></tr>

<tr><td><b>Videos</b></td><td><div class="right"><input type="file" name="video_1" /><a href="javascript:void(0);" onclick="add_video()" class="btn btn-primary">Add</a><span id="remove_vid" style="display: none;"> &nbsp; <a href="javascript:void(0);" onclick="remove_video();" class="btn btn-danger">Remove</a></span></div><div id="vid"></div></td></tr>

<tr><td><b>Youtube Link</b></td><td><div class="right"><input type="text" name="youtube_1" />  &nbsp; <a href="javascript:void(0);" onclick="add_youtube()" class="btn btn-primary">Add</a><span id="remove_youtube" style="display: none;"> &nbsp; <a href="javascript:void(0);" onclick="remove_youtube();" class="btn btn-danger">Remove</a></span></div><div id="you"></div></td></tr>
-->
</table>
</div>

<input type="hidden" name="document" id="document" value="1" />
<input type="hidden" name="image" id="image" value="1" />
<input type="hidden" name="video" id="video" value="1" />
<input type="hidden" name="youtube" id="youtube" value="1" />
<input type="hidden" name="job" value="<?php echo $job_id; ?>" />
<input type="hidden" class="draftval" name="draft" value="0" />
<input type="hidden" name="emailadd" value="" class="emailadd" />
<input type="hidden" name="emailadd2" value="" class="emailadd2" />
<input type="hidden" name="emailadd3" value="" class="emailadd3" />
<div class="submit"><input type="submit" class="btn btn-primary sbtbtn" style="float: left;" value="Submit Document" name="submit"/> <a href="javascript:void(0)" class="btn btn-primary sbtbtn uploademail" style="float: left;margin-left:15px;display:none;">Submit Document And Email</a> <?php if(!$this->Session->read('admin')){?> <span style="display: none;float:left;" class="draftspan"><a href="javascript:void(0)" style="margin-left: 15px;" class="draft btn btn-primary">Save as Draft</a></span><?php }?></div>


</form>
<script>
$(function(){
    
    $('.uploademail').live('click',function(){
         $('.dialog-modals').load('<?php echo $base_url.'uploads/email/'.$job_id;?>');
               $('.dialog-modals').dialog({
                    
                    width: 400,
                    title:'Upload and Email',
                    
               });
               });
    $('.reporttype').change(function(){
        if($(this).val()=='5')
        {
            $('.incident_more').show();
            $('.uploademail').show();
        }
        else
            $('.incident_more').hide();
    });
    
    <?php
    if($typee=='client_feedback')
    {
        
        ?>
        $('.uploademail').hide();
        $('.client_more').show();
            $('.text_area_long').attr('onKeyDown',"limitText(this.form.description,this.form.countdown,500);");
            $('.text_area_long').attr('OnKeyUp',"limitText(this.form.description,this.form.countdown,500);");
            $('.desc_bot').html('(Maximum characters: 500)<br />'+
'You have <input readonly="readonly" type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="500" /> characters left.</font><br />');
        <?php
    }
    ?>
    $('.draft').click(function(){
        
       $('.draftval').val("1");
       $('.activity_desc').removeClass('required');
       $('.activity_date').removeClass('required');
       $('.activity_time').removeClass('required'); 
       $('#repl').removeClass('required');
       $('.sbtbtn').click();
    });
    //Add More acitvity
    var test=1;
    var d = new Date;
    var  mins ='';
    if(d.getMinutes()<10)
        mins = "0"+d.getMinutes();
    else
        mins = d.getMinutes();    
    $('.activity_time').val(d.getHours()+':'+mins);
    var da = d.getFullYear()+'-'+Number(d.getMonth()+1)+'-'+d.getDate();
    $('.activity_date').val(da);
    
    //alert(t);
    $('#activity_more').click(function(){
        var t = new Date;
        var  mis ='';
    if(t.getMinutes()<10)
        mis = "0"+t.getMinutes();
    else
        mis = t.getMinutes(); 
        var dt = t.getFullYear()+'-'+Number(t.getMonth()+1)+'-'+t.getDate();
       var more = '<tr>'+
'<td width="220px"><input type="text" value="'+dt+'" name="activity_date[]" class="activity_date test'+test+'"  /></td>'+
'<td width="220px"><input type="text" value="'+t.getHours()+':'+mis+'" name="activity_time[]" class="activity_time test'+test+'" /></td>'+
'<td width="350px"><textarea name="activity_desc[]"></textarea>&nbsp;<a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Remove</a></td>'+
'</tr>'
       $('.activity_more').append(more); 
       
       $('.test'+test).each(function(){
        $(this).click();
        $(this).blur();
       });
       test++;
    });
    
    $('.activity_date').live('click',function(){
        $(this).datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date, minDate: new Date(2007, 6, 12) });
    });
    $('.activity_time').live('click',function(){
        $(this).timepicker();
    });
    //$('.activity_date').datepicker({dateFormat: 'yy-mm-dd'} );
    $('.incident_date').datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date} );
    
    if($('#document_type').val() == 'report')
    {
        $('.draftspan').show();
        $('.add_more').show();
           $('.extra_memo').show();
           $('.main_desc').html("<strong>Additional Notes</strong>");
           }
    
    $('#document_type').change(function()
    {
        var doctype = $(this).val();
        
        
        if(doctype == 'evidence'){
            $('.uploademail').hide();
            $('.extra_evidence').show();
            $('.draftspan').hide();
            }
        else
            $('.extra_evidence').hide();
            
            
        if(doctype == 'siteOrder'){
            $('.uploademail').hide();
            $('.site_more').show();
            //$('.draftspan').hide();
            }
        else
            $('.site_more').hide();
        
        if(doctype == 'employee'){
            $('.uploademail').hide();
            $('.employee_more').show();
            //$('.draftspan').hide();
            }
        else
            $('.employee_more').hide();
         if(doctype == 'training'){
            $('.uploademail').hide();
            $('.training_more').show();
            //$('.draftspan').hide();
            }
        else
            $('.training_more').hide();
       if(doctype == 'report')
       {
           $('.extra_memo').show();
           $('.draftspan').show();
           $('.main_desc').html("<strong>Additional Notes</strong>");
           
           //$('#document_1').removeClass('required');
       }    
       else
        {
            $('.extra_memo').hide();
            $('.draftspan').hide();
            $('.draftval').val("0");
            $('.main_desc').html("<strong>Description</strong>");
           // $('#document_1').addClass('required');         
        }
        
        if(doctype == 'client_feedback')
        {
            $('.uploademail').hide();
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
        $('.evtype').change(function(){
            if($(this).val()=='Shift Summary')
            {
        
            
            $('.text_area_long').attr('onKeyDown',"limitText(this.form.description,this.form.countdown,500);");
            $('.text_area_long').attr('OnKeyUp',"limitText(this.form.description,this.form.countdown,500);");
            $('.desc_bot').html('(Maximum characters: 500)<br />'+
'You have <input readonly="readonly" type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="500" /> characters left.</font><br />');
        
            }
        })
        
        $('.extra_memo input').each(function(){
        $(this).click();
        $(this).blur();
       });
        $('.client_more input').each(function(){
        $(this).click();
        $(this).blur();
       });
       
    });
});

function limitText(limitField, limitCount, limitNum) {
if (limitField.value.length > limitNum) {
limitField.value = limitField.value.substring(0, limitNum);
} else {
limitCount.value = limitNum - limitField.value.length;
}
}
</script>