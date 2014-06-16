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
<?php echo "Document ".$this->requestAction('dashboard/translate/Analytics');?> 
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/stats"><?php echo "Document ".$this->requestAction('dashboard/translate/Analytics');?></a>
        
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
        
    if(isset($_POST['addedBy']) && $_POST['addedBy']!="")
    {
        $cond = " and addedBy = $_POST[addedBy]";
    }
    else
        $cond = "";
?>



<form action="" method="post" id="datefilter">
    <input type="text" value="" name="from" placeholder="<?php echo $this->requestAction('dashboard/translate/Start Date');?>" style="width: 100px; margin-top:10px;" class="datepicker required" />
    <input type="text" value="" name="to" placeholder="<?php echo $this->requestAction('dashboard/translate/End Date');?>" style="width: 100px; margin-top: 10px;" class="datepicker required" />
    <select name="addedBy" style="margin-top: 10px;">
        <option value=""><?php echo $this->requestAction('dashboard/translate/Select User');?></option>
        <option value="0">Admin</option>
        <?php foreach($users as $u){?>
        <option value="<?php echo $u['Member']['id'];?>"><?php echo $u['Member']['full_name'];?></option>
        <?php }?>
    </select>
    
    <input type="submit" value="<?php echo $this->requestAction('dashboard/translate/Go');?>" class="btn btn-primary" />
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
       $evi = $doc->query("SELECT COUNT(*) as cnt, evidence_type FROM documents WHERE `date`>='$from' and `date`<='$to' ".$cond." and evidence_type <>' ' GROUP BY evidence_type");   
    elseif(isset($from))
        $evi = $doc->query("SELECT COUNT(*) as cnt, evidence_type FROM documents WHERE `date`>='$from' ".$cond." and evidence_type <>' ' GROUP BY evidence_type");
    elseif(isset($to))
        $evi = $doc->query("SELECT COUNT(*) as cnt, evidence_type FROM documents WHERE `date`<='$to' ".$cond." and evidence_type <>' ' GROUP BY evidence_type");
    else
        $evi = $doc->query("SELECT COUNT(*) as cnt, evidence_type FROM documents WHERE evidence_type <>' ' ".$cond." GROUP BY evidence_type");
    
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
<!--<a href="graphs<?php echo $qry;?>" class="btn btn-primary">Graphical Report</a> <a href="javascript:void(0);" onclick="window.print();" class="btn btn-primary">Print Report</a>
<br>
<br>-->


<table class="table" id="toprint">
<tr><td colspan="2" style="border-top: none;">
<b>Document <?php echo $this->requestAction('dashboard/translate/Analytics');?></b><br>
<?php echo $this->requestAction('dashboard/translate/Generated by');?> <?php if($this->Session->read('user'))echo ucfirst($this->Session->read('user'));else echo 'Admin';?> on <?php echo date('Y-m-d H:i:s');?>
<br>
<?php
if(isset($_REQUEST['from']) && $_REQUEST['from'])
echo "<strong>".$this->requestAction('dashboard/translate/Filter from').":</strong> ".$_REQUEST['from']."";
if(isset($_REQUEST['to']) && $_REQUEST['to'])
echo "<strong>".$this->requestAction('dashboard/translate/to')."</strong> ".$_REQUEST['to']."<br/>";
if(isset($by))
{
echo "Only show documents uploaded by: <strong>".ucfirst($by) ."</strong>";
}
else
{
echo "";
}
?></td></tr>
<tr><th><?php echo $this->requestAction('dashboard/translate/Contracts');?></th><th><?php echo $contract;?> <?php echo $this->requestAction('dashboard/translate/uploads total');?></th></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr>
<tr><th><?php echo $this->requestAction('dashboard/translate/Evidence');?></th><th><?php echo $evidence;?> <?php echo $this->requestAction('dashboard/translate/uploads total');?></th></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Incident Report');?></td><td><?php echo $Incident;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Line Crossing Sheet');?></td><td><?php echo $Line;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Shift Summary');?></td><td><?php echo $Shift;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Incident Video');?></td><td><?php echo $Video;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Executive Summary');?></td><td><?php echo $Executive;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Average Picket Count');?></td><td><?php echo $Average;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Victim Statement');?></td><td><?php echo $Victim;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Miscellaneou');?>s</td><td><?php echo $Miscellaneous;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr>

<tr><th><?php echo $this->requestAction('dashboard/translate/Templates');?></th><th><?php echo $template;?> <?php echo $this->requestAction('dashboard/translate/uploads total');?></th></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr>

