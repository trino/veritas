<h3 class="page-title">Upload Report</h3>
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
<table class="table">
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

<tr><th>Report</th><th><?php echo $report;?> uploads</th></tr>
<tr><td>Activity Log</td><td><?php echo $Activity;?> uploads</td></tr>
<tr><td>Mobile Inspection</td><td><?php echo $Inspection;?> uploads</td></tr>
<tr><td>Mobile Security</td><td><?php echo $Security;?> uploads</td></tr>
<tr><td>Security Occurance</td><td><?php echo $Occurance;?> uploads</td></tr>
<tr><td>Sign-off Sheets</td><td><?php echo $report;?> uploads</td></tr>
<tr><td>Incident Report</td><td><?php echo $Sheets;?> uploads</td></tr>
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


<tr><td>Post Orders</td><td><?php echo $Post;?> uploads</td></tr>
<tr><td>Operational Memos</td><td><?php echo $Operational;?> uploads</td></tr>
<tr><td>Site Maps</td><td><?php echo $Site_maps;?> uploads</td></tr>
<tr><td>Forms</td><td><?php echo $Forms;?> uploads</td></tr>


<tr><th>Training</th><th><?php echo $training;?> uploads</th></tr>
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

<tr><th>Health & Safety Manuals</th><th><?php echo $health;?> uploads</th></tr>
<tr><th>Employee</th><th><?php echo $employee;?> uploads</th></tr>
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
<tr><th>Job Descriptions</th><th><?php echo $j_d;?> uploads</th></tr>
<tr><th>Drug Free Policy</th><th><?php echo $d_f_p;?> uploads</th></tr>
<tr><th>Schedules</th><th><?php echo $Schedules;?> uploads</th></tr>

<tr><th>KPI Audits</th><th><?php echo $KPIAudits;?> uploads</th></tr>
</table>