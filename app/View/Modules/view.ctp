<?php
include('inc.php');
?>
<script>
$(function(){
   $('#datefilter').validate(); 
});
</script>
<h3 class="page-title">
	<?php
    
  
        echo "Personal Inspection Module";
        if(isset($_GET['from'])&&$_GET['to'])
        {
            echo " <span style='font-size:17px;'>(From : ".$_GET['from']." to ".$_GET['to'].")</span>";
        }
   
    
    
    ?>
</h3>
<h3 class="" style="font-size: 19px;" ><em><strong><?php echo $count;?></strong> Result<?if($count>1)echo "s";?></em></h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>modules/view/personal_inspection"><?php echo $this->requestAction('dashboard/translate/Personal Inspection');?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<div><strong><?php echo $this->requestAction('dashboard/translate/Filter By');?></strong></div>
<form action="<?php echo $base_url;?>modules/view/personal_inspection" method="get" id="datefilter" style="float: left;margin-right:10px;">
    <input type="text" value="" name="from" placeholder="<?php echo $this->requestAction('dashboard/translate/Start Date');?>" style="width: 100px; margin-top:10px;" class="datepicker required" />
    <input type="text" value="" name="to" placeholder="<?php echo $this->requestAction('dashboard/translate/End Date');?>" style="width: 100px; margin-top: 10px;" class="datepicker required" />
     
    <input type="submit" value="<?php echo $this->requestAction('dashboard/translate/Go');?>" class="btn btn-primary" />
</form>


<div class="clear"></div>

<div id="table">

<?php
if(isset($modules))
{
    ?>
    
    <table>
        
    <?php
    foreach($modules as $a)
    {
        $count = count($a);
        $i=0;
        foreach($a as $m)
        {
            $i++;
            if($i==1)
            {
                echo "<tr><td>Personal Inspection of <strong>".$m['Personal_inspection']['emp_name1']. '</strong> ('. $count.')</td><td><a href="'.$base_url.'modules/personal_inspection/'.urlencode($m['Personal_inspection']['emp_name1']).'" class="btn btn-info">'.$this->requestAction('dashboard/translate/View All').'</a></td></tr/>';
            }
        }
    }
    ?>
        </table>
    <?php
}
?>