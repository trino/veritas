<?php include_once('inc.php');

if(isset($doc['Document']['id']))
    $did = $doc['Document']['id'];
else
    $did = '';
if(isset($job_name))
    $job_n=$job_name;
else
    $job_n ="";    
?>

<h3 class="page-title">
	<?php echo ($this->request->params['action']=='document_edit')?$this->requestAction('dashboard/translate/Document Edit For')." ".stripslashes($job_n):"Upload Document For ".stripslashes($job_n);?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?> </a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs"><?php echo($this->request->params['action']=='document_edit')? $this->requestAction('dashboard/translate/Edit'):$this->requestAction('dashboard/translate/Upload');?> Document</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<script>
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

<form id="my_form" action="" method="post" enctype="multipart/form-data" onsubmit="return vehicle_test();">
<?php //var_dump($rates);?>
<div id="table">
<table>
<tr style="display: none;"><td style="width:140px;"><b>Location</b></td><td><div class="right"><input type="text" name="location" class="" /></div></td></tr>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Document Type');?></b></td>
<td><div class="right">
<select name="document_type" class="required" id="document_type">
    <option value=""><?php echo $this->requestAction('dashboard/translate/Choose document type');?></option>
    <?php if($admin_doc['AdminDoc']['contracts']=='1' && ((isset($canupdate['Canupload']['contracts'])&& $canupdate['Canupload']['contracts']=='1') || $this->Session->read('admin'))){?>
    <option value="contract" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='contract') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Contracts');?></option>
    <?php } ?>
    <?php if($admin_doc['AdminDoc']['evidence']=='1' && ((isset($canupdate['Canupload']['evidence'])&& $canupdate['Canupload']['evidence']=='1') || $this->Session->read('admin'))){?>
    <option value="evidence" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='evidence') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Evidence');?></option>
    <?php } ?>
    <?php if($admin_doc['AdminDoc']['templates']=='1' && ((isset($canupdate['Canupload']['templates'])&& $canupdate['Canupload']['templates']=='1') || $this->Session->read('admin'))){?>
    <option value="template" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='template') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Templates');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['report']=='1' && ((isset($canupdate['Canupload']['report'])&& $canupdate['Canupload']['report']=='1') || $this->Session->read('admin'))){?>
    <option value="report" <?php if((isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='report')|| (isset($typee) && $typee=='activity_log')) echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Report');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['site_orders']=='1' && ((isset($canupdate['Canupload']['siteOrder'])&& $canupdate['Canupload']['siteOrder']=='1') || $this->Session->read('admin'))){?>
    <option value="siteOrder" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='siteOrder') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Site Orders');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['training']=='1' && ((isset($canupdate['Canupload']['training'])&& $canupdate['Canupload']['training']=='1') || $this->Session->read('admin'))){?>
    <option value="training" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='training') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Training');?></option>
    <?php }?>
     <?php if($admin_doc['AdminDoc']['employee']=='1' && ((isset($canupdate['Canupload']['employee'])&& $canupdate['Canupload']['employee']=='1') || $this->Session->read('admin'))){?>
    <option value="employee" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='employee') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Employee');?></option>
    <?php }?>
     <?php if($admin_doc['AdminDoc']['kpiaudits']=='1' && ((isset($canupdate['Canupload']['KPIAudits'])&& $canupdate['Canupload']['KPIAudits']=='1') || $this->Session->read('admin'))){?>
    <option value="KPIAudits" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='KPIAudits') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/KPI Audits');?></option>
    <?php }?>
    <?php if((isset($canupdate['Canupload']['client_feedback'])&& $canupdate['Canupload']['client_feedback']=='1') ){?>
    <option value="client_feedback" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='client_feedback') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Client Feedback');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['deployment_rate']=='1' && isset($rates['DeploymentRate'])&& ($this->Session->read('admin')||(isset($canupdate['Canupload']['deployment_rate'])&& $canupdate['Canupload']['deployment_rate']=='1'))){?>
    <option value="deployment_rate" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='deployment_rate') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Deployment');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['orders']=='1' && ((isset($canupdate['Canupload']['orders'])&& $canupdate['Canupload']['orders']=='1') || $this->Session->read('admin'))){?>
    <option value="orders" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='orders') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Orders');?></option>
    <?php }?>
    <!--<?php if($admin_doc['AdminDoc']['personal_inspection']=='1' && ((isset($canupdate['Canupload']['personal_inspection'])&& $canupdate['Canupload']['personal_inspection']=='1') || $this->Session->read('admin'))){?>
    <option value="personal_inspection" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='personal_inspection') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Personal Inspection');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['mobile_inspection']=='1' && ((isset($canupdate['Canupload']['mobile_inspection'])&& $canupdate['Canupload']['mobile_inspection']=='1') || $this->Session->read('admin'))){?>
    <option value="mobile_inspection" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='mobile_inspection') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['mobile_log']=='1' && ((isset($canupdate['Canupload']['mobile_log'])&& $canupdate['Canupload']['mobile_log']=='1') || $this->Session->read('admin'))){?>
    <option value="mobile_log" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='mobile_log') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Mobile Log');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['inventory']=='1' && ((isset($canupdate['Canupload']['inventory'])&& $canupdate['Canupload']['inventory']=='1') || $this->Session->read('admin'))){?>
    <option value="mobile_vehicle_trunk_inventory" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='mobile_vehicle_trunk_inventory') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?></option>
    <?php }?>
    <?php if($admin_doc['AdminDoc']['vehicle_inspection']=='1' && ((isset($canupdate['Canupload']['vehicle_inspection'])&& $canupdate['Canupload']['vehicle_inspection']=='1') || $this->Session->read('admin'))){?>
    <option value="vehicle_inspection" <?php if(isset($doc['Document']['document_type']) && $doc['Document']['document_type']=='vehicle_inspection') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?></option>
    <?php }?>-->
