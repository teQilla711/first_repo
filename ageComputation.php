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
// echo "You Are $ageInYears Years Old.";
$ageMessage = "You are $ageInYears years old.";
?>
<p><?php echo $ageMessage; ?></p>