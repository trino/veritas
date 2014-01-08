<?php 
function generate_hash($toHash, $date, $salt = 'B%^%AS$DA$^FB%B&&b787_+:&@B1!@~542n76d&%b8(%9b$B%3+_+_{}{)_*8b6B&%v') {

// split password;
$password = str_split($toHash, ((strlen($toHash)/2) + 1));

// create hash using hash() and sha256;
$hash = hash('sha256', $date . $password[0] . $salt . $password[1]);

// cut string to 32 chars; looks like md5();
$hash = substr($hash, 0, 32);

return $hash;
}
?>

<div id="home">
<h2><?="Welcome to your AFIMAC Training Resources!";?></h2>
<p><?php echo "The following are your complimentary AFIMAC Training Reasources."."<br />";

$token = generate_hash('_IMaC_TRAiNiNG_', date('Y-m-d:H')) .'_79';

echo "<li><b>".("<a href=http://www.imac-training.com/training/Veritas/IMAC0006/main.php?token=" . $token . " target=\"_blank\">" . ("Strike Preparation and Contingency Planning") . "</a>")."</b></li>"."</ul>";
echo "<li><b>".("<a href=http://www.imac-training.com/training/Veritas/IMAC0069/main.php?token=" . $token . " target=\"_blank\">" . ("Picket Line Security and Evidence Gathering During a Strike") . "</a>")."</b></li>"."</ul>";
echo "<li><b>".("<a href=http://imimac01.securehttp.internapcdn.net/secure_imimac01/Mgmt_Trng/2009_Mgt_Training_Presentation.ppt?token=" . $token . " target=\"_blank\">" . ("Management Training Powerpoint") . "</a>")."</b></li>"."</ul>";
?>
</div>