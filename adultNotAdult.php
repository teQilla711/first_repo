<?php
$age=18;
$currentYear=date('Y');
$birthYear=$currentYear - $age;
$dateOfBirth='2001-09-03';
$timestamp=strtotime($dateOfBirth);
// Getting current timestamp
$currentTimestamp=time();
$age=$currentTimestamp - $timestamp;
$ageInYears=floor($age / 31536000);
if($ageInYears >= $age){echo "You Are An Adult.";}
else{echo "You Are Not Yet An Adult.";}
?>
?>