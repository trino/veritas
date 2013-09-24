<style>
@media print {
  body * {
    visibility:hidden;
  }
  #toprint, #toprint * {
    visibility:visible;
  }
  #toprint {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>
<?php
    $qry ="";
    if(isset($from) && isset($to))
        $qry = "?from=$from&to=$to";
    elseif(isset($from))
        $qry = "?from=$from";
    elseif(isset($to))
        $qry = "?to=$to";
    
    if(isset($addedBy)&& $qry!="")
        $qry.= "&addedBy=$addedBy";
    elseif(isset($addedBy) && $qry=="")
        $qry.= "?addedBy=$addedBy";
        
    
?>


<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/stats">Document Uploads Report</a>
        
	</li>
</ul>

<form action="" method="post" id="datefilter">
    <input type="text" value="" name="from" placeholder="Start Date" style="width: 100px; margin-top:10px;" class="datepicker required" />
    <input type="text" value="" name="to" placeholder="End Date" style="width: 100px; margin-top: 10px;" class="datepicker required" />
    <select name="addedBy" style="margin-top: 10px;">
        <option value="">Select User</option>
        <option value="0">Admin</option>
        <?php foreach($users as $u){?>
        <option value="<?php echo $u['Member']['id'];?>"><?php echo $u['Member']['full_name'];?></option>
        <?php }?>
    </select>
    
    <input type="submit" value="Go" class="btn btn-primary" />
</form>

<?php
 $contract = '0';
 $template = '0';
 $evidence = '0';
 $siteOrder = '0';
 $KPIAudits = '0';
 $training = '0';
 $report = '0';
 $employee = '0';
 $client_feedback = '0';
 //$template = '0';
 
    foreach($all as $k=>$v)
    {
        
     if( $v['documents']['document_type']=='contract')
        $contract = $v['0']['cnt'];
     elseif($v['documents']['document_type']=='template')
        $template = $v['0']['cnt'];
     elseif($v['documents']['document_type']=='evidence')
       $evidence = $v['0']['cnt'];
     elseif($v['documents']['document_type']=='siteOrder')
        $siteOrder = $v['0']['cnt'];
     elseif($v['documents']['document_type']=='KPIAudits')
        $KPIAudits = $v['0']['cnt'];
     elseif($v['documents']['document_type']=='training')
        $training = $v['0']['cnt'];
     elseif($v['documents']['document_type']=='report')
        $report = $v['0']['cnt'];
      elseif($v['documents']['document_type']=='employee')
        $employee = $v['0']['cnt'];
     elseif($v['documents']['document_type']=='client_feedback')
        $client_feedback = $v['0']['cnt'];
       
    }
    unset($v);

    $Incident =0;
    $Line = 0;
    $Video = 0;
    $Shift = 0;
    $Executive = 0;
    $Average = 0;
    $Victim = 0;
    $Miscellaneous = 0;
    
    if(isset($from)&& isset($to))
       $evi = $doc->query("SELECT COUNT(*) as cnt, evidence_type FROM documents WHERE `date`>='$from' and `date`<='$to' and evidence_type <>' ' GROUP BY evidence_type");   
    elseif(isset($from))
        $evi = $doc->query("SELECT COUNT(*) as cnt, evidence_type FROM documents WHERE `date`>='$from' and evidence_type <>' ' GROUP BY evidence_type");
    elseif(isset($to))
        $evi = $doc->query("SELECT COUNT(*) as cnt, evidence_type FROM documents WHERE `date`<='$to' and evidence_type <>' ' GROUP BY evidence_type");
    else
        $evi = $doc->query("SELECT COUNT(*) as cnt, evidence_type FROM documents WHERE evidence_type <>' ' GROUP BY evidence_type");
    foreach($evi as $v)
    {
         if( $v['documents']['evidence_type']=='Incident Report')
            $Incident = $v['0']['cnt'];
         elseif($v['documents']['evidence_type']=='Line Crossing Sheet')
            $Line = $v['0']['cnt'];
         elseif($v['documents']['evidence_type']=='Shift Summary')
           $Shift = $v['0']['cnt'];
         elseif($v['documents']['evidence_type']=='Incident Video')
            $Video = $v['0']['cnt'];
         elseif($v['documents']['evidence_type']=='Executive Summary')
            $Executive = $v['0']['cnt'];
         elseif($v['documents']['evidence_type']=='Average Picket Count')
            $Average = $v['0']['cnt'];
         elseif($v['documents']['evidence_type']=='Victim Statement')
            $Victim = $v['0']['cnt'];
         elseif($v['documents']['evidence_type']=='Miscellaneous')
            $Miscellaneous = $v['0']['cnt'];
     
    }
    unset($v);