<?php
$Activity = 0;
$Inspection = 0;
$Security = 0;
$Occurance = 0;
$incident_report = 0;
$Sheets = 0;
$Loss_p = 0;
$Static_audit = 0;
$Insurance_audit = 0;
$Site_signin = 0;
$Instructions = 0;
if(isset($from) && isset($to))
    $rep = $report_type->query("SELECT COUNT(*) as cnt, report_type FROM activities WHERE `uploaded_on` >='$from' ".$cond." and `uploaded_on`<='$to' GROUP BY report_type");    
elseif(isset($from))
    $rep = $report_type->query("SELECT COUNT(*) as cnt, report_type FROM activities WHERE `uploaded_on` >='$from' ".$cond." GROUP BY report_type");
elseif(isset($to))
    $rep = $report_type->query("SELECT COUNT(*) as cnt, report_type FROM activities WHERE `uploaded_on`<='$to' ".$cond." GROUP BY report_type");
else
    $rep = $report_type->query("SELECT COUNT(*) as cnt, report_type FROM activities WHERE id <> '' ".$cond." GROUP BY report_type");

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
     elseif($v['activities']['report_type']=='8')
        $Static_audit = $v['0']['cnt'];
     elseif($v['activities']['report_type']=='9')
        $Insurance_audit = $v['0']['cnt'];
      elseif($v['activities']['report_type']=='10')
        $Site_signin = $v['0']['cnt'];
       elseif($v['activities']['report_type']=='11')
        $Instructions = $v['0']['cnt'];
         
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
       $inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE `uploaded_on`>='$from' and `uploaded_on`<='$to' ".$cond." and incident_type <>' ' GROUP BY incident_type");   
    elseif(isset($from))
        $inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE `uploaded_on`>='$from' and incident_type <>' ' ".$cond." GROUP BY incident_type");
    elseif(isset($to))
        $inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE `uploaded_on`<='$to' and incident_type <>' ' ".$cond." GROUP BY incident_type");
    else
        $inc = $report_type->query("SELECT COUNT(*) as cnt, incident_type FROM activities WHERE incident_type <>' ' ".$cond." GROUP BY incident_type");
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

<tr><th><?php echo $this->requestAction('dashboard/translate/Report');?></th><th><?php echo $report;?> <?php echo $this->requestAction('dashboard/translate/uploads total');?></th></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Activity Log');?></td><td><?php echo $Activity;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Mobile Inspection');?></td><td><?php echo $Inspection;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Mobile Security');?></td><td><?php echo $Security;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Security Occurrence');?></td><td><?php echo $Occurance;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Sign-off Sheets');?></td><td><?php echo $Sheets;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Loss Prevention');?></td><td><?php echo $Loss_p;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Static Site Audit');?></td><td><?php echo $Static_audit;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Insurance Site Audit');?></td><td><?php echo $Insurance_audit;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Site Signin Signout');?></td><td><?php echo $Site_signin;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Instructions and site Assessment');?></td><td><?php echo $Instructions;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><b><?php echo $this->requestAction('dashboard/translate/Incident Report');?></b></td><td><b><?php echo $incident_report;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></b></td></tr>
<tr style="padding:20px;margin:30px;">
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Alarm Activation');?></td><td style=""><?php echo $a_a;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Burglary');?></td><td><?php echo $b;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Property Damage');?></td><td><?php echo $p_d;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Miscellaneous');?></td><td><?php echo $m;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Shoplift Loss');?></td><td><?php echo $s_l;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Disorderly Person');?></td><td><?php echo $d_p;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Accident - Employee');?></td><td><?php echo $a_e;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Shoplift Apprehension');?></td><td><?php echo $s_a;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Fraud Apprehension');?></td><td><?php echo $f_a;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Accident - Customer');?></td><td><?php echo $a_c;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Shoplift Recovery');?></td><td><?php echo $s_r;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Fraud Recovery');?></td><td><?php echo $f_r;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Non-Productive Stop');?></td><td><?php echo $n_p_s;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Suspicion Internal Theft');?></td><td><?php echo $s_i_t;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:60px;"><?php echo $this->requestAction('dashboard/translate/Fraud Loss');?></td><td><?php echo $f_l;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>

</tr>
 <tr style="background-color:#efefef;"><th></th><th></th></tr>

<tr><th><?php echo $this->requestAction('dashboard/translate/Site Orders');?></th><th><?php echo $siteOrder;?> uploads total</th></tr>
<?php
$Post = 0;
$Operational = 0;
$Site_maps = 0;
$Forms = 0;
 if(isset($from)&& isset($to))
       $ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE `date`>='$from' and `date`<='$to' ".$cond." and site_type <>' ' GROUP BY site_type");   
    elseif(isset($from))
        $ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE `date`>='$from' and site_type <>' ' ".$cond." GROUP BY site_type");
    elseif(isset($to))
        $ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE `date`<='$to' and site_type <>' ' ".$cond." GROUP BY site_type");
    else
        $ste = $doc->query("SELECT COUNT(*) as cnt, site_type FROM documents WHERE site_type <>' ' ".$cond." GROUP BY site_type");
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