</select>
</div></td>
</tr>
<?php include('orders.php');?>
<?php if($this->Session->read('admin')){?>
<tr class="orders" style="display: none;">
    <td>&nbsp;</td>
    <td >
        <table>
            <tr>
                <td> <input type="checkbox" name="orders[complete]" onchange="$('.pass').toggle()" value="1" <?php if(isset($orders['Order']['complete']) && $orders['Order']['complete']=='1' )echo "checked='checked'";?> /> Complete</td>
            </tr>
            <tr class="pass" style="<?php if(isset($orders['Order']['complete']) && $orders['Order']['complete']=='0' )echo "display: none;";?>">
                <td><input type="radio" name="orders[pass]" value="1" <?php if(isset($orders['Order']['pass']) && $orders['Order']['pass']=='1' )echo "checked='checked'";?> />Pass
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="orders[pass]" value="0" <?php if(isset($orders['Order']['pass']) && $orders['Order']['pass']=='0' )echo "checked='checked'";?> />Fail</td>
            </tr>
        </table>
    </td>
</tr>
<?php }?>
<tr class="loader2"></tr>
<tr class="loaderimg" style="display: none;"><td colspan="3"><img src="<?php echo $base_url;?>img/ajax-loader.gif" /></td></tr>
<tr class="site_more" style="display: none;">
<td colspan="2">
<table>
<tr>
<td><strong><?php echo $this->requestAction('dashboard/translate/Site Order Type');?></strong></td>
<td>
    <select name="site_type" class="required">
        <option value=""><?php echo $this->requestAction('dashboard/translate/Select Site Order');?></option>
        <?php if($this->requestAction('/uploads/check_p/SiteorderuploadPermission/1')){?><option value="Post Orders" <?php if(isset($doc['Document']['site_type']) && $doc['Document']['site_type']=='Post Orders') echo "selected='selected'"?> ><?php echo $this->requestAction('dashboard/translate/Post Orders');?></option><?php }?>
        <?php if($this->requestAction('/uploads/check_p/SiteorderuploadPermission/2')){?><option value="Operational Memos" <?php if(isset($doc['Document']['site_type']) && $doc['Document']['site_type']=='Operational Memos') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Operational Memos');?></option><?php }?>
        <?php if($this->requestAction('/uploads/check_p/SiteorderuploadPermission/3')){?><option value="Site Maps" <?php if(isset($doc['Document']['site_type']) && $doc['Document']['site_type']=='Site Maps') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Site Maps');?></option><?php }?>
        <?php if($this->requestAction('/uploads/check_p/SiteorderuploadPermission/4')){?><option value="Forms" <?php if(isset($doc['Document']['site_type']) && $doc['Document']['site_type']=='Forms') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Forms');?></option><?php }?>
    </select> 
</td>
</tr>
</table>
</td></tr>
<tr class="deploy" style="display: none;"></tr>
<tr class="training_more" style="display: none;">
<td colspan="2">
<table>
<tr>
<td><strong><?php echo $this->requestAction('dashboard/translate/Health & Safety Manuals');?></strong></td>
<td>
    <select name="training_type" class="required">
        <option value=""><?php echo $this->requestAction('dashboard/translate/Select Training Options');?></option>
        <option value="Health & Safety Manuals" <?php if(isset($doc['Document']['training_type']) && $doc['Document']['training_type']=='Health & Safety Manuals') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Health & Safety Manuals');?></option>
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
<td><strong><?php echo $this->requestAction('dashboard/translate/Employee Options');?></strong></td>
<td>
    <select name="employee_type" class="required">
        <option value=""><?php echo $this->requestAction('dashboard/translate/Select Employee Options');?></option>
        <?php if($this->requestAction('/uploads/check_p/EmployeeuploadPermission/1')){?><option value="Job Descriptions"  <?php if(isset($doc['Document']['employee_type']) && $doc['Document']['employee_type']=='Job Descriptions') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Job Descriptions');?></option><?php }?>
        <?php if($this->requestAction('/uploads/check_p/EmployeeuploadPermission/2')){?><option value="Drug Free Policy" <?php if(isset($doc['Document']['employee_type']) && $doc['Document']['employee_type']=='Drug Free Policy') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Drug Free Policy');?></option><?php }?>
        <?php if($this->requestAction('/uploads/check_p/EmployeeuploadPermission/3')){?><option value="Schedules" <?php if(isset($doc['Document']['employee_type']) && $doc['Document']['employee_type']=='Schedules') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Schedules');?></option><?php }?>
    </select> 
</td>
</tr>
</table>
</td></tr>
<tr class="client_more" style="display: none;">
<td colspan="2">
<table>
<tr>
<td><?php echo $this->requestAction('dashboard/translate/Time');?> </td>
<td><input type="text" value="<?php if(isset($memo) && $memo['Clientmemo']['time']) echo $memo['Clientmemo']['time'];?>" name="memo_time" class="activity_time required" /></td>
</tr>
<tr>
<td>Date</td>
<td><input type="text" value="<?php if(isset($memo) && $memo['Clientmemo']['date']) echo $memo['Clientmemo']['date'];?>" name="memo_date" class="activity_date required" /></td>
</tr>
<tr>
<td><?php echo $this->requestAction('dashboard/translate/Feedback Type');?></td>
<td>
<select name="memo_type" class="memo_type required">
    <option value=""><?php echo $this->requestAction('dashboard/translate/Select Feedback Type');?></option>
    <option value="observation" <?php if(isset($memo) && $memo['Clientmemo']['memo_type']=='observation') echo "selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Observation');?></option>
    <option value="feedback" <?php if(isset($memo) && $memo['Clientmemo']['memo_type']=='feedback') echo "selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Feeback');?></option>
    <option value="non_compilance" <?php if(isset($memo) && $memo['Clientmemo']['memo_type']=='non_compilance') echo "selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Non-Compilance');?></option>
    <option value="great_job" <?php if(isset($memo) && $memo['Clientmemo']['memo_type']=='great_job') echo "selected='selected'";?>><?php echo $this->requestAction('dashboard/translate/Great Job');?></option>
</select>
</td>
</tr>
<td><?php echo $this->requestAction('dashboard/translate/Gaurd Name');?></td>
<td><input type="text" value="<?php if(isset($memo) && $memo['Clientmemo']['guard_name']) echo $memo['Clientmemo']['guard_name'];?>" name="guard_name" class="required" /></td>
</tr>
</table>
</td>
</tr>
<tr class="extra_evidence" style="display: none;">
<td colspan="2">
<table>
<tr><td><b><?php echo $this->requestAction('dashboard/translate/Evidence Type');?></b></td>
<td>
<select name="evidence_type" class="required">
    <option value="" ><?php echo $this->requestAction('dashboard/translate/Choose evidence type');?></option>
    <?php if($this->requestAction('/uploads/check_p/EvidenceuploadPermission/1')){?><option value="Incident Report" <?php if(isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Incident Report') echo "selected='selected'" ; ?>><?php echo $this->requestAction('dashboard/translate/Incident Report');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/EvidenceuploadPermission/2')){?><option value="Line Crossing Sheet" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Line Crossing Sheet')echo "selected='selected'" ; ?>><?php echo $this->requestAction('dashboard/translate/Line Crossing Sheet');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/EvidenceuploadPermission/3')){?><option value="Shift Summary" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Shift Summary') echo "selected='selected'" ; ?>><?php echo $this->requestAction('dashboard/translate/Shift Summary');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/EvidenceuploadPermission/4')){?><option value="Incident Video" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Incident Video')echo "selected='selected'" ; ?>><?php echo $this->requestAction('dashboard/translate/Incident Video');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/EvidenceuploadPermission/5')){?><option value="Executive Summary" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Executive Summary')echo "selected='selected'" ; ?>><?php echo $this->requestAction('dashboard/translate/Executive Summary');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/EvidenceuploadPermission/6')){?><option value="Average Picket Count" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Average Picket Count') echo "selected='selected'" ; ?>><?php echo $this->requestAction('dashboard/translate/Average Picket Count');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/EvidenceuploadPermission/7')){?><option value="Victim Statement" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Victim Statement')echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Victim Statement');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/EvidenceuploadPermission/8')){?><option value="Miscellaneous" <?php if (isset($doc['Document']['evidence_type']) && $doc['Document']['evidence_type']=='Miscellaneous')echo "selected='selected'" ; ?>><?php echo $this->requestAction('dashboard/translate/Miscellaneous');?></option><?php }?>
</select>
</td>
</tr>
<tr><td><strong><?php echo $this->requestAction('dashboard/translate/Date of Incident');?></strong></td>
<td><input type="text"  class="incident_date required" name="incident_date" value="<?php if(isset($doc['Document']['incident_date'])) echo $doc['Document']['incident_date'];?>" /></td></tr>
<tr><td><strong><?php echo $this->requestAction('dashboard/translate/Author');?></strong></td><td><input type="text" class="required" name="evidence_author" value="<?php if(isset($doc['Document']['evidence_author'])) echo $doc['Document']['evidence_author'];?>"/></td></tr>
</table>
</td></tr>
<tr class="extra_memo" style="display: none;">
<td colspan="2" style="padding: 0;">
<table>
<thead><th><?php echo $this->requestAction('dashboard/translate/Report Type');?></th>
<th colspan="2">
<select name="report_type" class="required reporttype">
    <option value=""><?php echo $this->requestAction('dashboard/translate/Select report type');?></option>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/1')){?><option value="1" <?php  if((isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '1')||(isset($typee) && $typee=='activity_log')) echo "selected='selected'"; ?> ><?php echo $this->requestAction('dashboard/translate/Activity Log');?></option><?php }?>
    <!--<option value="2" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '2') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?></option>-->
    <!--<option value="3" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '3') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Mobile Security');?></option>-->
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/4')){?><option value="4" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '4') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Security Occurrence');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/5')){?><option value="5" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '5') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Incident Report');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/6')){?><option value="6" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '6') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Sign-off Sheets');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/7')){?><option value="7" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '7') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Loss Prevention');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/8')){?><option value="8" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '8') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Static Site Audit');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/9')){?><option value="9" <?php  if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '9') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Insurance Site Audit');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/10')){?><option value="10" <?php if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '10') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Site Signin Signout');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/11')){?><option value="11" <?php if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '11') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Instructions and site Assessment');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/12')){?><option value="12" <?php if(isset($ac['Activity']['report_type'])&&$ac['Activity']['report_type'] == '12') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Personal Inspection');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/13')){?><option value="13" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='13') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/14')){?><option value="14" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='14') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Mobile Log');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/15')){?><option value="15" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='15') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Mobile Vehicle Trunk Inventory');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/16')){?><option value="16" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='16') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Vehicle Inspection');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/17')){?><option value="17" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='17') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Disciplinary Warning');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/18')){?><option value="18" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='18') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Injury and Illness');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/19')){?><option value="19" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='19') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Notice Of Termination');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/20')){?><option value="20" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='20') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Uniform Issue - Static and Retail');?></option><?php }?>
    <?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/21')){?><option value="21" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='21') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/Pay Roll');?></option><?php }?>
    <!--<?php if($this->requestAction('/uploads/check_p/ReportuploadPermission/21')){?><option value="21" <?php if(isset($ac['Activity']['report_type']) && $ac['Activity']['report_type']=='21') echo "selected='selected'"?>><?php echo $this->requestAction('dashboard/translate/eBay Personnel Inspection Report');?></option><?php }?>-->
