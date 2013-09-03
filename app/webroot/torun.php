<?php

mysql_connect("localhost","root","");
mysql_select_db("veritas");
$q = mysql_query("SELECT * FROM documents");
while($row = mysql_fetch_assoc($q))
{
    if($row['title'] == 'Evidence')
    $indate = $row['incident_date'];
    else
    $indate = $row['date'];
    mysql_query("Update documents SET indate = '$indate' WHERE id=".$row['id']);
}

?>