?>
<a href="graphs<?php echo $qry;?>" class="btn btn-primary"> Show Graph</a> <a href="javascript:void(0);" onclick="window.print();" class="btn btn-primary">Print Report</a>
<table class="table" id="toprint">
<tr><td colspan="2" style="border-top: none;"><h3 class="page-title">Document Uploads Report</h3></td></tr>
<tr><td colspan="2"><?php
if(isset($_REQUEST['from']) && $_REQUEST['from'])
echo "<strong>FROM :</strong> ".$_REQUEST['from']." &nbsp; ";
if(isset($_REQUEST['to']) && $_REQUEST['to'])
echo "<strong>TO :</strong> ".$_REQUEST['to']."<br/>";
if(isset($by))
echo "<strong>Uploaded By: </strong>".ucfirst($by);
?></td></tr>
<tr><th>Contracts</th><th><?php echo $contract;?> uploads</th></tr>
<tr><th>Evidence</th><th><?php echo $evidence;?> uploads</th></tr>
<tr><td>Incident Report</td><td><?php echo $Incident;?> uploads</td></tr>
<tr><td>Line Crossing Sheet</td><td><?php echo $Line;?> uploads</td></tr>
<tr><td>Shift Summary</td><td><?php echo $Shift;?> uploads</td></tr>
<tr><td>Incident Video</td><td><?php echo $Video;?> uploads</td></tr>
<tr><td>Executive Summary</td><td><?php echo $Executive;?> uploads</td></tr>
<tr><td>Average Picket Count</td><td><?php echo $Average;?> uploads</td></tr>
<tr><td>Victim Statement</td><td><?php echo $Victim;?> uploads</td></tr>
<tr><td>Miscellaneous</td><td><?php echo $Miscellaneous;?> uploads</td></tr>
<tr><th>Templates</th><th><?php echo $template;?> uploads</th></tr>

<?php
$Activity = 0;
$Inspection = 0;
$Security = 0;
$Occurance = 0;
$incident_report = 0;
$Sheets = 0;
if(isset($from) && isset($to))
    $rep = $report_type->query("SELECT COUNT(*) as cnt, report_type FROM activities WHERE `date` >='$from' and `date`<='$to' GROUP BY report_type");    
elseif(isset($from))
    $rep = $report_type->query("SELECT COUNT(*) as cnt, report_type FROM activities WHERE `date` >='$from' GROUP BY report_type");
elseif(isset($to))
    $rep = $report_type->query("SELECT COUNT(*) as cnt, report_type FROM activities WHERE `date`<='$to' GROUP BY report_type");
else
    $rep = $report_type->query("SELECT COUNT(*) as cnt, report_type FROM activities GROUP BY report_type");

foreach($rep as $v)
{
     if( $v['activities']['report_type']=='1')
        $Activity = $v['0']['cnt'];
     elseif($v['activities']['report_type']=='2')
        $Inspection = $v['0']['cnt'];
     elseif($v['activities']['report_type']=='3')
       $Security = $v['0']['cnt'];
     elseif($v['activities']['report_type']=='4')
        $Occurance = $v['0']['cnt'];
     elseif($v['activities']['report_type']=='5')
        $incident_report = $v['0']['cnt'];
     elseif($v['activities']['report_type']=='6')
        $Sheets = $v['0']['cnt'];
         
}
unset($v);

$a_a = 0;
$b = 0;
$f_l = 0;
$p_d = 0;
$m = 0;
$s_l = 0;
$d_p = 0;
$a_e = 0;
$s_a = 0;
$f_a = 0;
$a_c = 0;
$s_r = 0;
$f_r = 0;
$n_p_s = 0;
$s_i_t = 0;

