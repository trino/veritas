<?php include_once('inc.php');?>

<h3 class="page-title">
	Assign Job to <?php echo $mem['Member']['full_name']; ?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs">Job Manager</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs/assign/<?php echo $mem['Member']['id']; ?>">Assign Job to <?php echo $mem['Member']['full_name']; ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>

<script type="text/javascript">
$(function(){
   $('.jobs').each(function(){
    var vals = $(this).val();
    if($(this).is(':checked'))
    {
        if($('#job').val() == '')
        {
            $('#job').val(vals);
        }
        else
        $('#job').val($('#job').val()+','+vals);
    }
   }); 
});
function option()
{
    var value="";
    $('.jobs:checked').each(function(){
         //alert($(this).val());
         if(value=="")
         {
            value=$(this).val();
         }
         else
         value=value+','+$(this).val();
         
    });
    //alert(value);
    $('#job').val(value);
}

</script>

<h2>Assign Job To <?php echo $mem['Member']['full_name']; ?></h2>
<?php //var_dump($job_id); ?>
<form action="" method="post" onsubmit="return check()">
<?php 
$arrs = array();
    if($job_id)
        {
            //var_dump($ji);
            $jos = $job_id['Jobmember']['job_id'];
            $jos_array = explode(',',$jos);
            foreach($jos_array as $jost){
            $arrs[] = $jost;             
            }
        
        }
    foreach($job as $j)
    {
       
         
    ?>
    <input type="checkbox" class="jobs" onclick="option()" name="job[]" value="<?php echo $j['Job']['id']; ?>" <?php if(in_array($j['Job']['id'],$arrs)){echo "checked='checked'";} ?> /> <?php echo $j['Job']['title']; ?><br />
    <?php
    }
?>
<input type="hidden" name="job" id="job" value="" />
<input type="hidden" name="member" value="<?php echo $mem['Member']['id']; ?>" />
<div class="submit"><input type="submit" class="btn" value="Add" name="submit"/></div>
</form>