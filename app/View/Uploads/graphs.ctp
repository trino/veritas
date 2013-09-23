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
.chart-holder {
    height: 325px;
    width: 150%;
}
@media print {
  body * {
    visibility:hidden;
  }
  #toprint {
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
<?php if(isset($all)){?>
<div class="span6">
<h3>Analytic Graph</h3>
    <hr />
    <div id="line-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<?php }?>
<?php if(isset($evidence)){?>
<div style="clear:both;"></div>
<div class="span6">
<h3>Evidence Graph</h3>
    <hr />
    <div id="evidence-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<?php }?>
<?php if(isset($report)){?>
<div style="clear:both;"></div>
<div class="span6">
<h3>Reports Graph</h3>
    <hr />
    <div id="report-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<?php }?>
<?php if(isset($incident)){?>
<div style="clear:both;"></div>
<div class="span6">
<h3>Incident Report Graph</h3>
    <hr />
    <div id="incident-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<?php }?>
<?php if(isset($site)){?>
<div style="clear:both;"></div>
<div class="span6">
<h3>Site Orders Graph</h3>
    <hr />
    <div id="site-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<?php }?>
<?php if(isset($employee)){?>
<div style="clear:both;"></div>
<div class="span6">
<h3>Employee Graph</h3>
    <hr />
    <div id="employee-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
<?php }?>
<?php if(isset($training)){?>
<div style="clear:both;"></div>
<div class="span6">
<h3>Training Graph</h3>
    <hr />
    <div id="training-chart" class="chart-holder"></div> <!-- /#bar-chart -->
   
</div>
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
			foreach($all as $ke=>$data)
			{
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['documents']['document_type'] == 'contract'){?>
				    contract.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['documents']['document_type'] == 'report')
                {                
                ?>
                    report.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'evidence')
                {                
                ?>
                    evidence.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['documents']['document_type'] == 'template')
                {                
                ?>
                    template.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'siteOrder')
                {                
                ?>
                    siteOrder.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'KPIAudits')
                {                
                ?>
                    KPIAudits.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'training')
                {                
                ?>
                    training.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'employee')
                {                
                ?>
                    employee.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['document_type'] == 'client_feedback')
                {                
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
			foreach($evidence as $ke=>$data)
			{
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['documents']['evidence_type'] == 'Incident Report'){?>
				    Incident.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['documents']['evidence_type'] == 'Line Crossing Sheet')
                {                
                ?>
                    Line.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Shift Summary')
                {                
                ?>
                    Video.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['documents']['evidence_type'] == 'Incident Video')
                {                
                ?>
                    Shift.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Executive Summary')
                {                
                ?>
                    Executive.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Average Picket Count')
                {                
                ?>
                    Average.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Victim Statement')
                {                
                ?>
                    Victim.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['documents']['evidence_type'] == 'Miscellaneous')
                {                
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
                margin:[-350,0],
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
			foreach($report as $ke=>$data)
			{
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['activities']['report_type'] == '1'){?>
				    Activity.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['activities']['report_type'] == '2')
                {                
                ?>
                    Inspection.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['report_type'] == '3')
                {                
                ?>
                    Security.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['activities']['report_type'] == '4')
                {                
                ?>
                    Occurance.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['report_type'] == '5')
                {                
                ?>
                    incident_report.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['report_type'] == '6')
                {                
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
			label: 'Incident Report',
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
			foreach($incident as $ke=>$data)
			{
                
				$vals .= $data['0']['cnt'];
				$d .= $data['0']['DateOnly'];
                if($data['activities']['incident_type'] == 'Burglary'){?>
				    b.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php 
                }
                elseif($data['activities']['incident_type'] == 'Property Damage')
                {                
                ?>
                    p_d.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Miscellaneous')
                {                
                ?>
                    m.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                
                elseif($data['activities']['incident_type'] == 'Shoplift Loss')
                {                
                ?>
                    s_l.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Disorderly Person')
                {                
                ?>
                    d_p.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Accident - Employee')
                {                
                ?>
                    a_e.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Shoplift Apprehension')
                {                
                ?>
                    s_a.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Fraud Apprehension')
                {                
                ?>
                    f_a.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Accident - Customer')
                {                
                ?>
                    a_c.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Shoplift Recovery')
                {                
                ?>
                    s_r.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }                
                elseif($data['activities']['incident_type'] == 'Fraud Recovery')
                {                
                ?>
                    f_r.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Non-Productive Stop')
                {                
                ?>
                    n_p_s.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Suspicion Internal Theft')
                {                
                ?>
                    s_i_t.push([<?php echo strtotime($data['0']['DateOnly'])*1000; ?><?php echo ", ".$data['0']['cnt'];?>]);
				<?php
                }
                elseif($data['activities']['incident_type'] == 'Fraud Loss')
                {                
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
			label: 'Miscellaneous',
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
});
</script>
</div>
<input type="button" onclick="window.print();" value="Print" class="btn btn-primary" style="margin-top: 10px;" />