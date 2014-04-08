<?php
include('inc.php');
?>
<h3 class="page-title">
	Personal Inspection Module
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="">Personal Inspection Module  </a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<div id="table">

<?php
if($modules)
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
                echo "<tr><td>Personal Inspection of <strong>".$m['Personal_inspection']['emp_name1']. '</strong> ('. $count.')</td><td><a href="'.$base_url.'/search/personal_inspection/'.urlencode($m['Personal_inspection']['emp_name1']).'" class="btn btn-info">View All</a></td></tr/>';
            }
        }
    }
    ?>
        </table>
    <?php
}
?>