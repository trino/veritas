<?php include_once('inc.php');?>

<h3 class="page-title">
	<?php echo $this->requestAction('dashboard/translate/Deployment Rate');?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs"><?php echo $this->requestAction('dashboard/translate/Job Manager');?></a> <span class="icon-angle-right"></span>
	    <a href="<?=$base_url;?>uploads/deployment_rate"><?php echo $this->requestAction('dashboard/translate/Deployment Rate');?></a>
    </li>
</ul>
<form action="" method="post">
<table class="table">
<input type="hidden" name="job_id" value="<?php echo $jid;?>"/>
    <tr><td>&nbsp;</td><td><strong>Bill Rate/Hr</strong></td><td><strong>Travel</strong></td></tr>
    <tr><td>Security Guard</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityguard_hr'];?>" name="securityguard_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityguard_travel'];?>" name="securityguard_travel" /></td></tr>
    <tr><td>Private Investigator</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['privateinvestigator_hr'];?>" name="privateinvestigator_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['privateinvestigator_travel'];?>" name="privateinvestigator_travel" /></td></tr>
    <tr><td>Evidence Handler</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['evidencehandler_hr'];?>" name="evidencehandler_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['evidencehandler_travel'];?>" name="evidencehandler_travel" /></td></tr>
    <tr><td>Supervisor</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['supervisor_hr'];?>" name="supervisor_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['supervisor_travel'];?>" name="supervisor_travel" /></td></tr>
    <tr><td>Coordinator</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coordinator_hr'];?>" name="coordinator_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coordinator_travel'];?>" name="coordinator_travel" /></td></tr>
    <tr><td>Executive Protection</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['executiveprotection_hr'];?>" name="executiveprotection_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['executiveprotection_travel'];?>" name="executiveprotection_travel" /></td></tr>
    <tr><td>Van Driver</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['vandriver_hr'];?>" name="vandriver_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['vandriver_travel'];?>" name="vandriver_travel" /></td></tr>
    <tr><td>15 Passenger Van Driver</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['15passengervandriver_hr'];?>" name="15passengervandriver_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['15passengervandriver_travel'];?>" name="15passengervandriver_travel" /></td></tr>
    <tr><td>Truck Driver</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['truckdriver_hr'];?>" name="truckdriver_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['truckdriver_travel'];?>" name="truckdriver_travel" /></td></tr>
    <tr><td>School Bus Driver</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['schoolbusdriver_hr'];?>" name="schoolbusdriver_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['schoolbusdriver_travel'];?>" name="schoolbusdriver_travel" /></td></tr>
    <tr><td>Coach Bus Driver</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coachbusdriver_hr'];?>" name="coachbusdriver_hr" /></td>
        <td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coachbusdriver_travel'];?>" name="coachbusdriver_travel" /></td></tr>
    <tr><td colspan="3"><strong>Misc.</strong></td></tr>
    <tr><td>&nbsp;</td><td><strong>Bill Rate/Day</strong></td><td>&nbsp;</td></tr>
    <tr><td>Radio</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['radio_day'];?>" name="radio_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Internet Stick</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['internetstick_day'];?>" name="internetstick_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Meal Perdiems</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['mealperdiems_day'];?>" name="mealperdiems_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Tapes</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['tapes_day'];?>" name="tapes_day" /></td><td>&nbsp;</td></tr>
    <tr><td>SD Card</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['sdcard_day'];?>" name="sdcard_day" /></td><td>&nbsp;</td></tr>
    <tr><td>DVD</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['dvd_day'];?>" name="dvd_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Security Vehicles Regular</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityvehicleregular_day'];?>" name="securityvehicleregular_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Security Vehicles Large</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['securityvehiclelarge_day'];?>" name="securityvehiclelarge_day" /></td><td>&nbsp;</td></tr>
    <tr><td>15 Passenger Van</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['15passengervan_day'];?>" name="15passengervan_day" /></td><td>&nbsp;</td></tr>
    <tr><td>School Bus</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['schoolbus_day'];?>" name="schoolbus_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Coach Bus</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['coachbus_day'];?>" name="coachbus_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Transport Truck</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['transporttruck_day'];?>" name="transporttruck_day" /></td><td>&nbsp;</td></tr>
    <tr><td colspan="3"><strong>Misc.</strong></td></tr>
    <tr><td>Hotel Cost</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['hotelcost_day'];?>" name="hotelcost_day" /></td><td>&nbsp;</td></tr>
    <tr><td>Admin</td><td><input type="text" value="<?php if(isset($rate['DeploymentRate']))echo $rate['DeploymentRate']['admin'];?>" name="admin" /><strong>%</strong></td><td>&nbsp;</td></tr>
    <tr></tr>
    <tr><td></td><td colspan=" 2"><input type="submit" name="submit" class="btn btn-primary" value="submit"/></td></tr>
</table>
</form>