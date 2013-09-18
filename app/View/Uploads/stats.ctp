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
Contracts (<?php echo $contract;?> uploads)<br />
<br />
Evidence (<?php echo $evidence;?> uploads)<br />
-Incident Report (<?php echo $Incident;?> uploads)<br />
-Line Crossing Sheet (<?php echo $Line;?> uploads)<br />
-Shift Summary (<?php echo $Shift;?> uploads)<br />
-Incident Video (<?php echo $Video;?> uploads)<br />
-Executive Summary (<?php echo $Executive;?> uploads)<br />
-Average Picket Count (<?php echo $Average;?> uploads)<br />
-Victim Statement (<?php echo $Victim;?> uploads)<br />
-Miscellaneous (<?php echo $Miscellaneous;?> uploads)<br />
 <br />
Templates(<?php echo $template;?> uploads)<br />
<br />
<?php
$Activity = 0;
$Inspection = 0;
$Security = 0;
$Occurance = 0;
$incident_report = 0;
$Sheets = 0;
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

$inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE incident_type <> ' ' GROUP BY incident_type");
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

Report(<?php echo $report;?> uploads)<br />
-Activity Log(<?php echo $Activity;?> uploads)<br />
-Mobile Inspection(<?php echo $Inspection;?> uploads)<br />
-Mobile Security(<?php echo $Security;?> uploads)<br />
-Security Occurance(<?php echo $Occurance;?> uploads)<br />
-Sign-off Sheets(<?php echo $report;?> uploads)<br />
-Incident Report(<?php echo $Sheets;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Alarm Activation(<?php echo $a_a;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Burglary(<?php echo $b;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Property Damage(<?php echo $p_d;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Miscellaneous(<?php echo $m;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Shoplift Loss(<?php echo $s_l;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Disorderly Person(<?php echo $d_p;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Accident - Employee(<?php echo $a_e;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Shoplift Apprehension(<?php echo $s_a;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Fraud Apprehension(<?php echo $f_a;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Accident - Customer(<?php echo $a_c;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Shoplift Recovery(<?php echo $s_r;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Fraud Recovery(<?php echo $f_r;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Non-Productive Stop(<?php echo $n_p_s;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Suspicion Internal Theft(<?php echo $s_i_t;?> uploads)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Fraud Loss(<?php echo $f_l;?> uploads)<br />
 <br />
Site orders(<?php echo $siteOrder;?> uploads)<br />
<?php
$Post = 0;
$Operational = 0;
$Site_maps = 0;
$Forms = 0;
$ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE site_type <>' ' GROUP BY site_type");
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

-Post Orders(<?php echo $Post;?> uploads)<br />
-Operational Memos(<?php echo $Operational;?> uploads)<br />
-Site Maps(<?php echo $Site_maps;?> uploads)<br />
-Forms(<?php echo $Forms;?> uploads)<br />
<br />

Training(<?php echo $training;?> uploads)<br />
<?php
$health =0;
$tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE training_type <>' ' GROUP BY training_type");
    foreach($tra as $v)
    {
         if( $v['documents']['training_type']=='Health & Safety Manuals')
            $health = $v['0']['cnt'];
        
       
     
    }
    unset($v);
?>
-Health & Safety Manuals(<?php echo $health;?> uploads)<br />
<br />
Employee(<?php echo $employee;?> uploads)<br />
<?php
$j_d = 0;
$d_f_p = 0;
$Schedules = 0;
$emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE employee_type <>' ' GROUP BY employee_type");
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
-Job Descriptions(<?php echo $j_d;?> uploads)<br />
-Drug Free Policy(<?php echo $d_f_p;?> uploads)<br />
-Schedules(<?php echo $Schedules;?> uploads)<br />
<br />
KPI Audits(<?php echo $KPIAudits;?> uploads)<br />