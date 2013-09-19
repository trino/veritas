<?php include_once('inc.php');
if(isset($job_name))
    $job_n=$job_name;
else
    $job_n ="";
?>


<h3 class="page-title">
	<?php echo ($this->request->parms['action']=='document_edit')? "Edit  Document":"Upload Document For ".stripslashes($job_n);?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs"><?php echo($this->request->params['action']=='document_edit')? "Edit":"Upload";?> Document</a> <!--span class="icon-angle-right"></span-->
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
<?php //var_dump( $this->request->params['action']);?>

<form id="my_form" action="<?php  if($this->request->params['action']=='upload')echo $base_url.'uploads/upload'?>" method="post" enctype="multipart/form-data">

<div id="table">
<table>

<tr style="display: none;"><td style="width:140px;"><b>Location</b></td><td><div class="right"><input type="text" name="location" class="" /></div></td></tr>
<!--<tr><td><b>Title</b></td><td><div class="right"><input type="text" name="title" class="required" value="<?php if(isset($doc['Document']['title'])) echo $doc['Document']['title'];?>" /></div></td></tr>-->
<tr><td><b>Document Type</b></td>
<td><div class="right">
<select name="document_type" class="required" id="document_type">
    <option value="">Choose documnet type</option>
    <?php if($admin_doc['AdminDoc']['contracts']=='1' && ((isset($canupdate['Canupload']['contracts'])&& $canupdate['Canupload']['contracts']=='1') || $this->Session->read('admin'))){?>
    <option value="contract" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='contract') echo "selected='selected'"?>>Contracts</option>
    <?php } ?>
    <?php if($admin_doc['AdminDoc']['evidence']=='1' && ((isset($canupdate['Canupload']['evidence'])&& $canupdate['Canupload']['evidence']=='1') || $this->Session->read('admin'))){?>
    <option value="evidence" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='evidence') echo "selected='selected'"?>>Evidence</option>
    <?php } ?>
    <?php if($admin_doc['AdminDoc']['templates']=='1' && ((isset($canupdate['Canupload']['templates'])&& $canupdate['Canupload']['templates']=='1') || $this->Session->read('admin'))){?>
    <option value="template" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='template') echo "selected='selected'"?>>Templates</option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['report']=='1' && ((isset($canupdate['Canupload']['report'])&& $canupdate['Canupload']['report']=='1') || $this->Session->read('admin'))){?>
    <option value="report" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='report') echo "selected='selected'"?>>Report</option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['site_orders']=='1' && ((isset($canupdate['Canupload']['siteOrder'])&& $canupdate['Canupload']['siteOrder']=='1') || $this->Session->read('admin'))){?>
    <option value="siteOrder" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='siteOrder') echo "selected='selected'"?>>Site Orders</option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['training']=='1' && ((isset($canupdate['Canupload']['training'])&& $canupdate['Canupload']['training']=='1') || $this->Session->read('admin'))){?>
    <option value="training" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='training') echo "selected='selected'"?>>Training</option>
    <?php }?>
     <?php if($admin_doc['AdminDoc']['employee']=='1' && ((isset($canupdate['Canupload']['employee'])&& $canupdate['Canupload']['employee']=='1') || $this->Session->read('admin'))){?>
    <option value="employee" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='employee') echo "selected='selected'"?>>Employee</option>
    <?php }?>
     <?php if($admin_doc['AdminDoc']['kpiaudits']=='1' && ((isset($canupdate['Canupload']['KPIAudits'])&& $canupdate['Canupload']['KPIAudits']=='1') || $this->Session->read('admin'))){?>
    <option value="KPIAudits" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='KPIAudits') echo "selected='selected'"?>>KPI Audits</option>
    <?php }?>
    <?php if((isset($canupdate['Canupload']['client_feedback'])&& $canupdate['Canupload']['client_feedback']=='1') ){?>
    <option value="client_feedback" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='client_feedback') echo "selected='selected'"?>>Client Feedback</option>
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
        <option value="Post Orders" <?php if(isset($doc['Document']['site_type']) && $doc['Document']['site_type']=='Post Orders') echo "selected='selected'"?> >Post Orders</option>
        <option value="Operational Memos" <?php if(isset($doc['Document']['site_type']) && $doc['Document']['site_type']=='Operational Memos') echo "selected='selected'"?>>Operational Memos</option>
        <option value="Site Maps" <?php if(isset($doc['Document']['site_type']) && $doc['Document']['site_type']=='Site Maps') echo "selected='selected'"?>>Site Maps</option>
        <option value="Forms" <?php if(isset($doc['Document']['site_type']) && $doc['Document']['site_type']=='Forms') echo "selected='selected'"?>>Forms</option>
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
        <option value="Health & Safety Manuals" <?php if(isset($doc['Document']['training_type']) && $doc['Document']['training_type']=='Health & Safety Manuals') echo "selected='selected'"?>>Health & Safety Manuals</option>
        
        
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
        <option value="Job Descriptions"  <?php if(isset($doc['Document']['employee_type']) && $doc['Document']['employee_type']=='Job Descriptions') echo "selected='selected'"?>>Job Descriptions</option>
        <option value="Drug Free Policy" <?php if(isset($doc['Document']['employee_type']) && $doc['Document']['employee_type']=='Drug Free Policy') echo "selected='selected'"?>>Drug Free Policy</option>
        <option value="Schedules" <?php if(isset($doc['Document']['employee_type']) && $doc['Document']['employee_type']=='Schedules') echo "selected='selected'"?>>Schedules</option>
        
    </select> 
