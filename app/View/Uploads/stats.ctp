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

<h3 class="page-title">
Document Analytics
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/stats">Document Analytics</a>
        
	</li>
</ul>

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
<a href="graphs<?php echo $qry;?>" class="btn btn-primary">Graphical Report</a> <a href="javascript:void(0);" onclick="window.print();" class="btn btn-primary">Print Report</a>
<br>
<br>


<table class="table" id="toprint">
<tr><td colspan="2" style="border-top: none;">
<b>Document Analytics</b><br>
Generated by <?php if($this->Session->read('user'))echo ucfirst($this->Session->read('user'));else echo 'Admin';?> on <?php echo date('Y-m-d H:i:s');?>
<br>
<?php
if(isset($_REQUEST['from']) && $_REQUEST['from'])
echo "<strong>Filter from:</strong> ".$_REQUEST['from']."";
if(isset($_REQUEST['to']) && $_REQUEST['to'])
echo "<strong> to </strong> ".$_REQUEST['to']."<br/>";
if(isset($by))
{
echo "Only show documents uploaded by: <strong>".ucfirst($by) ."</strong>";
}
else
{
echo "";
}
?></td></tr>
<tr><th>Contracts</th><th><?php echo $contract;?> uploads total</th></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr>
<tr><th>Evidence</th><th><?php echo $evidence;?> uploads total</th></tr>
<tr><td style="padding-left:30px;">Incident Report</td><td><?php echo $Incident;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Line Crossing Sheet</td><td><?php echo $Line;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Shift Summary</td><td><?php echo $Shift;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Incident Video</td><td><?php echo $Video;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Executive Summary</td><td><?php echo $Executive;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Average Picket Count</td><td><?php echo $Average;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Victim Statement</td><td><?php echo $Victim;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Miscellaneous</td><td><?php echo $Miscellaneous;?> uploads</td></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr>

<tr><th>Templates</th><th><?php echo $template;?> uploads total</th></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr>

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
     elseif($v['activities']['report_type']=='7')
        $Loss_p = $v['0']['cnt'];
         
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

<tr><th>Report</th><th><?php echo $report;?> uploads total</th></tr>
<tr><td style="padding-left:30px;">Activity Log</td><td><?php echo $Activity;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Mobile Inspection</td><td><?php echo $Inspection;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Mobile Security</td><td><?php echo $Security;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Security Occurrence</td><td><?php echo $Occurance;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Sign-off Sheets</td><td><?php echo $Sheets;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Loss Prevention</td><td><?php echo $Loss_p;?> uploads</td></tr>

<tr><td style="padding-left:30px;"><b>Incident Report</b></td><td><b><?php echo $incident_report;?> uploads</b></td></tr>
<tr style="padding:20px;margin:30px;">
<tr><td style="padding-left:60px;">Alarm Activation</td><td style=""><?php echo $a_a;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Burglary</td><td><?php echo $b;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Property Damage</td><td><?php echo $p_d;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Miscellaneous</td><td><?php echo $m;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Shoplift Loss</td><td><?php echo $s_l;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Disorderly Person</td><td><?php echo $d_p;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Accident - Employee</td><td><?php echo $a_e;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Shoplift Apprehension</td><td><?php echo $s_a;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Fraud Apprehension</td><td><?php echo $f_a;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Accident - Customer</td><td><?php echo $a_c;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Shoplift Recovery</td><td><?php echo $s_r;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Fraud Recovery</td><td><?php echo $f_r;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Non-Productive Stop</td><td><?php echo $n_p_s;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Suspicion Internal Theft</td><td><?php echo $s_i_t;?> uploads</td></tr>
<tr><td style="padding-left:60px;">Fraud Loss</td><td><?php echo $f_l;?> uploads</td></tr>

</tr>
 <tr style="background-color:#efefef;"><th></th><th></th></tr>

<tr><th>Site Orders</th><th><?php echo $siteOrder;?> uploads total</th></tr>
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


<tr><td style="padding-left:30px;">Post Orders</td><td><?php echo $Post;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Operational Memos</td><td><?php echo $Operational;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Site Maps</td><td><?php echo $Site_maps;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Forms</td><td><?php echo $Forms;?> uploads</td></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr>


<tr><th>Training</th><th><?php echo $training;?> uploads total</th></tr>

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

<tr><td style="padding-left:30px;">Health & Safety Manuals</td><td><?php echo $health;?> uploads</td></tr>

<tr style="background-color:#efefef;"><th></th><th></th></tr>

<tr><th>Employee</th><th><?php echo $employee;?> uploads total</th></tr>

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

<tr><td style="padding-left:30px;">Job Description</td><td><?php echo $j_d;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Drug Free Policy</td><td><?php echo $d_f_p;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Schedules</td><td><?php echo $Schedules;?> uploads</td></tr>

<tr style="background-color:#efefef;"><th></th><th></th></tr><tr><th>KPI Audits</th><th><?php echo $KPIAudits;?> uploads total</th></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr><tr><th>Client Feedback</th><th><?php echo $client_feedback;?> uploads total</th></tr>















<?php
$ob = 0;
$fe = 0;
$non = 0;
$sc = 0;
if(isset($from)&& isset($to))
       $clientfeedback = $doc->query("SELECT COUNT(*) as cnt, client_feedback FROM documents WHERE `date`>='$from' and `date`<='$to' and client_feedback <>' ' GROUP BY client_feedback");   
    elseif(isset($from))
        $clientfeedback = $doc->query("SELECT COUNT(*) as cnt, client_feedback FROM documents WHERE `date`>='$from' and client_feedback <>' ' GROUP BY client_feedback");
    elseif(isset($to))
        $clientfeedback = $doc->query("SELECT COUNT(*) as cnt, client_feedback FROM documents WHERE `date`<='$to' and client_feedback <>' ' GROUP BY client_feedback");
    else
        $clientfeedback = $doc->query("SELECT COUNT(*) as cnt, client_feedback FROM documents WHERE client_feedback <>' ' GROUP BY client_feedback");

    foreach($clientfeedback as $v)
    {
         if( $v['documents']['client_feedback']=='observation')
            $ob = $v['0']['cnt'];
         elseif($v['documents']['client_feedback']=='feedback')
           $fe = $v['0']['cnt'];
         elseif($v['documents']['client_feedback']=='non_compliance')
           $non = $v['0']['cnt'];
         elseif($v['documents']['client_feedback']=='great_job')
           $sc = $v['0']['cnt'];
       
     
    }
    unset($v);
?>

<tr><td style="padding-left:30px;">Observation</td><td><?php echo $ob;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Feedback</td><td><?php echo $fe;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Non-Compliance</td><td><?php echo $non;?> uploads</td></tr>
<tr><td style="padding-left:30px;">Great Job</td><td><?php echo $sc;?> uploads</td></tr>












</table>