if(isset($from)&& isset($to))
       $inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE `date`>='$from' and `date`<='$to' and incident_type <>' ' GROUP BY incident_type");   
    elseif(isset($from))
        $inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE `date`>='$from' and incident_type <>' ' GROUP BY incident_type");
    elseif(isset($to))
        $inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE `date`<='$to' and incident_type <>' ' GROUP BY incident_type");
    else
        $inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE incident_type <>' ' GROUP BY incident_type");
//$inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE incident_type <> ' ' GROUP BY incident_type");
foreach($inc as $v)
{
     if( $v['activities']['incident_type']=='Alarm Activation')
        $a_a = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Burglary')
        $b = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Property Damage')
       $p_d = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Miscellaneous')
        $m = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Shoplift Loss')
        $s_l = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Disorderly Person')
        $d_p = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Accident - Employee')
        $a_e = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Shoplift Apprehension')
        $s_a = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Fraud Apprehension')
        $f_a = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Accident - Customer')
        $a_c = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Shoplift Recovery')
        $s_r = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Fraud Recovery')
        $f_r = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Non-Productive Stop')
        $n_p_s = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Suspicion Internal Theft')
        $s_i_t = $v['0']['cnt'];
     elseif($v['activities']['incident_type']=='Fraud Loss')
        $f_l = $v['0']['cnt'];
         
}
unset($v);
?>

<tr><th>Report</th><th><?php echo $report;?> uploads</th></tr>
<tr><td>Activity Log</td><td><?php echo $Activity;?> uploads</td></tr>
<tr><td>Mobile Inspection</td><td><?php echo $Inspection;?> uploads</td></tr>
<tr><td>Mobile Security</td><td><?php echo $Security;?> uploads</td></tr>
<tr><td>Security Occurance</td><td><?php echo $Occurance;?> uploads</td></tr>
<tr><td>Sign-off Sheets</td><td><?php echo $Sheets;?> uploads</td></tr>
<tr><td>Incident Report</td><td><?php echo $incident_report;?> uploads</td></tr>
<tr>
<td colspan="2"  style="padding-left: 25px;">
<table class="table">
<tr><td style="border-top: none;">Alarm Activation</td><td style="border-top: none;"><?php echo $a_a;?> uploads</td></tr>
<tr><td>Burglary</td><td><?php echo $b;?> uploads</td></tr>
<tr><td>Property Damage</td><td><?php echo $p_d;?> uploads</td></tr>
<tr><td>Miscellaneous</td><td><?php echo $m;?> uploads</td></tr>
<tr><td>Shoplift Loss</td><td><?php echo $s_l;?> uploads</td></tr>
<tr><td>Disorderly Person</td><td><?php echo $d_p;?> uploads</td></tr>
<tr><td>Accident - Employee</td><td><?php echo $a_e;?> uploads</td></tr>
<tr><td>Shoplift Apprehension</td><td><?php echo $s_a;?> uploads</td></tr>
<tr><td>Fraud Apprehension</td><td><?php echo $f_a;?> uploads</td></tr>
<tr><td>Accident - Customer</td><td><?php echo $a_c;?> uploads</td></tr>
<tr><td>Shoplift Recovery</td><td><?php echo $s_r;?> uploads</td></tr>
<tr><td>Fraud Recovery</td><td><?php echo $f_r;?> uploads</td></tr>
<tr><td>Non-Productive Stop</td><td><?php echo $n_p_s;?> uploads</td></tr>
<tr><td>Suspicion Internal Theft</td><td><?php echo $s_i_t;?> uploads</td></tr>
<tr><td>Fraud Loss</td><td><?php echo $f_l;?> uploads</td></tr>
</table>
</td>
</tr>
 