</td>
</tr>
</table>
</td></tr>
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
<td>Feedback Type</td>
<td>
<select name="memo_type" class="memo_type required">
    <option value="">Select Feedback Type</option>
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
<?php if(isset($doc['Document']['client_feedback'])) echo $doc['Document']['client_feedback'];?>
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
<?php //var_dump($ac);?>
<select name="report_type" class="required reporttype">
    <option value="">Select report type</option>
    <option value="1" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '1') echo "selected='selected'"; ?> >Activity Log</option>
    <option value="2" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '2') echo "selected='selected'"; ?>>Mobile Inspection</option>
    <option value="3" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '3') echo "selected='selected'"; ?>>Mobile Security</option>
    <option value="4" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '4') echo "selected='selected'"; ?>>Security Occurance</option>
    <option value="5" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '5') echo "selected='selected'"; ?>>Incident Report</option>
    <option value="6" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '6') echo "selected='selected'"; ?>>Sign-off Sheets</option>
</select>
</th>
</thead>
<thead class="incident_more" style="display: none;">
<th>Incident Report Options</th>
<th colspan="2">
<select name="incident_type" class="required ">
    <option value="">Select Incident Report Type</option>
    <option value="Alarm Activation" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Alarm Activation') echo "selected='selected'"; ?>>Alarm Activation</option>
    <option value="Burglary" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Burglary') echo "selected='selected'"; ?>>Burglary</option>
    <option value="Property Damage" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Property Damage') echo "selected='selected'"; ?>>Property Damage</option>
    <option value="Miscellaneous"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Miscellaneous') echo "selected='selected'"; ?>>Miscellaneous</option>
    <option value="Shoplift Loss"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Shoplift Loss') echo "selected='selected'"; ?>>Shoplift Loss</option>
    <option value="Disorderly Person"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Disorderly Person') echo "selected='selected'"; ?>>Disorderly Person</option>
    <option value="Accident - Employee"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Accident - Employee') echo "selected='selected'"; ?>>Accident - Employee</option>
    <option value="Shoplift Apprehension"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Shoplift Apprehension') echo "selected='selected'"; ?>>Shoplift Apprehension</option>
    <option value="Fraud Apprehension"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Fraud Apprehension') echo "selected='selected'"; ?>>Fraud Apprehension</option>
    <option value="Accident - Customer"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Accident - Customer') echo "selected='selected'"; ?>>Accident - Customer</option>
    <option value="Shoplift Recovery"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Shoplift Recovery') echo "selected='selected'"; ?>>Shoplift Recovery</option>
    <option value="Fraud Recovery"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Fraud Recovery') echo "selected='selected'"; ?>>Fraud Recovery</option>
    <option value="Non-Productive Stop"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Non-Productive Stop') echo "selected='selected'"; ?>>Non-Productive Stop</option>
    <option value="Suspicion Internal Theft"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Suspicion Internal Theft') echo "selected='selected'"; ?>>Suspicion Internal Theft</option>
    <option value="Fraud Loss"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Fraud Loss') echo "selected='selected'"; ?>>Fraud Loss</option>
</select>
</th>
</thead>
<thead>
<th width="220px">Date</th>
<th width="220px">Time</th>
<th width="350px">Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</thead>