</select>
</th>
</thead>
<tr><td><strong><?php echo $this->requestAction('dashboard/translate/Author');?></strong></td><td><input type="text" class="" name="report_author" value="<?php if(isset($doc['Document']['evidence_author'])) echo $doc['Document']['evidence_author'];?>"/></td></tr>
<thead class="incident_more" style="display: none;">
<th><?php echo $this->requestAction('dashboard/translate/Incident Report Options');?></th>
<th colspan="2">
<select name="incident_type" class="required ">
    <option value=""><?php echo $this->requestAction('dashboard/translate/Select Incident Report Type');?></option>
    <option value="Accident - Customer"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Accident - Customer') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Accident');?> - <?php echo $this->requestAction('dashboard/translate/Customer');?></option>
    <option value="Accident - Employee"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Accident - Employee') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Accident')." - ".$this->requestAction('dashboard/translate/Employee');?></option>
    <option value="Alarm Activation" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Alarm Activation') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Alarm Activation');?></option>
    <option value="Battery" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Battery') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Battery');?></option>
    <option value="Blocking Access"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Blocking Access') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Blocking Access');?></option>
    <option value="Burglary" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Burglary') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Burglary');?></option>
    <option value="Confrontation"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Confrontation') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Confrontation');?></option>
    <option value="Damage to Company Property"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Damage to Company Property') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Damage to Company Property');?></option>
    <option value="Damage to Vehicle"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Damage to Vehicle') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Damage to Vehicle');?></option>
    <option value="Disorderly Person"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Disorderly Person') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Disorderly Person');?></option>
    <option value="Following Vehicle"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Following Vehicle') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Following Vehicle');?></option>
    <option value="Fraud Apprehension"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Fraud Apprehension') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Fraud Apprehension');?></option>
    <option value="Fraud Loss"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Fraud Loss') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Fraud Loss');?></option>
    <option value="Fraud Recovery"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Fraud Recovery') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Fraud Recovery');?></option>
    <option value="Harassment"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Harassment') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Harassment');?></option>
    <option value="Hiding Identity ( Mask )" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Hiding Identity ( Mask )') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Hiding Identity ( Mask )');?></option>
    <option value="Impair Vision" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Impair Vision') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Impair Vision');?></option>
    <option value="Intimidation" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Intimidation') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Intimidation');?></option>
    <option value="Jackrocks, nails, etc."<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Jackrocks, nails, etc.') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Jackrocks, nails, etc.');?></option>
    <option value="Mass Picketing" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Mass Picketing') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Mass Picketing');?></option>
    <option value="Menacing" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Menacing') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Menacing');?></option>
    <option value="Miscellaneous"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Miscellaneous') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Miscellaneous');?></option>
    <option value="Non-Productive Stop"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Non-Productive Stop') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Non-Productive Stop');?></option>
    <option value="Property Damage" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Property Damage') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Property Damage');?></option>
    <option value="Racial Slurs" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Racial Slurs') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Racial Slurs');?></option>
    <option value="Sexual Harassment" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Sexual Harassment') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Sexual Harassment');?></option>
    <option value="Shoplift Apprehension"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Shoplift Apprehension') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Shoplift Apprehension');?></option>
    <option value="Shoplift Loss"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Shoplift Loss') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Shoplift Loss');?></option>
    <option value="Shoplift Recovery"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Shoplift Recovery') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Shoplift Recovery');?></option>
    <option value="Statement" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Statement') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Statement');?></option>
    <option value="Suspicion Internal Theft"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Suspicion Internal Theft') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Suspicion Internal Theft');?></option>
    <option value="Terrorist Threat" <?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Terrorist Threat') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Terrorist Threat');?></option>
    <option value="Threat Against Employee"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Threat Against Employee') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Threat Against Employee');?></option>
    <option value="Thrown Object(s)"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Thrown Object(s)') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Thrown Object(s)');?></option>
    <option value="Trespassing"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Trespassing') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Trespassing');?></option>
    <option value="Vandalism"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Vandalism') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Vandalism');?></option>
    <option value="Vehicle Accident"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Vehicle Accident') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Vehicle Accident');?></option>
    <option value="Weapon"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Weapon') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Weapon');?></option>
    <option value="Other"<?php  if(isset($ac['Activity']['incident_type'])&&$ac['Activity']['incident_type'] == 'Other') echo "selected='selected'"; ?>><?php echo $this->requestAction('dashboard/translate/Other');?></option>
