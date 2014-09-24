<?php include_once('inc.php');?>

<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Add Deployment Rate For')." ". $jname;?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs"><?php echo $this->requestAction('dashboard/translate/Job Manager');?></a> <span class="icon-angle-right"></span>
	    <a href="<?=$base_url;?>uploads/deployment_rate/<?php echo $jid;?>"><?php echo $this->requestAction('dashboard/translate/Add Deployment Rate For')." ". $jname;?></a>
    </li>
</ul>
<form action="" method="post">
<table class="mar">
<input type="hidden" name="job_id" value="<?php echo $jid;?>"/>
    <tr><td>&nbsp;</td><td><strong>Bill Rate/Hr</strong></td><td><strong>Holiday Bill Rate/Hr</strong></td><td><strong>Travel</strong></td></tr>
    <tr><td>Security Guard</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityguard_hr'];else echo "0"?>" name="securityguard_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityguard_hr_holiday'];else echo "0"?>" name="securityguard_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityguard_travel'];else echo "0"?>" name="securityguard_travel" /></td></tr>
    <tr><td>Private Investigator</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['privateinvestigator_hr'];else echo "0"?>" name="privateinvestigator_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['privateinvestigator_hr_holiday'];else echo "0"?>" name="privateinvestigator_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['privateinvestigator_travel'];else echo "0"?>" name="privateinvestigator_travel" /></td></tr>
    <tr><td>Evidence Handler</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['evidencehandler_hr'];else echo "0"?>" name="evidencehandler_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['evidencehandler_hr_holiday'];else echo "0"?>" name="evidencehandler_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['evidencehandler_travel'];else echo "0"?>" name="evidencehandler_travel" /></td></tr>
    <tr><td>Supervisor</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['supervisor_hr'];else echo "0"?>" name="supervisor_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['supervisor_hr_holiday'];else echo "0"?>" name="supervisor_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['supervisor_travel'];else echo "0"?>" name="supervisor_travel" /></td></tr>
    <tr><td>Coordinator</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coordinator_hr'];else echo "0"?>" name="coordinator_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coordinator_hr_holiday'];else echo "0"?>" name="coordinator_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coordinator_travel'];else echo "0"?>" name="coordinator_travel" /></td></tr>
    <tr><td>Executive Protection</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['executiveprotection_hr'];else echo "0"?>" name="executiveprotection_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['executiveprotection_hr_holiday'];else echo "0"?>" name="executiveprotection_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['executiveprotection_travel'];else echo "0"?>" name="executiveprotection_travel" /></td></tr>
    <tr><td>Van Driver</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['vandriver_hr'];else echo "0"?>" name="vandriver_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['vandriver_hr_holiday'];else echo "0"?>" name="vandriver_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['vandriver_travel'];else echo "0"?>" name="vandriver_travel" /></td></tr>
    <tr><td>15 Passenger Van Driver</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['15passengervandriver_hr'];else echo "0"?>" name="15passengervandriver_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['15passengervandriver_hr_holiday'];else echo "0"?>" name="15passengervandriver_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['15passengervandriver_travel'];else echo "0"?>" name="15passengervandriver_travel" /></td></tr>
    <tr><td>Truck Driver</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['truckdriver_hr'];else echo "0"?>" name="truckdriver_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['truckdriver_hr_holiday'];else echo "0"?>" name="truckdriver_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['truckdriver_travel'];else echo "0"?>" name="truckdriver_travel" /></td></tr>
    <tr><td>School Bus Driver</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['schoolbusdriver_hr']; else echo "0";?>" name="schoolbusdriver_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['schoolbusdriver_hr_holiday'];else echo "0"?>" name="schoolbusdriver_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['schoolbusdriver_travel'];else echo "0"?>" name="schoolbusdriver_travel" /></td></tr>
    <tr><td>Coach Bus Driver</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coachbusdriver_hr'];else echo "0"?>" name="coachbusdriver_hr" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coachbusdriver_hr_holiday'];else echo "0"?>" name="coachbusdriver_hr_holiday" /></td>
        <td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coachbusdriver_travel'];else echo "0"?>" name="coachbusdriver_travel" /></td></tr>
    <!--<tr><td colspan="3"><strong>Misc.</strong></td></tr>-->
    <tr><td>&nbsp;</td><td><strong>Bill Rate/Day</strong></td><td>&nbsp;</td></tr>
    <tr><td>Radio</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['radio_day'];else echo "0"?>" name="radio_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Internet Stick</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['internetstick_day'];else echo "0"?>" name="internetstick_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Meal Per Diems</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['mealperdiems_day'];else echo "0"?>" name="mealperdiems_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Tapes</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['tapes_day'];else echo "0"?>" name="tapes_day" /></td><td>&nbsp;</td></tr>
    <tr><td>SD Card</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['sdcard_day'];else echo "0"?>" name="sdcard_day" /></td><td>&nbsp;</td></tr>
    <tr><td>DVD</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['dvd_day'];else echo "0"?>" name="dvd_day" /></td><td>&nbsp;</td></tr>
    
    <tr><td>Air Fair</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['air_fair_day'];else echo "0"?>" name="air_fair_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Security Vehicles Regular</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityvehicleregular_day'];else echo "0"?>" name="securityvehicleregular_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Security Vehicles Large</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityvehiclelarge_day'];else echo "0"?>" name="securityvehiclelarge_day" /></td><td>&nbsp;</td></tr>
    <tr><td>15 Passenger Van</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['15passengervan_day'];else echo "0"?>" name="15passengervan_day" /></td><td>&nbsp;</td></tr>
    <tr><td>School Bus</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['schoolbus_day'];else echo "0"?>" name="schoolbus_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Coach Bus</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coachbus_day'];else echo "0"?>" name="coachbus_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Transport Truck</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['transporttruck_day'];else echo "0"?>" name="transporttruck_day" /></td><td>&nbsp;</td></tr>
    <!--<tr><td colspan="3"><strong>Misc.</strong></td></tr>-->
    <tr><td>Hotel Cost</td><td>$&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['hotelcost_day'];else echo "0"?>" name="hotelcost_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Admin</td><td>&nbsp;&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['admin'];else echo "0"?>" name="admin" /><strong>&nbsp;%</strong></td><td>&nbsp;</td></tr>
    <tr><td>Tax</td><td>&nbsp;&nbsp;<input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['tax'];else echo "0"?>" name="tax" /><strong>&nbsp;%</strong></td><td>&nbsp;</td></tr>
    <tr></tr>
    <tr><td></td><td colspan=" 2"><input type="submit" name="submit" class="btn btn-primary" value="submit"/></td></tr>
</table>
</form>
<style>
.mar input {margin:0 !important; width:100px!important}
.mar {width:60%}
</style>