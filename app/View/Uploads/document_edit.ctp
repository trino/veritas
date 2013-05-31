<?php include_once('inc.php');?>



<h3 class="page-title">
	Edit  Document
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Edit Document</a> <!--span class="icon-angle-right"></span-->
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
<!--<tr><td><b>Title</b></td><td><div class="right"><input type="text" name="title" class="required" value="<?php if(isset($doc['Document']['title'])) echo $doc['Document']['title'];?>" /></div></td></tr>-->
<tr><td><b>Document Type</b></td>
<td><div class="right">
<select name="document_type" class="required" id="document_type">
    <option value="">Choose documnet type</option>
    <?php if((isset($canupdate['Canupload']['contracts'])&& $canupdate['Canupload']['contracts']=='1') || $this->Session->read('admin')){?>
    <option value="contract" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='contract') echo "selected='selected'"?>>Contracts</option>
    <?php } ?>
    <?php if((isset($canupdate['Canupload']['evidence'])&& $canupdate['Canupload']['evidence']=='1') || $this->Session->read('admin')){?>
    <option value="evidence" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='evidence') echo "selected='selected'"?>>Evidence</option>
    <?php } ?>
    <?php if((isset($canupdate['Canupload']['templates'])&& $canupdate['Canupload']['templates']=='1') || $this->Session->read('admin')){?>
    <option value="template" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='template') echo "selected='selected'"?>>Templates</option>
    <?php }?>
    <?php if((isset($canupdate['Canupload']['report'])&& $canupdate['Canupload']['report']=='1') || $this->Session->read('admin')){?>
    <option value="report" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='report') echo "selected='selected'"?>>Report</option>
    <?php }?>
    <?php if((isset($canupdate['Canupload']['client_memo'])&& $canupdate['Canupload']['client_memo']=='1') ){?>
    <option value="client_memo" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='client_memo') echo "selected='selected'"?>>Client Memo</option>
    <?php }?>
    <!--<option value="training_manuals">Training Manuals</option>-->
</select>
</div></td>
</tr>
<tr class="client_more" style="display: none;">
<td colspan="2">
<table>
<tr>
<td>Time </td>
<td><input type="text" value="<?php if(isset($memo) && $memo['Clientmemo']['time']) echo $memo['Clientmemo']['time'];?>" name="memo_time" class="activity_time required" /></td>
</tr>
<tr>
<td>Date</td>
<td><input type="text" value="<?php if(isset($memo) && $memo['Clientmemo']['date']) echo $memo['Clientmemo']['date'];?>" name="memo_date" class="activity_date required" /></td>
</tr>
<tr>
<td>Memo Type</td>
<td>
<select name="memo_type" class="memo_type">
    <option value="">Select Memo Type</option>
    <option value="observation" <?php if(isset($memo) && $memo['Clientmemo']['memo_type']=='observation') echo "selected='selected'";?>>Observation</option>
    <option value="feedback" <?php if(isset($memo) && $memo['Clientmemo']['memo_type']=='feedback') echo "selected='selected'";?>>Feeback</option>
    <option value="non_compilance" <?php if(isset($memo) && $memo['Clientmemo']['memo_type']=='non_compilance') echo "selected='selected'";?>>Non-Compilance</option>
    <option value="great_job" <?php if(isset($memo) && $memo['Clientmemo']['memo_type']=='great_job') echo "selected='selected'";?>>Great Job</option>