</select>
</th>
</thead>
<tr class="loader"></tr>
<thead class="incident_more" style="display: none;">
<th width="100px">Incident Date</th>
<th width="220px"><input type="text" name="incident_date" value="<?php if(isset($doc['Document']['incident_date']))echo $doc['Document']['incident_date'];?>" class="activity_date"/></th>
<th></th>
</thead>
<thead class="date_time">
<th width="220px">Date</th>
<th width="220px"><?php echo $this->requestAction('dashboard/translate/Time');?></th>
<th width="350px">Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</thead>
<?php
if(isset($activity)&&$activity) 
foreach($activity as $act)
{
    $t = explode(":",$act['Activity']['time']);
    $time = $t[0].":".$t[1];

    ?>
<tr class="date_time">
<td width="220px"><input type="text" value="<?php echo $act['Activity']['date'];?>" name="activity_date[]" class="activity_date required" /></td>
<td width="220px"><input type="text" value="<?php echo $time;?>" name="activity_time[]" class="activity_time required" /></td>
<td width="350px"><textarea name="activity_desc[]" class="activity_desc "><?php echo $act['Activity']['desc'];?></textarea>  <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger"><?php echo $this->requestAction('dashboard/translate/Remove');?></a> <a href="javascript:void(0);" onclick="" class="btn btn-success activity_mores">Add above</a></td>

</tr>
<?php }
else{
?>
<tr class="date_time">
<td width="220px"><input type="text" value="" name="activity_date[]" class="activity_date required" /></td>
<td width="220px"><input type="text" value="" name="activity_time[]" class="activity_time required" /></td>
<td width="350px"><textarea name="activity_desc[]" class="required activity_desc"></textarea></td>
</tr>
<?php }?>
<tr class="date_time"><td colspan="3" style="padding: 0;"><table class="activity_more" style="">
</table>
</td></tr>
<tr class="add_more date_time" style="display: none;"><td><a href="javascript:void(0);" id="activity_more" class="btn btn-primary date_time">+<?php echo $this->requestAction('dashboard/translate/Add More');?></a></td></tr>
</table>
</td></tr>
<tr class="description_tr"><td class="main_desc"><strong>Description</strong></td>
<td>
<!--<textarea name="description"  class="text_area_long" cols="10" rows="5" id="repl" onKeyDown="limitText(this.form.description,this.form.countdown,70);"
onKeyUp="limitText(this.form.description,this.form.countdown,70);"><?php if(isset($doc['Document']['description'])) echo $doc['Document']['description'];?></textarea>-->
<textarea name="description"  class="text_area_long" cols="10" rows="7" id="repl" ><?php if(isset($doc['Document']['description'])) echo $doc['Document']['description'];?></textarea>
<br />
</td></tr>
<tr class="image_tr"><td><b><?php echo $this->requestAction('dashboard/translate/ImagesVideosDocs');?></b></td><td><div class="right">
<input type="file" name="document[]" /><a href="javascript:void(0)" id="addfiles" class="btn btn-primary">Add More +</a>

