<?php
if($type=='personal_inspection')
include('personal_inspection.php');
if($type=='vehicle_inspection')
include('vehicle_inspection.php');  
if($type=='mobile_inspection')
include('mobile_inspection.php');
if($type=='mobile_log')
include('mobile_log.php');
if($type=='mobile_vehicle_trunk_inventory')
include('inventory.php');

?>