</select>
</td>
</tr>
<td>Gaurd Name</td>
<td><input type="text" value="<?php if(isset($memo) && $memo['Clientmemo']['guard_name']) echo $memo['Clientmemo']['guard_name'];?>" name="guard_name" class="required" /></td>
</tr>
</table>
</td>
</tr>
<tr class="extra_evidence" style="display: none;">
<td colspan="2">
<table>
<tr><td><b>Evidence Type</b></td>
<td>
<?php //var_dump($doc['Document']); ?>
<select name="evidence_type" class="required">
    <option value="" >Choose evidence type</option>
    <option value="Incident Report" <?php if(isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Incident Report') echo "selected='selected'" ; ?>>Incident Report</option>
    <option value="Line Crossing Sheet" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Line Crossing Sheet')echo "selected='selected'" ; ?>>Line Crossing Sheet</option>
    <option value="Shift Summary" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Shift Summary') echo "selected='selected'" ; ?>>Shift Summary</option>
    <option value="Incident Video" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Incident Video')echo "selected='selected'" ; ?>>Incident Video</option>
    <option value="Executive Summary" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Executive Summary')echo "selected='selected'" ; ?>>Executive Summary</option>
    <option value="Average Picket Count" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Average Picket Count') echo "selected='selected'" ; ?>>Average Picket Count</option>
    <option value="Victim Statement" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Victim Statement')echo "selected='selected'"; ?>>Victim Statement</option>
    <option value="Miscellaneous" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Miscellaneous')echo "selected='selected'" ; ?>>Miscellaneous</option>
</select>
</td>
</tr>
<tr><td><strong>Date of Incident</strong></td>
<td><input type="text"  class="incident_date required" name="incident_date" value="<?php if(isset($doc['Document']['incident_date'])) echo $doc['Document']['incident_date'];?>" /></td></tr>

</table>
</td></tr>
<tr class="extra_memo" style="display: none;">
<td colspan="2">
<!--<table>
<tr><td><b>Client Memo</b></td>
<td>
<textarea name="client_memo" class="required">
<?php if(isset($doc['Document']['client_memo'])) echo $doc['Document']['client_memo'];?>
</textarea>
</td>
</tr>

</table>-->
<table>
<!--<thead>
<th colspan="3"><strong>Activity</strong></th></thead>
<thead>-->
<thead><th>Report Type</th>
<th>
<select name="report_type" class="required reporttype">
    <option value="">Select report type</option>
    <option value="1" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '1') echo "selected='selected'"; ?> >Activity Log</option>
    <option value="2" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '2') echo "selected='selected'"; ?>>Mobile Inspection</option>
    <option value="3" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '3') echo "selected='selected'"; ?>>Mobile Security</option>
    <option value="4" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '4') echo "selected='selected'"; ?>>Security Occurance</option>
</select>
</th>
</thead>
<th>Time</th>
<th>Date</th>
<th>Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</thead>

<?php
if(isset($activity)&&$activity) 
foreach($activity as $act)
{
    $t = explode(":",$act['Activity']['time']);
    $time = $t[0].":".$t[1];
    ?>
<tr>
<td><input type="text" value="<?php echo $time;?>" name="activity_time[]" class="activity_time required" /></td>
<td><input type="text" value="<?php echo $act['Activity']['date'];?>" name="activity_date[]" class="activity_date required" /></td>
<td><textarea name="activity_desc[]" class="activity_desc"><?php echo $act['Activity']['desc'];?></textarea>  <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Remove</a></td>
</tr>
<?php }?>

<!--<tr>
<td><input type="text" value="" name="activity_time[]" class="activity_time" /></td>
<td><input type="text" value="" name="activity_date[]" class="activity_date" /></td>
<td><textarea name="activity_desc[]"></textarea>  </td>
</tr>-->
<tr><td colspan="3" style="padding: 0;"><table class="activity_more">
</table>
</td></tr>
</table>
<tr><td><a href="javascript:void(0);" id="activity_more" class="btn btn-primary">+Add More</a></td></tr>
</td></tr>
<tr><td><strong>Description</strong></td>
<td><textarea name="description" class="required" class="text_area_long" cols="10" rows="5" id="repl" onKeyDown="limitText(this.form.description,this.form.countdown,70);"
onKeyUp="limitText(this.form.description,this.form.countdown,70);"><?php if(isset($doc['Document']['description'])) echo $doc['Document']['description'];?></textarea>
<br />
<font size="1">(Maximum characters: 70)<br />
You have <input readonly type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="70" /> characters left.</font><br />
</td></tr>
<!--<tr><td><b>Description</b></td><td><div class="right"><textarea cols="35" name="description" class="required"></textarea></div></td></tr>-->