</div><div id="doc"></div>
</td></tr>
<?php if(count($do)>0 || count($image)>0 || count($vid)>0){?>
<tr><td><strong>Uploaded Files</strong></td>
    <td><div class="right">
    <?php if(isset($do))
          {
            foreach($do as $f)
            {?>
                <span><?php echo $f['Doc']['doc'];?><input type="hidden" name="documentz[]"  value="<?php echo $f['Doc']['doc'];?>"/><a href='javascript:void(0);' class="btn btn-danger" onclick="$(this).parent().remove();"> X</a></span>
          <?php
            }
          }
          if(isset($image))
          {
            foreach($image as $f)
            {?>
               <span><?php echo $f['Image']['image'];?><input type="hidden" name="documentz[]"  value="<?php echo $f['Image']['image'];?>"/><a href='javascript:void(0);' class="btn btn-danger" onclick="$(this).parent().remove();"> X</a></span> 
          <?php
            }
          }
          if(isset($vid))
          {
            foreach($vid as $f)
            {?>
               <span><?php echo $f['Video']['video'];?><input type="hidden" name="documentz[]"  value="<?php echo $f['Video']['video'];?>"/><a href='javascript:void(0);' class="btn btn-danger" onclick="$(this).parent().remove();"> X</a></span>
            <?php
            }
          }
          ?>
    
        </div>
    </td></tr>
<?php }?>

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
    $job_id = 0;?>
