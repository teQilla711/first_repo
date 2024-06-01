<!-- 1 -->
<?php
$dateOfBirth='1990-01-01';
// Converting DOB to a timestamp
$timestamp=strtotime($dateOfBirth);
$currentTimestamp=time();
//Diff btwn crntTimeStamp&&DOB
$age=$currentTimestamp - $timestamp;
// Convert the difference to years
$ageInYears=floor($age / 31536000);
echo "You Are $ageInYears Years Old.";

// 2
$unixTimestamp=1643723400;
// Convert the UNIX timestamp to a date/time format
$date=date('Y-m-d H:i:s', $unixTimestamp);
echo "The Date && Time Is: $date";

// 3
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