<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Post Orders');?></td><td><?php echo $Post;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Operational Memos');?></td><td><?php echo $Operational;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Site Maps');?></td><td><?php echo $Site_maps;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Forms');?></td><td><?php echo $Forms;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr>


<tr><th><?php echo $this->requestAction('dashboard/translate/Training');?></th><th><?php echo $training;?> uploads total</th></tr>

<?php
$health =0;
 if(isset($from)&& isset($to))
       $tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE `date`>='$from' and `date`<='$to' ".$cond." and training_type <>' ' GROUP BY training_type");   
    elseif(isset($from))
        $tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE `date`>='$from' and training_type <>' ' ".$cond." GROUP BY training_type");
    elseif(isset($to))
        $tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE `date`<='$to' and training_type <>' ' ".$cond." GROUP BY training_type");
    else
        $tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE training_type <>' ' ".$cond." GROUP BY training_type");
//$tra = $doc->query("SELECT COUNT(*) as cnt, training_type FROM documents WHERE training_type <>' ' GROUP BY training_type");
    foreach($tra as $v)
    {
         if( $v['documents']['training_type']=='Health & Safety Manuals')
            $health = $v['0']['cnt'];
        
       
     
    }
    unset($v);
?>

<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Health & Safety Manuals');?></td><td><?php echo $health;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>

<tr style="background-color:#efefef;"><th></th><th></th></tr>

<tr><th><?php echo $this->requestAction('dashboard/translate/Employee');?></th><th><?php echo $employee;?> uploads total</th></tr>

<?php
$j_d = 0;
$d_f_p = 0;
$Schedules = 0;
if(isset($from)&& isset($to))
       $emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE `date`>='$from' and `date`<='$to' ".$cond." and employee_type <>' ' GROUP BY employee_type");   
    elseif(isset($from))
        $emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE `date`>='$from' and employee_type <>' ' ".$cond." GROUP BY employee_type");
    elseif(isset($to))
        $emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE `date`<='$to' and employee_type <>' ' ".$cond." GROUP BY employee_type");
    else
        $emp = $doc->query("SELECT COUNT(*) as cnt, employee_type FROM documents WHERE employee_type <>' ' ".$cond." GROUP BY employee_type");
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

<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Job Description');?></td><td><?php echo $j_d;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Drug Free Policy');?></td><td><?php echo $d_f_p;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Schedules');?></td><td><?php echo $Schedules;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>

<tr style="background-color:#efefef;"><th></th><th></th></tr><tr><th><?php echo $this->requestAction('dashboard/translate/KPI Audits');?></th><th><?php echo $KPIAudits;?> uploads total</th></tr>
<tr style="background-color:#efefef;"><th></th><th></th></tr><tr><th><?php echo $this->requestAction('dashboard/translate/Client Feedback');?></th><th><?php echo $client_feedback;?> uploads total</th></tr>















<?php
$ob = 0;
$fe = 0;
$non = 0;
$sc = 0;
if(isset($from)&& isset($to))
       $clientfeedback = $doc->query("SELECT COUNT(*) as cnt, client_feedback FROM documents WHERE `date`>='$from' and `date`<='$to' ".$cond." and client_feedback <>' ' GROUP BY client_feedback");   
    elseif(isset($from))
        $clientfeedback = $doc->query("SELECT COUNT(*) as cnt, client_feedback FROM documents WHERE `date`>='$from' and client_feedback <>' ' ".$cond." GROUP BY client_feedback");
    elseif(isset($to))
        $clientfeedback = $doc->query("SELECT COUNT(*) as cnt, client_feedback FROM documents WHERE `date`<='$to' and client_feedback <>' ' ".$cond." GROUP BY client_feedback");
    else
        $clientfeedback = $doc->query("SELECT COUNT(*) as cnt, client_feedback FROM documents WHERE client_feedback <>' ' ".$cond." GROUP BY client_feedback");

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

<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Observation');?></td><td><?php echo $ob;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Feedback');?></td><td><?php echo $fe;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Non-Compliance');?></td><td><?php echo $non;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>
<tr><td style="padding-left:30px;"><?php echo $this->requestAction('dashboard/translate/Great Job');?></td><td><?php echo $sc;?> <?php echo $this->requestAction('dashboard/translate/uploads');?></td></tr>












</table>