<div class="submit"><input type="submit" class="btn btn-primary sbtbtn" style="float: left;" value="<?php echo $this->requestAction('dashboard/translate/Submit Document');?>" name="submit"/>
<?php if(isset($doc) && $doc['Document']['job_id']==999 || $job_id == 999){?><a href="javascript:void(0)" class="btn btn-primary sbtbtn uploademail" style="float: left;margin-left:15px;display:none;"><?php echo $this->requestAction('dashboard/translate/Submit Document And Email');?></a> <?php }else{?><span class="uploademail" style="display: none;"></span>
<?php }if(!$this->Session->read('admin')){?> <span style="float:left;" class="draftspan"><a href="javascript:void(0);" style="margin-left: 15px;" class="draft btn btn-primary"><?php echo $this->requestAction('dashboard/translate/Save as Draft');?></a></span><?php }?></div>
</form>
<script type="text/javascript">

$(function(){
        $('#addfiles').click(function(){
            //alert("ssss");
           $('#doc').append('<div><input type="file" name="document[]" /><a href="javascript:void(0);" class="btn btn-danger" onclick="$(this).parent().remove();">Delete</a><br/></div>'); 
        });
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
            
            if($(this).val() >= 7)
            {
                $('.loader').show();
                doc_loader1('<?php echo $base_url;?>uploads/reportType/id_<?php echo $did;?>/'+$(this).val());
            }
            
                
            $('.incident_more').hide();
            
            $('.uploademail').hide();
            $('.incident_more').hide();
            
        }
        
        if($(this).val()=='7' || $(this).val()=='8' || $(this).val()=='9' || $(this).val()== "10" || $(this).val()=="11" || $(this).val()=="12"|| $(this).val()=="13"|| $(this).val()=="14"|| $(this).val()=="15"|| $(this).val()=="16"|| $(this).val()=="17" || $(this).val()=="18"|| $(this).val()=="19"|| $(this).val()=="20" || $(this).val()=="21" )
        {
            $('.date_time').hide();
            if($(this).val()=='7' || $(this).val()=='21')
            {
                
            }   
            else
            {
                $('.description_tr').hide();
                $('.image_tr').hide();
            }        
        }
        else
        {
            
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
    //    incr++;
     //var ran = '<?php echo rand(100000,999999);?>';
     //ran = ran+incr;   

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

'<td width="350px"><textarea name="activity_desc[]"></textarea>   <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Remove</a> <a href="javascript:void(0);" onclick="" class="btn btn-success activity_mores">Add above</a></td>'+

'</tr>';
               $('.activity_more').append(more);
               $('.test'+test).each(function(){
        $(this).click();
        $(this).blur();
       });
       test++; 
    });

    incr2=100;
    $('.activity_mores').live('click',function(){
        //var ran = '<?php echo rand(100000,999999);?>';   
        //ran=ran+incr2;
     //var id_r = $(this).attr('id');   
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
'<td width="350px"><textarea name="activity_desc[]"></textarea>   <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Remove</a> <a href="javascript:void(0);" onclick="" class="btn btn-success activity_mores">Add above</a></td>'+
'</tr>';
               //$('.'+id_r).before(more);
               $(this).parent().parent().before(more);
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
    if($('.reporttype').val()=='7' || $('.reporttype').val()=='8' || $('.reporttype').val()=='9' || $('.reporttype').val()=='10' || $('.reporttype').val()=='11'|| $('.reporttype').val()=='12'|| $('.reporttype').val()=='13'|| $('.reporttype').val()=='14'|| $('.reporttype').val()=='15'|| $('.reporttype').val()=='16'|| $('.reporttype').val()=='17' || $('.reporttype').val()=="18" || $('.reporttype').val()=='19'|| $('.reporttype').val()=="20" || $('.reporttype').val()=="21")
       {
        if($('.reporttype').val()=='7')
        {
            
        }
            //$('#loss_prevention').show();
            else
            {
                $('.description_tr').hide();
                $('.image_tr').hide();
            }
            $('.date_time').hide();
       }     
       else
       {
            $('#loss_prevention').hide();
            $('.date_time').show();
       }
    $('.reporttype').change(function(){
       var inc_type = $(this).val(); 
       if(inc_type=='7' || $('.reporttype').val()=='8' || $('.reporttype').val()=='9'|| $('.reporttype').val()=='10' || $('.reporttype').val()=='11'|| $('.reporttype').val()=='12'|| $('.reporttype').val()=='13'|| $('.reporttype').val()=='14'|| $('.reporttype').val()=='15'|| $('.reporttype').val()=='16'|| $('.reporttype').val()=='17' || $('.reporttype').val()=="18"|| $('.reporttype').val()=='19' || $('.reporttype').val()=="20" || $('.reporttype').val()=="21")
       {
            $('.loader').show();
            if($('.reporttype').val()=='8' || $('.reporttype').val()=='9'|| $('.reporttype').val()=='10' || $('.reporttype').val()=='11'|| $('.reporttype').val()=='12'|| $('.reporttype').val()=='13'|| $('.reporttype').val()=='14'|| $('.reporttype').val()=='15'|| $('.reporttype').val()=='16' || $('.reporttype').val()=='17' || $('.reporttype').val()=='18'|| $('.reporttype').val()=='19' || $('.reporttype').val()=="20" ){
                $('.description_tr').hide();
                $('.image_tr').hide();
                }
            
            $('.date_time').hide();
       }     
       else
       {
            
            $('.date_time').show();
            $('.loader').hide();
       }
    });
    $('.incident_date').datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date} );    
    $('#document_type').change(function()
    {
        var doctype = $(this).val();
        
       if(doctype == 'orders')
       {
            $('.orders').show();
       }
       else
            $('.orders').hide();
       if(doctype=='deployment_rate')
       {
           $('.deploy').show();
           $('.deploy').load('<?php echo $base_url;?>uploads/deployment/<?php echo $job_id;?>');
           $(".loader2").hide();
           $(".description_tr").hide(); 
           $(".image_tr").hide(); 
           $('.draft').hide(); 
       }
       else 
       $('.deploy').hide();
       if(doctype == 'evidence')
        {
            $('.extra_evidence').show();
            $(".loader2").hide();
        }
        else
            $('.extra_evidence').hide();            
        if(doctype == 'siteOrder')
        {
            $('.site_more').show();
            $(".loader2").hide();
        }
        else
            $('.site_more').hide();
            
        if(doctype == 'personal_inspection')
        {
            //$('.personal_more').show();
            $('.loader2').show();
            
            doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        else
        {
            if(doctype!='deployment_rate'){
            //            $('.personal_more').hide();
            $('.description_tr').show();
            $('.image_tr').show();
            }
        }
        if(doctype == 'vehicle_inspection'){
            $('.loader2').show();
            doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
            $('.description_tr').hide();
            $('.image_tr').hide();
            }
        else{
            //$('.loader2').hide();
            $('.vehicle_inspection').hide();
            }    
       if(doctype == 'mobile_vehicle_trunk_inventory')
        {
            doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        else
        {
            $('.inventory1_more').hide();
         }
        if(doctype == 'mobile_inspection')
        {
            doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        else
        {
            $('.mobileins_more').hide();
        }
        if(doctype == 'mobile_log')
        {
            doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        else
        {
            $('.mobilelog_more').hide();
        }
        if(doctype == 'employee'){
            $(".loader2").hide();
            $('.employee_more').show();
           }
        else
            $('.employee_more').hide();
         if(doctype == 'training'){
            $(".loader2").hide();
            $('.training_more').show();
            }
        else
            $('.training_more').hide();
        if(doctype == 'contract')
        {
            $(".loader2").hide();
        }
        if(doctype == 'KPIAudits')
        {
            $(".loader2").hide();
        }
        if(doctype == 'report'){
            $(".loader2").hide();
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
            $(".loader2").hide();
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
    if($('#document_type').val() == 'evidence'){
         $('.extra_evidence').show();
         $(".loader2").hide();
         }
    if($('#document_type').val() == 'orders'){
        
         $('.orders').show();
         }
            
    if($('#document_type').val() == 'personal_inspection'){
            
            doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
            $('.description_tr').hide();
            $('.image_tr').hide();
            }
        else{
            //$('.loader2').hide();
            $('.description_tr').show();
            $('.image_tr').show();
            }
    if($('#document_type').val() == 'vehicle_inspection'){
            $('.loader2').show();
            doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
            $('.description_tr').hide();
            $('.image_tr').hide();
            }
        else{
            //$('.loader2').hide();
           }
    if($('#document_type').val() == 'mobile_inspection'){
        doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
        $('.description_tr').hide();
            $('.image_tr').hide();
           }
        else{
            $('.mobileins_more').hide();
            }
    if($('#document_type').val() == 'mobile_log')
    {
        doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
        //$('.loader2').load('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
        $('.description_tr').hide();
            $('.image_tr').hide();
    }
    else
    {
            $('.mobilelog_more').hide();
    }
    if($('#document_type').val() == 'mobile_vehicle_trunk_inventory')
    {
        doc_loader('<?php echo $base_url;?>uploads/documentType/id_<?php echo $did;?>/'+$('#document_type').val());
        //$('.loader2').load();
        $('.description_tr').hide();
        $('.image_tr').hide();
    }
    else
    {
            $('.inventory1_more').hide();
    }         
    if($('#document_type').val() == 'siteOrder'){
         $('.site_more').show();
         $(".loader2").hide();
         }
    if($('#document_type').val() == 'training'){
         $('.training_more').show();
         $(".loader2").hide();
         }
    if($('#document_type').val() == 'employee'){
        $(".loader2").hide();
         $('.employee_more').show();}
         
    if($('#document_type').val() == 'report')
    {
        $(".loader2").hide();
        $('.draftspan').show();
        $('.add_more').show();
           $('.extra_memo').show();
           $('.main_desc').html("<strong>Additional Notes</strong>");
    }
    if($('#document_type').val() == 'client_feedback'){
            $('.client_more').show(); 
            $(".loader2").hide();
            }
            if($('#document_type').val() == 'deployment_rate')
        {
           $('.deploy').show();
           $('.deploy').load('<?php echo $base_url;?>/uploads/deployment/<?php echo $job_id;?>/<?php echo $did;?>');
           $(".loader2").hide();
           $(".description_tr").hide(); 
           $(".image_tr").hide();  
       }
       else 
       $('.deploy').hide();
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
       <?php
    if(isset($ac['Activity']['report_type'])&& ($ac['Activity']['report_type'] >= 7))
    {
        
        ?>
        $('.loader').show();
        $('.loader').load('<?php echo $base_url;?>uploads/reportType/id_<?php echo $did;?>/'+$('.reporttype').val(),function(){$('.loaderimg').hide()});
        if($('.reporttype').val()==7 ||$('.reporttype').val()==21)
        {
            
        }
        else
        {
            $('.description_tr').hide();
            $('.image_tr').hide();
        }
        <?php if($ac['Activity']['report_type']=='18'){?>
        $('.date_time').hide();
        <?php
    }}?>
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
function doc_loader(urls)
{
    $(".loader2").hide();
    $('.loaderimg').show();
    
    $.ajax({
        url: urls,
        success: function(res)
        {
            $(".loader2").show();
            $('.loader2').html(res);
            $('.loaderimg').hide();    
            
            
        }
    });
}
function doc_loader1(urls)
{
    $(".loader").hide();
    $('.loaderimg').show();
    
    $.ajax({
        url: urls,
        success: function(res)
        {
            $(".loader").show();
            $('.loader').html(res);
            $('.loaderimg').hide();    
            
            
        }
    });
}

</script>