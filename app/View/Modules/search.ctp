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
<h3 class="" style="font-size: 19px;" ><em><strong><?php echo $count;?></strong> Result<?php if($count>1)echo "s";?></em></h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>modules/personal_inspection/<?php echo $title;?>"><?php echo $this->requestAction('dashboard/translate/Personal Inspection');?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<div><strong><?php echo $this->requestAction('dashboard/translate/Filter By');?></strong></div>
<form action="<?php echo $base_url;?>modules/personal_inspection/<?php echo $title;?>" method="get" id="datefilter" style="float: left;margin-right:10px;">
    <input type="text" value="" name="from" placeholder="<?php echo $this->requestAction('dashboard/translate/Start Date');?>" style="width: 100px; margin-top:10px;" class="datepicker required" />
    <input type="text" value="" name="to" placeholder="<?php echo $this->requestAction('dashboard/translate/End Date');?>" style="width: 100px; margin-top: 10px;" class="datepicker required" />
     
    <input type="submit" value="<?php echo $this->requestAction('dashboard/translate/Go');?>" class="btn btn-primary" />
</form>


<div class="clear"></div>
<table class="table">
<thead>
    <th><?php echo $this->Paginator->sort('emp_name1',$this->requestAction('dashboard/translate/Name'));?></th>
    <th><?php echo $this->Paginator->sort('jobs_title',$this->requestAction('dashboard/translate/Job Title'));?></th>
    <th><?php echo $this->Paginator->sort('site',$this->requestAction('dashboard/translate/Site'));?></th>
    <th><?php echo $this->Paginator->sort('overall_rating',$this->requestAction('dashboard/translate/Overall Rating'));?></th>
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
        <td><a href="<?php echo $base_url;?>uploads/view_detail/<?php echo $d['PersonalInspection']['document_id'];?>" class="btn btn-primary"><?php echo $this->requestAction('dashboard/translate/View');?></a></td>
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
