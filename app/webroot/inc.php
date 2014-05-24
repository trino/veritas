<?php
if($_SERVER['SERVER_NAME']=='localhost' )
    $base_url = "http://localhost/veritas/";
elseif($_SERVER['SERVER_NAME']='192.168.1.100')
    $base_url = "http://192.168.1.100/veritas/";
else
    $base_url ="http://bigcitymovers.ca/";
    include_once('functions.php');
?>
