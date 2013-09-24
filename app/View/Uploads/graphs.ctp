<?php //var_dump($all);?>
<div style="margin: 10px 0;">
<strong>Printed By : </strong><?php if($this->Session->read('user'))echo ucfirst($this->Session->read('user'));else echo 'Admin';?><br />
<strong>Generated On : </strong><?php echo date('Y-m-d H:i:s');?>

</div>

</div>
<input type="button" onclick="window.print();" value="Print Graph" class="btn btn-primary" style="margin-top: 10px;" />

<script src="../js/Theme.js"></script>
<script src="../js/Charts.js"></script>

<script src="../js/plugins/excanvas/excanvas.min.js"></script>

<script src="../js/plugins/cirque/cirque.js"></script>

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>
<link rel="stylesheet" href="../js/plugins/cirque/cirque.css"/>

<style>
.tickLabel{color:#000!important;}
.chart-holder {
    height: 325px;
    width: 150%;
}
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
<div id="toprint">
<h3 class="page-title">Document Uploads Report</h3>
<?php
if(isset($_REQUEST['from']))
echo "<strong>FROM :</strong> ".$_REQUEST['from']." &nbsp; ";
if(isset($_REQUEST['to']))
echo "<strong>TO :</strong> ".$_REQUEST['to']."<br/><br/>";
?>
<?php if(isset($all)){?>
<div class="span6">
<h4>All Documents Report</h4>
    
    <div id="line-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<div style="clear:both;"></div>
<?php }?>
<?php if(isset($evidence)){?>

<div class="span6">
<h4>Evidence Report</h4>
    
    <div id="evidence-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<div style="clear:both;"></div>
<?php }?>
<?php if(isset($report)){?>

<div class="span6">
<h4>Reports Report</h4>
    
    <div id="report-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<div style="clear:both;"></div>
<?php }?>
<?php if(isset($incident)){?>

<div class="span6">
<h4>Incident Reports Report</h4>
    
    <div id="incident-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<div style="clear:both;"></div>
<?php }?>
<?php if(isset($site)){?>

<div class="span6">
<h4>Site OrdersReport</h4>
    
    <div id="site-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<div style="clear:both;"></div>
<?php }?>
<?php if(isset($employee)){?>

<div class="span6">
<h4>EmployeeReport</h4>
    
    <div id="employee-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<div style="clear:both;"></div>
<?php }?>
<?php if(isset($training)){?>

<div class="span6">
<h4>TrainingReport</h4>
    
    <div id="training-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<div style="clear:both;"></div>
<?php }?>
<script>
$(function(){

var contract =[];
var report = [];
var template =[];
var evidence =[];
var employee =[];
var siteOrder =[];
var training =[];
var KPIAudits =[];
var client_feedback =[];
<?php   
    $brk =0;
	   if($all)
		{
		  //var_dump($all); die();
			$vals = "";
			$d = "";
            $contract_count=0;
            $report_count=0;
            $evidence_count=0;
            $template_count=0;
            $siteOrder_count=0;
            $KPIAudits_count=0;
            $training_count=0;
            $employee_count=0;
            $client_feedback_count=0;
			foreach($all as $ke=>$data)
			{
			     
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['documents']['document_type'] == 'contract'){$contract_count+=$data['0']['cnt'];?>
				    contract.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
                    
				<?php
                 
                }
                elseif($data['documents']['document_type'] == 'report')
                {    
                    $report_count+=$data['0']['cnt'];
                ?>
                    report.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'evidence')
                {    
                    $evidence_count+=$data['0']['cnt'];
                ?>
                    evidence.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['documents']['document_type'] == 'template')
                {        
                    $template_count+=$data['0']['cnt'];
                ?>
                    template.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'siteOrder')
                {          
                    $siteOrder_count+=$data['0']['cnt'];
                ?>
                    siteOrder.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'KPIAudits')
                {       
                    $KPIAudits_count+=$data['0']['cnt'];
                ?>
                    KPIAudits.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'training')
                {         
                    $training_count+=$data['0']['cnt'];
                ?>
                    training.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'employee')
                {  
                    $employee_count+=$data['0']['cnt'];
                ?>
                    employee.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'client_feedback')
                {     
                    $client_feedback_count+=$data['0']['cnt'];
                ?>
                    client_feedback.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                ?>
        
			<?php	
				if((count($all)-1)!= $ke)
				{
					$vals .= " ,";
					$d .= " ,";
				}	
			}?>
			var d = [<?php echo $vals; unset($vals); ?>];
			var dt =[];
		<?php
		}
		else
			$brk =1;

if($brk != 1)
{
?>

var data= [
		{
			data: contract,
			label: 'Contracts',
            points: { show: true }, 
		},
		{
			data: report,
			label: 'Reports',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: template,
			label: 'Templates',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: evidence,
			label: 'Evidence',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: KPIAudits,
			label: 'KPIAudits',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: training,
			label: 'Training',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: employee,
			label: 'Employee',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: siteOrder,
			label: 'Site Order',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: client_feedback,
			label: 'Client Feedback',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		}];
 var detailOptions = {            
		 series: {
			lines: { show: true, lineWidth: 2 },
			shadowSize: 1
		},
		points: { 
			show: true, 
			radius: 2, 
			fill: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},
		grid: {  
			hoverable: true,               
			
		},
		yaxis:{
			color:"#8400FF"
		},
		xaxis:{
			mode:"time",timeformat: '%y-%m-%d',
			color:"#8400FF"
		},
		selection:{
			mode: "y"
		},
         legend:{        
                noColumns: 2,
                position: 'ne',
                margin:[-300,0],
            }
};

var masterOptions = {            
		 series: {
			lines: { show: true, lineWidth: 3 },                
			shadowSize: 0
		},
		points: { 
				show: true, 
				radius: 4, 
				fill: true
			},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},    
		grid: {                
			backgroundColor: { colors: ["#96CBFF", "#75BAFF"] }
		},
	   xaxis:{
			mode:"time",timeformat: '%y-%m-%d',                
			color:"#8400FF"
		},
		yaxis:{
			color:"#8400FF"
		},
		selection:{
			mode: "y"
		}
};
var plotDetail = $.plot($("#line-chart"),
	data,
	detailOptions
);
/*
var plotMaster = $.plot($("#masterContainer"),
	data,
	masterOptions
);

$("#line-chart").bind("plotselected", function (event, ranges) {        
	plotDetail = $.plot($("#line-chart"), data,
				  $.extend(true, {}, detailOptions, {
					  yaxis: { min: ranges.yaxis.from, max: ranges.yaxis.to }
				  }));
	plotMaster.setSelection(ranges, true);
});
$("#masterContainer").bind("plotselected", function (event, ranges) {
	plotDetail.setSelection(ranges);
});
*/
<?php 
} // analytic graphs ends
if(isset($evidence))
{
?>
var Incident =[];
var Line = [];
var Video = [];
var Shift = [];
var Executive = [];
var Average = [];
var Victim = [];
var Miscellaneous = [];
<?php 
            $vals = "";
			$d = "";
            $incident_report_count = 0;
            $line_crossing_sheet_count = 0;
            $shift_summary_count = 0;
            $incident_video_count = 0;
            $executive_summary_count = 0;
            $average_picket_count = 0;
            $victim_statement_count = 0;
            $miscellaneous_count = 0;
			foreach($evidence as $ke=>$data)
			{
			    $cnt[]=$data['0']['cnt'];
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['documents']['evidence_type'] == 'Incident Report'){
                    $incident_report_count += $data['0']['cnt'];
                    ?>
				    Incident.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['documents']['evidence_type'] == 'Line Crossing Sheet')
                {            
                    $line_crossing_sheet_count += $data['0']['cnt'];
                ?>
                    Line.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Shift Summary')
                {  
                    $shift_summary_count += $data['0']['cnt'];
                ?>
                    Video.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['documents']['evidence_type'] == 'Incident Video')
                {     
                    $incident_video_count += $data['0']['cnt'];
                ?>
                    Shift.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Executive Summary')
                { 
                    $executive_summary_count += $data['0']['cnt'];
                ?>
                    Executive.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Average Picket Count')
                {        
                    $average_picket_count += $data['0']['cnt'];
                ?>
                    Average.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Victim Statement')
                {     
                    $victim_statement_count += $data['0']['cnt'];
                ?>
                    Victim.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Miscellaneous')
                { 
                    $miscellaneous_count += $data['0']['cnt'];
                ?>
                    Miscellaneous.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                ?>
        
			<?php	
				if((count($evidence)-1)!= $ke)
				{
					$vals .= " ,";
					$d .= " ,";
				}	
			}?>
			var d = [<?php echo $vals; unset($vals); ?>];
			var dt =[];
            var data= [
		{
			data: Incident,
			label: 'Incident Report',
            points: { show: true }, 
		},
		{
			data: Line,
			label: 'Line Crossing Sheet',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Video,
			label: 'Incident Video',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Shift,
			label: 'Shift Summary',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Executive,
			label: 'Executive Summary',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Average,
			label: 'Average Picket Count',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Victim,
			label: 'Victim Statement',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Miscellaneous,
			label: 'Miscellaneous',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		}];
 var detailOptions = {            
		 series: {
			lines: { show: true, lineWidth: 2 },
			shadowSize: 1
		},
		points: { 
			show: true, 
			radius: 4, 
			fill: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},
		grid: {  
			hoverable: true,               
			
		},
		yaxis:{
			color:"#8400FF"
		},
		xaxis:{
			mode:"time",timeformat: '%y-%m-%d',
			color:"#8400FF"
		},
		selection:{
			mode: "y"
		},
         legend:{        
                noColumns: 2,
                position: 'ne',
                margin:[-384,0],
            }
};
var plotDetail = $.plot($("#evidence-chart"),
	data,
	detailOptions
);
<?php    
}// Evidence ends

if(isset($report))
{
?>
var Activity =[];
var Inspection = [];
var Security = [];
var Occurance = [];
var incident_report = [];
var Sheets = [];

<?php 
            $vals = "";
			$d = "";
            $count1 = 0;
             $count2 = 0;
             $count3 = 0;
             $count4 = 0;
             $count5 = 0;
             $count6 = 0;
			foreach($report as $ke=>$data)
			{
			     
			    $cnt[]=$data['0']['cnt'];
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['activities']['report_type'] == '1'){
                    $count1 +=$data['0']['cnt'];
                    ?>
				    Activity.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['activities']['report_type'] == '2')
                {                
                    $count2 +=$data['0']['cnt'];
                ?>
                    Inspection.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['report_type'] == '3')
                {   
                    $count3 +=$data['0']['cnt'];
                ?>
                    Security.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['activities']['report_type'] == '4')
                {   
                    $count4 +=$data['0']['cnt'];
                ?>
                    Occurance.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['report_type'] == '5')
                {     
                    $count5 +=$data['0']['cnt'];
                ?>
                    incident_report.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['report_type'] == '6')
                {    
                    $count6 +=$data['0']['cnt'];
                ?>
                    Sheets.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                ?>
			<?php	
				if((count($report)-1)!= $ke)
				{
					$vals .= " ,";
					$d .= " ,";
				}	
			}?>
			var d = [<?php echo $vals; unset($vals); ?>];
			var dt =[];
            var data= [
		{
			data: Activity,
			label: 'Activity Log',
            points: { show: true }, 
		},
		{
			data: Inspection,
			label: 'Mobile Inspection',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Security,
			label: 'Mobile Security',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Occurance,
			label: 'Security Occurance',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Sheets,
			label: 'Sign-off Sheets',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: incident_report,
			label: 'Incident Reports',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		}];
 var detailOptions = {            
		 series: {
			lines: { show: true, lineWidth: 2 },
			shadowSize: 1
		},
		points: { 
			show: true, 
			radius: 4, 
			fill: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},
		grid: {  
			hoverable: true,               
			
		},
		yaxis:{
			color:"#8400FF"
		},
		xaxis:{
			mode:"time",timeformat: '%y-%m-%d',
			color:"#8400FF"
		},
		selection:{
			mode: "y"
		},
         legend:{        
                noColumns: 2,
                position: 'ne',
                margin:[-350,0],
            }
};

var plotDetail = $.plot($("#report-chart"),
	data,
	detailOptions
);
<?php    
}// Reports end
if(isset($incident))
{
    //VAR_DUMP($incident);die();
?>
var a_a = [];
var b =[];
var p_d = [];
var m = [];
var s_l = [];
var d_p = [];
var a_e = [];
var s_a = [];
var f_a = [];
var a_c = [];
var s_r = [];
var f_r = [];
var n_p_s = [];
var s_i_t = [];
var f_l = [];

<?php 
            $vals = "";
			$d = "";
            $a_a = 0;
            $burg = 0;
            $prop = 0;
            $misc = 0;
            $shop = 0;
            $disord = 0;
            $acc = 0;
            $app = 0;
            $fraud = 0;
            $acc_cust = 0;
            $rec1 = 0;
            $rec2 = 0;
            $non = 0;
            $susp=0;
            $loss = 0;
			foreach($incident as $ke=>$data)
			{
                $cnt[]=$data['0']['cnt'];
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['activities']['incident_type'] == 'Alarm Activation'){
                    $a_a += $data['0']['cnt'];
                    ?>
				    a_a.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                
                elseif($data['activities']['incident_type'] == 'Burglary'){
                    $burg += $data['0']['cnt'];
                    ?>
				    b.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['activities']['incident_type'] == 'Property Damage')
                {  
                    $prop += $data['0']['cnt'];
                ?>
                    p_d.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Miscellaneous')
                {   
                    $misc += $data['0']['cnt'];
                ?>
                    m.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['activities']['incident_type'] == 'Shoplift Loss')
                {   
                    $shop+= $data['0']['cnt'];
                ?>
                    s_l.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Disorderly Person')
                {    
                    $disord+= $data['0']['cnt'];
                ?>
                    d_p.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Accident - Employee')
                {   
                    $acc+= $data['0']['cnt'];
                ?>
                    a_e.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Shoplift Apprehension')
                { 
                    $app+= $data['0']['cnt'];
                ?>
                    s_a.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Fraud Apprehension')
                {  
                    $fraud+= $data['0']['cnt'];
                ?>
                    f_a.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Accident - Customer')
                {     
                    $acc_cust+= $data['0']['cnt'];
                ?>
                    a_c.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Shoplift Recovery')
                {    
                    $rec1+= $data['0']['cnt'];
                ?>
                    s_r.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }                
                elseif($data['activities']['incident_type'] == 'Fraud Recovery')
                {     
                    $rec2+= $data['0']['cnt'];
                ?>
                    f_r.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Non-Productive Stop')
                {     
                    $non+= $data['0']['cnt'];
                ?>
                    n_p_s.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Suspicion Internal Theft')
                {   
                    $susp+= $data['0']['cnt'];
                ?>
                    s_i_t.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Fraud Loss')
                {   
                    $loss+= $data['0']['cnt'];
                ?>
                    f_l.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                
                ?>
			<?php	
				if((count($incident)-1)!= $ke)
				{
					$vals .= " ,";
					$d .= " ,";
				}	
			}?>

			var d = [<?php echo $vals; unset($vals); ?>];
			var dt =[];
            var data= [
            	{
			data: a_a,
			label: 'Alarm Activation',
            points: { show: true }, 
		},
		{
			data: b,
			label: 'Burglary',
            points: { show: true }, 
		},
		{
			data: p_d,
			label: 'Property Damage',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: m,
			label: 'Miscellaneous`',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: s_l,
			label: 'Shoplift Loss',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: d_p,
			label: 'Disorderly Person',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: a_e,
			label: 'Accident - Employee',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
        {
			data: s_a,
			label: 'Shoplift Apprehension',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
        {
			data: f_a,
			label: 'Fraud Apprehension',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
        {
			data:a_c,
			label: 'Accident - Customer',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
        {
			data: s_r,
			label: 'Shoplift Recovery',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
        {
			data:f_r,
			label: 'Fraud Recovery',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
        {
			data: n_p_s,
			label: 'Non-Productive Stop',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
        {
			data: s_i_t,
			label: 'Suspicion Internal Theft',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
        {
			data: f_l,
			label: 'Fraud Loss',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		}
        ];
        
 var detailOptions = {            
		 series: {
			lines: { show: true, lineWidth: 2 },
			shadowSize: 1
		},
		points: { 
			show: true, 
			radius: 4, 
			fill: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},
		grid: {  
			hoverable: true,               
			
		},
		yaxis:{
			color:"#8400FF"
		},
		xaxis:{
			mode:"time",timeformat: '%y-%m-%d',
			color:"#8400FF"
		},
		selection:{
			mode: "y"
		},
         legend:{        
                noColumns: 2,
                position: 'ne',
                margin:[-400,0],
            }
};

var plotDetail = $.plot($("#incident-chart"),
	data,
	detailOptions
);
<?php    
}// Incident Rteport End
if(isset($site))
{
?>
var Post = [];
var Operational = [];
var Site_maps = [];
var Forms = [];
<?php 
            $vals = "";
			$d = "";
			foreach($site as $ke=>$data)
			{
			    $cnt[]=$data['0']['cnt'];
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['documents']['site_type'] == 'Post Orders'){?>
				    Post.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['documents']['site_type'] == 'Operational Memos')
                {                
                ?>
                    Operational.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['documents']['site_type'] == 'Site Maps')
                {                
                ?>
                    Site_maps.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['site_type'] == 'Forms')
                {                
                ?>
                    Forms.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                ?>
        
			<?php	
				if((count($site)-1)!= $ke)
				{
					$vals .= " ,";
					$d .= " ,";
				}	
			}?>
			var d = [<?php echo $vals; unset($vals); ?>];
			var dt =[];
            var data= [
		{
			data: Post,
			label: 'Post Orders',
            points: { show: true }, 
		},
		{
			data: Operational,
			label: 'Operational Memos',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Site_maps,
			label: 'Site Maps',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Forms,
			label: 'Forms',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		}];
 var detailOptions = {            
		 series: {
			lines: { show: true, lineWidth: 2 },
			shadowSize: 1
		},
		points: { 
			show: true, 
			radius: 4, 
			fill: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},
		grid: {  
			hoverable: true,               
			
		},
		yaxis:{
			color:"#8400FF"
		},
		xaxis:{
			mode:"time",timeformat: '%y-%m-%d',
			color:"#8400FF"
		},
		selection:{
			mode: "y"
		},
         legend:{        
                noColumns: 2,
                position: 'ne',
                margin:[-350,0],
            }
};
var plotDetail = $.plot($("#site-chart"),
	data,
	detailOptions
);
<?php    
}// Site Order Ends
if(isset($employee))
{
?>
var j_d = [];
var d_f_p = [];
var Schedules = [];
<?php 
            $vals = "";
			$d = "";
			foreach($employee as $ke=>$data)
			{
			    $cnt[]=$data['0']['cnt'];
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['documents']['employee_type'] == 'Job Descriptions'){?>
				    j_d.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['documents']['employee_type'] == 'Drug Free Policy')
                {                
                ?>
                    d_f_p.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['documents']['employee_type'] == 'Schedules')
                {                
                ?>
                    Schedules.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                ?>
        
			<?php	
				if((count($employee)-1)!= $ke)
				{
					$vals .= " ,";
					$d .= " ,";
				}	
			}?>
			var d = [<?php echo $vals; unset($vals); ?>];
			var dt =[];
            var data= [
		{
			data: j_d,
			label: 'Job Descriptions',
            points: { show: true }, 
		},
		{
			data: d_f_p,
			label: 'Drug Free Policy',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		},
		{
			data: Schedules,
			label: 'Schedules',
			points: { show: true }, 
			lines: { lineWidth: 2, fill: false } 	
		}];
 var detailOptions = {            
		 series: {
			lines: { show: true, lineWidth: 2 },
			shadowSize: 1
		},
		points: { 
			show: true, 
			radius: 4, 
			fill: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},
		grid: {  
			hoverable: true,               
			
		},
		yaxis:{
			color:"#8400FF"
		},
		xaxis:{
			mode:"time",timeformat: '%y-%m-%d',
			color:"#8400FF"
		},
		selection:{
			mode: "y"
		},
         legend:{        
                noColumns: 2,
                position: 'ne',
                margin:[-350,0],
            }
};
var plotDetail = $.plot($("#employee-chart"),
	data,
	detailOptions
);
<?php    
}//Employee Ends
if(isset($training))
{
?>
var health = [];

<?php 
            $vals = "";
			$d = "";
			foreach($training as $ke=>$data)
			{
			    $cnt[]=$data['0']['cnt'];
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['documents']['training_type'] == 'Health & Safety Manuals'){?>
				    health.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                ?>
        
			<?php	
				if((count($training)-1)!= $ke)
				{
					$vals .= " ,";
					$d .= " ,";
				}	
			}?>
			var d = [<?php echo $vals; unset($vals); ?>];
			var dt =[];
            var data= [
		{
			data: health,
			label: 'Health & Safety Manuals',
            points: { show: true }, 
		}];
 var detailOptions = {            
		 series: {
			lines: { show: true, lineWidth: 2 },
			shadowSize: 1
		},
		points: { 
			show: true, 
			radius: 4, 
			fill: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},
		grid: {  
			hoverable: true,               
			
		},
		yaxis:{
			color:"#8400FF"
		},
		xaxis:{
			mode:"time",timeformat: '%y-%m-%d',
			color:"#8400FF"
		},
		selection:{
			mode: "y"
		},
         legend:{        
                noColumns: 2,
                position: 'ne',
                margin:[-350,0],
            }
};
var plotDetail = $.plot($("#training-chart"),
	data,
	detailOptions
);
<?php    
}// Training Ends
?>

$('.legendLabel').each(function(){
    if($(this).text()=='Contracts')
    $(this).text('Contracts (<?php echo $contract_count;?>)');
    if($(this).text()=='Reports')
    $(this).text('Reports (<?php echo $report_count;?>)');
    if($(this).text()=='Templates')
    $(this).text('Templates (<?php echo $template_count;?>)');
    if($(this).text()=='Evidence')
    $(this).text('Evidence (<?php echo $evidence_count;?>)');
    if($(this).text()=='KPIAudits')
    $(this).text('KPIAudits (<?php echo $KPIAudits_count;?>)');
    if($(this).text()=='Training')
    $(this).text('Training (<?php echo $training_count;?>)');
    if($(this).text()=='Employee')
    $(this).text('Employee (<?php echo $employee_count;?>)');
    if($(this).text()=='Site Order')
    $(this).text('Site Order (<?php echo $siteOrder_count;?>)');
    if($(this).text()=='Client Feedback')
    $(this).text('Client Feedback (<?php echo $client_feedback_count;?>)');
    if($(this).text()=='Incident Report')
    $(this).text('Incident Report (<?php echo $incident_report_count;?>)');
    if($(this).text()=='Line Crossing Sheet')
    $(this).text('Line Crossing Sheet (<?php echo $line_crossing_sheet_count;?>)');
    if($(this).text()=='Shift Summary')
    $(this).text('Shift Summary (<?php echo $shift_summary_count;?>)');
    if($(this).text()=='Incident Video')
    $(this).text('Incident Video (<?php echo $incident_video_count;?>)');
    if($(this).text()=='Executive Summary')
    $(this).text('Executive Summary (<?php echo $executive_summary_count;?>)');        
    if($(this).text()=='Average Picket Count')
    $(this).text('Average Picket Count (<?php echo $average_picket_count;?>)');        
    if($(this).text()=='Victim Statement')
    $(this).text('Victim Statement (<?php echo $victim_statement_count;?>)');        
    if($(this).text()=='Miscellaneous')
    $(this).text('Miscellaneous (<?php echo $miscellaneous_count;?>)');        
    if($(this).text()=='Activity Log')
    $(this).text('Activity Log (<?php echo $count1;?>)');
    if($(this).text()=='Mobile Inspection')
    $(this).text('Mobile Inspection (<?php echo $count2;?>)');       
    if($(this).text()=='Mobile Security')
    $(this).text('Mobile Security (<?php echo $count3;?>)');
    if($(this).text()=='Security Occurance')
    $(this).text('Security Occurance (<?php echo $count4;?>)');
    if($(this).text()=='Sign-off Sheets')
    $(this).text('Sign-off Sheets (<?php echo $count6;?>)');
    if($(this).text()=='Incident Reports')
    $(this).text('Incident Reports (<?php echo $count5;?>)');
    if($(this).text()=='Alarm Activation')
    $(this).text('Alarm Activation (<?php echo $a_a;?>)'); 
    if($(this).text()=='Burglary')
    $(this).text('Burglary (<?php echo $burg;?>)');
    if($(this).text()=='Property Damage')
    $(this).text('Property Damage (<?php echo $prop;?>)');
    if($(this).text()=='Miscellaneous`')
    $(this).text('Miscellaneous` (<?php echo $misc;?>)');       
    if($(this).text()=='Shoplift Loss')
    $(this).text('Shoplift Loss (<?php echo $shop;?>)');        
    if($(this).text()=='Disorderly Person')
    $(this).text('Disorderly Person (<?php echo $disord;?>)');       
    if($(this).text()=='Accident - Employee')
    $(this).text('Accident - Employee (<?php echo $acc;?>)');       
    if($(this).text()=='Shoplift Apprehension')
    $(this).text('Shoplift Apprehension (<?php echo $app;?>)');        
    if($(this).text()=='Fraud Apprehension')
    $(this).text('Fraud Apprehension (<?php echo $fraud;?>)');        
    if($(this).text()=='Accident - Customer')
    $(this).text('Accident - Customer (<?php echo $acc_cust;?>)');
    if($(this).text()=='Shoplift Recovery')
    $(this).text('Shoplift Recovery (<?php echo $rec1;?>)');        
    if($(this).text()=='Fraud Recovery')
    $(this).text('Fraud Recovery (<?php echo $rec2;?>)');        
    if($(this).text()=='Non-Productive Stop')
    $(this).text('Non-Productive Stop (<?php echo $non;?>)');
    if($(this).text()=='Suspicion Internal Theft')
    $(this).text('Suspicion Internal Theft (<?php echo $susp;?>)');
    if($(this).text()=='Fraud Loss')
    $(this).text('Fraud Loss (<?php echo $loss;?>)'); 
                 
    
});
});
</script>
