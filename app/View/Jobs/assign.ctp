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
    foreach($job as $j)
    {
        if($job_id)
        {
        foreach($job_id as $ji)
        {
            $jo=$ji['Jobmember']['job_id'];
            $jii=explode(',',$jo);
            //var_dump($jii);
            //echo $j['Job']['id'];
            for($i=0;$i<sizeof($jii);$i++)
            {
                if($j['Job']['id']==$jii[$i])
                {
                    $checked = "checked='checked'";
                    break;
                }
                else
                $checked ="";
            }
        
        ?>
        <input type="checkbox" class="jobs" onclick="option()" name="job[]" value="<?php echo $j['Job']['id']; ?>" <?php echo $checked; ?> /> <?php echo $j['Job']['title']; ?><br />
    <?php } }
    else
    { ?>
       <input type="checkbox" class="jobs" onclick="option()" name="job[]" value="<?php echo $j['Job']['id']; ?>"  /> <?php echo $j['Job']['title']; ?><br /> 
    <?php }
    }
?>
<input type="hidden" name="job" id="job" value="" />
<input type="hidden" name="member" value="<?php echo $mem['Member']['id']; ?>" />
<div class="submit"><input type="submit" class="btn" value="Add" name="submit"/></div>
</form>