<?php
if(isset($activity)&&$activity) 
foreach($activity as $act)
{
    $t = explode(":",$act['Activity']['time']);
    $time = $t[0].":".$t[1];
    ?>
<tr>
<td width="220px"><input type="text" value="<?php echo $act['Activity']['date'];?>" name="activity_date[]" class="activity_date required" /></td>
<td width="220px"><input type="text" value="<?php echo $time;?>" name="activity_time[]" class="activity_time required" /></td>
<td width="350px"><textarea name="activity_desc[]" class="activity_desc"><?php echo $act['Activity']['desc'];?></textarea>  <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Remove</a></td>
</tr>
<?php }
else{
?>

<tr>
<td width="220px"><input type="text" value="" name="activity_date[]" class="activity_date required" /></td>
<td width="220px"><input type="text" value="" name="activity_time[]" class="activity_time required" /></td>

<td width="350px"><textarea name="activity_desc[]" class="required activity_desc"></textarea></td>
</tr>
<?php }?>
<tr><td colspan="3" style="padding: 0;"><table class="activity_more" style="">
</table>
</td></tr>
<tr class="add_more" style="display: none;"><td><a href="javascript:void(0);" id="activity_more" class="btn btn-primary">+Add More</a></td></tr>
</table>

</td></tr>
<tr><td class="main_desc"><strong>Description</strong></td>
<td><textarea name="description"  class="text_area_long" cols="10" rows="5" id="repl" onKeyDown="limitText(this.form.description,this.form.countdown,70);"
onKeyUp="limitText(this.form.description,this.form.countdown,70);"><?php if(isset($doc['Document']['description'])) echo $doc['Document']['description'];?></textarea>
<br />
<font size="1" class="desc_bot">(Maximum characters: 70)<br />
You have <input readonly type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="70" /> characters left.</font><br />
</td></tr>
<!--<tr><td><b>Description</b></td><td><div class="right"><textarea cols="35" name="description" class="required"></textarea></div></td></tr>-->

<tr><td><b>Images/Videos/Docs</b></td><td><div class="right">
<input type="file" name="document_1" />
<!--<a href="javascript:void(0)" onclick="add_document()" class="btn btn-primary">Add</a>--></div><div id="doc"></div>
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
<input type="hidden" name="job" value="<?php if($this->request->params['action']=='document_edit'){ if(isset($doc['Document']['job_id']))echo $doc['Document']['job_id'];}else echo $job_id; ?>" />
<input type="hidden" class="draftval" name="draft" value="0" />
<input type="hidden" name="emailadd" value="" class="emailadd" />
<input type="hidden" name="emailadd2" value="" class="emailadd2" />
<input type="hidden" name="emailadd3" value="" class="emailadd3" />

<?php
if(!isset($job_id))
$job_id = 0;
//echo $job_id;
?>

<div class="submit"><input type="submit" class="btn btn-primary sbtbtn" style="float: left;" value="Submit Document" name="submit"/> <?php if($doc['Document']['job_id']==999 || $job_id == 999){?><a href="javascript:void(0)" class="btn btn-primary sbtbtn uploademail" style="float: left;margin-left:15px;display:none;">Submit Document And Email</a> <?php }else{?><span class="uploademail" style="display: none;"></span><?php }if(!$this->Session->read('admin')){?> <span style="display: none;float:left;" class="draftspan"><a href="javascript:void(0)" style="margin-left: 15px;" class="draft btn btn-primary">Save as Draft</a></span><?php }?></div>




</form>
<script>
$(function(){
    
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
        $('.incident_more').show();}
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
        else{
            $('.uploademail').hide();
            $('.incident_more').hide();
            }
    });
    
    $('.draft').click(function(){
       $('.draftval').val("1");
       $('.activity_desc').removeClass('required');
       $('.activity_date').removeClass('required');
       $('.activity_time').removeClass('required');
        
       $('#repl').removeClass('required');
       $('.sbtbtn').click();
       
    });
    //Add More acitvity---------added
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
    //-----------------------------------//
    var test=1;
     //Add More acitvity
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
    })
    
    $('.incident_date').datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date} );
    $('#document_type').change(function()
    {
        var doctype = $(this).val();
        
        
        if(doctype == 'evidence'){
            $('.extra_evidence').show();
            $('.draftspan').hide();}
        else
            $('.extra_evidence').hide();
        if(doctype == 'siteOrder'){
            $('.site_more').show();
            //$('.draftspan').hide();
            }
        else
            $('.site_more').hide();
        
        if(doctype == 'employee'){
            $('.employee_more').show();
            //$('.draftspan').hide();
            }
        else
            $('.employee_more').hide();
         if(doctype == 'training'){
            $('.training_more').show();
            //$('.draftspan').hide();
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
            $('.draftspan').hide();
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
