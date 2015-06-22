<?php 
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=document_name.doc");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo $this->fetch('content');
echo "</body>";
echo "</html>"
?>
