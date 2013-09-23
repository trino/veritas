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
</style>
<div class="span6">
<div id="line-chart" class="chart-holder"></div> <!-- /#bar-chart -->
     <div id="masterContainer" style="width: 770px;height:120px;margin-top:10px;"></div>
</div>
<div style="clear:both;"></div>
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
} ?> // twitter ends
});
</script>