<tr><td><b>Images/Videos/Docs</b></td><td><div class="right">
<input type="file" name="document_1" />
<a href="javascript:void(0)" onclick="add_document()" class="btn btn-primary">Add</a></div><div id="doc"></div>
<?php 
//var_dump($attach);
/*
if($attach)
{
    
?>
<div id='document_<?php echo $attach['id']; ?>'><div></div class='inputs'>
<div class='left'></div>
<div class='right'><input type='file' name='document_<?php echo $attach['id'];?>' value="<?php echo $attach['file'];?>" />
<a href='javascript:void(0);' onclick='remove_document();' class='btn btn-danger'>Remove</a></div>
<div class='clear'></div></div>
<?php } */?>
</td></tr>
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
<input type="hidden" name="job" value="<?php echo $doc['Document']['job_id']; ?>" />
<input type="hidden" class="draftval" name="draft" value="0" />
<div class="submit"><input type="submit" class="btn btn-primary sbtbtn" style="float: left;" value="Upload Document" name="submit"/><?php if(!$this->Session->read('admin')){?> <span style="display: none;float:left;" class="draftspan"><a href="javascript:void(0)" style="margin-left: 15px;" class="draft btn btn-primary">Save as Draft</a></span><?php }?></div>


</form>
<script>
$(function(){
    $('.draft').click(function(){
       $('.draftval').val("1");
       $('.activity_desc').removeClass('required');
       $('.activity_date').removeClass('required');
       $('.activity_time').removeClass('required');
        
       $('#repl').removeClass('required');
       $('.sbtbtn').click();
       
    });
    var test=1;
     //Add More acitvity
    $('#activity_more').click(function(){
     var t = new Date;
        var dt = t.getFullYear()+'-'+Number(t.getMonth()+1)+'-'+t.getDate();
       var more = '<tr>'+
'<td style="padding:5px 0;"><input type="text" value="'+t.getHours()+':'+t.getMinutes()+'" name="activity_time[]" class="activity_time test'+test+'" /></td>'+
'<td style="padding:5px 0;"><input type="text" value="'+dt+'" name="activity_date[]" class="activity_date test'+test+'"  /></td>'+
'<td style="padding:5px 0;"><textarea name="activity_desc[]"></textarea>   <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Remove</a></td>'+
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
    })
    
    $('.incident_date').datepicker({dateFormat: 'yy-mm-dd'} );
    $('#document_type').change(function()
    {
        var doctype = $(this).val();
        
        
        if(doctype == 'evidence'){
            $('.extra_evidence').show();
            $('.draftspan').hide();}
        else
            $('.extra_evidence').hide();
        if(doctype == 'report'){
           $('.extra_memo').show();
           $('.draftspan').show();
           }
        else{
            $('.extra_memo').hide();
            $('.draftspan').hide();
            $('.draftval').val("0");
            }
        if(doctype == 'client_memo')
           $('.client_more').show();
        else
            $('.client_more').hide();
                
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
    if($('#document_type').val() == 'report')
    {
        $('.draftspan').show();
           $('.extra_memo').show();
           }
    if($('#document_type').val() == 'client_memo')
            $('.client_more').show();       
    $('.extra_memo input').each(function(){
        $(this).click();
        $(this).blur();
        });
    $('.client_more input').each(function(){
        $(this).click();
        $(this).blur();
        });
       
});
function limitText(limitField, limitCount, limitNum)
{
    if (limitField.value.length > limitNum) 
    {
        limitField.value = limitField.value.substring(0, limitNum);
    }
     else
    {
        limitCount.value = limitNum - limitField.value.length;
    }
}
</script>