<tr><th>Site orders</th><th><?php echo $siteOrder;?> uploads</th></tr>
<?php
$Post = 0;
$Operational = 0;
$Site_maps = 0;
$Forms = 0;
 if(isset($from)&& isset($to))
       $ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE `date`>='$from' and `date`<='$to' and site_type <>' ' GROUP BY site_type");   
    elseif(isset($from))
        $ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE `date`>='$from' and site_type <>' ' GROUP BY site_type");
    elseif(isset($to))
        $ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE `date`<='$to' and site_type <>' ' GROUP BY site_type");
    else
        $ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE site_type <>' ' GROUP BY site_type");
//$ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE site_type <>' ' GROUP BY site_type");
    foreach($ste as $v)
    {
         if( $v['documents']['site_type']=='Post Orders')
            $Post = $v['0']['cnt'];
         elseif($v['documents']['site_type']=='Operational Memos')
            $Operational = $v['0']['cnt'];
         elseif($v['documents']['site_type']=='Site Maps')
           $Site_maps = $v['0']['cnt'];
         elseif($v['documents']['site_type']=='Forms')
            $Forms = $v['0']['cnt'];
       
     
    }
    unset($v);
?>


<tr><td>Post Orders</td><td><?php echo $Post;?> uploads</td></tr>
<tr><td>Operational Memos</td><td><?php echo $Operational;?> uploads</td></tr>
<tr><td>Site Maps</td><td><?php echo $Site_maps;?> uploads</td></tr>
<tr><td>Forms</td><td><?php echo $Forms;?> uploads</td></tr>


<tr><th>Training</th><th><?php echo $training;?> uploads</th></tr>
<?php
$health =0;
 if(isset($from)&& isset($to))
       $tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE `date`>='$from' and `date`<='$to' and training_type <>' ' GROUP BY training_type");   
    elseif(isset($from))
        $tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE `date`>='$from' and training_type <>' ' GROUP BY training_type");
    elseif(isset($to))
        $tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE `date`<='$to' and training_type <>' ' GROUP BY training_type");
    else
        $tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE training_type <>' ' GROUP BY training_type");
//$tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE training_type <>' ' GROUP BY training_type");
    foreach($tra as $v)
    {
         if( $v['documents']['training_type']=='Health & Safety Manuals')
            $health = $v['0']['cnt'];
        
       
     
    }
    unset($v);
?>

<tr><th>Health & Safety Manuals</th><th><?php echo $health;?> uploads</th></tr>
<tr><th>Employee</th><th><?php echo $employee;?> uploads</th></tr>
<?php
$j_d = 0;
$d_f_p = 0;
$Schedules = 0;
if(isset($from)&& isset($to))
       $emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE `date`>='$from' and `date`<='$to' and employee_type <>' ' GROUP BY employee_type");   
    elseif(isset($from))
        $emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE `date`>='$from' and employee_type <>' ' GROUP BY employee_type");
    elseif(isset($to))
        $emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE `date`<='$to' and employee_type <>' ' GROUP BY employee_type");
    else
        $emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE employee_type <>' ' GROUP BY employee_type");
//$emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE employee_type <>' ' GROUP BY employee_type");
    foreach($emp as $v)
    {
         if( $v['documents']['employee_type']=='Job Descriptions')
            $j_d = $v['0']['cnt'];
         elseif($v['documents']['employee_type']=='Drug Free Policy')
           $d_f_p = $v['0']['cnt'];
          elseif($v['documents']['employee_type']=='Schedules')
           $Schedules = $v['0']['cnt'];
       
     
    }
    unset($v);
?>
<tr><th>Job Descriptions</th><th><?php echo $j_d;?> uploads</th></tr>
<tr><th>Drug Free Policy</th><th><?php echo $d_f_p;?> uploads</th></tr>
<tr><th>Schedules</th><th><?php echo $Schedules;?> uploads</th></tr>

<tr><th>KPI Audits</th><th><?php echo $KPIAudits;?> uploads</th></tr>
<tr><th>Client Feedback</th><th><?php echo $client_feedback;?> uploads</th></tr>
<tr><td colspan="2">
<div style="margin: 10px 0;">
<strong>Printed By : </strong><?php if($this->Session->read('user'))echo ucfirst($this->Session->read('user'));else echo 'Admin';?><br />
<strong>Generated On : </strong><?php echo date('Y-m-d H:i:s');?>

</div>

</td></tr>
</table>

