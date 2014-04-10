<?php include_once('inc.php');?>
<script>
$(function(){
   $('#datefilter').validate(); 
});
</script>
<h3 class="page-title">
	<?php
    
    if(isset($_GET['search']) && $_GET['search'])
    {
        echo "Result for : ".$_GET['search'];
        if(isset($_GET['from'])&&$_GET['to'])
        {
            echo " <span style='font-size:17px;'>(From : ".$_GET['from']." to ".$_GET['to'].")</span>";
        }
    } 
    else
    {
        echo "All Personal Inspection of ".$title;;
        if(isset($_GET['from'])&&$_GET['to'])
        {
            echo " <span style='font-size:17px;'>(From : ".$_GET['from']." to ".$_GET['to'].")</span>";
        }
    }
    
    
    ?>
</h3>
<h3 class="" style="font-size: 19px;" ><em><strong><?php echo $count;?></strong> Result<?php if($count>1)echo "s";?> found</em></h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>modules/personal_inspection/<?php echo $title;?>">Personal Inspection</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<div><strong>Filter By</strong></div>
<form action="<?php echo $base_url;?>modules/personal_inspection/<?php echo $title;?>" method="get" id="datefilter" style="float: left;margin-right:10px;">
    <input type="text" value="" name="from" placeholder="Start Date" style="width: 100px; margin-top:10px;" class="datepicker required" />
    <input type="text" value="" name="to" placeholder="End Date" style="width: 100px; margin-top: 10px;" class="datepicker required" />
     
    <input type="submit" value="Go" class="btn btn-primary" />
</form>


<div class="clear"></div>
<table class="table">
<thead>
    <th><?php echo $this->Paginator->sort('emp_name1','Name');?></th>
    <th><?php echo $this->Paginator->sort('jobs_title','Job Title');?></th>
    <th><?php echo $this->Paginator->sort('site','Site');?></th>
    <th><?php echo $this->Paginator->sort('overall_rating','Overall Rating');?></th>
    <th><?php echo $this->Paginator->sort('date_submit','Date');?></th>
    <th>Option</th>
</thead>
<?php foreach($docs as $d)
{?>
    <tr>
        <td><?php echo $d['PersonalInspection']['emp_name1'];?></td>
        <td><?php echo $d['PersonalInspection']['jobs_title'];?></td>
        <td><?php echo $d['PersonalInspection']['site'];?></td>
        <td><?php echo $d['PersonalInspection']['overall_rating'];?></td>
        <td><?php echo $d['PersonalInspection']['date_submit'];?></td>
        <td><a href="<?php echo $base_url;?>uploads/view_detail/<?php echo $d['PersonalInspection']['document_id'];?>" class="btn btn-primary">View</a></td>
    </tr>
<?php }?>
</table>

<div class="pagination2">
<ul>
<?php echo $this->Paginator->prev('«', array('tag' => 'li')); ?>
<?php echo str_replace(" | ","",$this->Paginator->numbers(array('tag' => 'li'))); ?>
<?php echo $this->Paginator->next('»', array('tag' => 'li')); ?>
</ul>
</div>
<?php
