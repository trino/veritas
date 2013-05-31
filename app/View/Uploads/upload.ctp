<?php include_once('inc.php');?>



<h3 class="page-title">
	Upload Document
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Upload Document</a> <!--span class="icon-angle-right"></span-->
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

<tr style="display: none;"><td style="width:140px;"><b>Location</b></td><td><div class="right"><input type="text" name="location" class="" /></div></td></tr>
<tr><td><b>Documnet Type</b></td>
<td><div class="right">
<select name="document_type" class="required" id="document_type">
    <option value="">Choose documnet type</option>
    <?php if((isset($canupdate['Canupload']['contracts'])&& $canupdate['Canupload']['contracts']=='1') || $this->Session->read('admin')){?>
    <option value="contract">Contracts</option>
    <?php } ?>
    <?php if((isset($canupdate['Canupload']['evidence'])&& $canupdate['Canupload']['evidence']=='1') || $this->Session->read('admin')){?>
    <option value="evidence">Evidence</option>
    <?php } ?>
    <?php if((isset($canupdate['Canupload']['templates'])&& $canupdate['Canupload']['templates']=='1') || $this->Session->read('admin')){?>
    <option value="template">Templates</option>
    <?php }?>
     <?php if((isset($canupdate['Canupload']['report'])&& $canupdate['Canupload']['report']=='1') || $this->Session->read('admin')){?>
    <option value="report">Report</option>
    <?php }?>
    <?php if((isset($canupdate['Canupload']['client_memo'])&& $canupdate['Canupload']['client_memo']=='1') ){?>
    <option value="client_memo">Client Memo</option>
    <?php }?>
    <!--<option value="training_manuals">Training Manuals</option>-->
</select>
</div></td>
</tr>
<tr class="extra_evidence" style="display: none;">
<td colspan="2">
<table>
<tr><td><b>Evidence Type</b></td>
<td>
<select name="evidence_type" class="required">
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
<table>
<thead>
<!--<th colspan="3"><strong>Activity Log</strong></th></thead>-->
<thead><th>Report Type</th>
<th colspan="2">
<select name="report_type" class="required reporttype">
    <option value="">Select Report Type</option>
    <option value="1">Activity Log</option>
    <option value="2">Mobile Inspection</option>
    <option value="3">Mobile Security</option>
    <option value="4">Security Occurance</option>
</select>
</th>
</thead>
<thead>
<th>Time</th>
<th>Date</th>
<th>Description</th>
</thead>
<tr>
<td><input type="text" value="" name="activity_time[]" class="activity_time required" /></td>
<td><input type="text" value="" name="activity_date[]" class="activity_date required" /></td>
<td><textarea name="activity_desc[]" class="required activity_desc"></textarea>   
<a href="javascript:void(0);" id="activity_more" class="btn btn-primary">+Add More</a></td>
</tr>
<tr><td colspan="3" style="padding: 0;"><table class="activity_more">
</table>
</td></tr>
</table>
</td></tr>
<!--<tr><td><b>Title</b></td><td><div class="right"><input type="text" name="title" class="required" /></div></td></tr>-->
<tr><td><strong>Description</strong></td>
<td><textarea name="description" class="required" class="text_area_long" cols="10" rows="5" id="repl" onKeyDown="limitText(this.form.description,this.form.countdown,70);"
onKeyUp="limitText(this.form.description,this.form.countdown,70);"></textarea>
<br />
<font size="1">(Maximum characters: 70)<br />
You have <input readonly type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="70" /> characters left.</font><br />
</td></tr>
<!--<tr><td><b>Description</b></td><td><div class="right"><textarea cols="35" name="description" class="required"></textarea></div></td></tr>-->

<tr><td><b>Images/Videos/Docs</b></td><td><div class="right"><input type="file" name="document_1" class="" id='document_1' /><a href="javascript:void(0)" onclick="add_document()" class="btn btn-primary">Add</a></div><div id="doc"></div></td></tr>
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
<div class="submit"><input type="submit" class="btn btn-primary" style="float: left;" value="Upload Document" name="submit"/> <span style="display: none;float:left;" class="draftspan"><a class="draft" href="javascript:void(0)" style="margin-left: 15px;" class="btn btn-primary">Save as Draft</a></span></div>


</form>
<script>
$(function(){
    $('.draft').click(function(){
       $('.draftval').val("1");
       $('.activity_desc').removeClass('required');
       $('.activity_date').removeClass('required');
       $('.activity_time').removeClass('required');
       $('.reporttype').removeClass('required'); 
       $('#repl').removeClass('required');
       $('#my_form').submit();
    });
    //Add More acitvity
    var test=1;
    $('#activity_more').click(function(){
        
       var more = '<tr>'+
'<td style="padding:5px 0;"><input type="text" value="" name="activity_time[]" class="activity_time test'+test+'" /></td>'+
'<td style="padding:5px 0;"><input type="text" value="" name="activity_date[]" class="activity_date test'+test+'"  /></td>'+
'<td style="padding:5px 0;"><textarea name="activity_desc[]"></textarea>   <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Remove</a></td>'+
'</tr>'
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
    //$('.activity_date').datepicker({dateFormat: 'yy-mm-dd'} );
    $('.incident_date').datepicker({dateFormat: 'yy-mm-dd'} );
    
    
    
    $('#document_type').change(function()
    {
        var doctype = $(this).val();
        
        
        if(doctype == 'evidence'){
            $('.extra_evidence').show();
            $('.draftspan').hide();
            }
        else
            $('.extra_evidence').hide();
       if(doctype == 'report')
       {
           $('.extra_memo').show();
           $('.draftspan').show();
           
           //$('#document_1').removeClass('required');
       }    
        else
        {
            $('.extra_memo').hide();
            $('.draftspan').hide();
            $('.draftval').val("0");
           // $('#document_1').addClass('required');         
        }
        $('.extra_memo input').each(function(){
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
