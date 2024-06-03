<?php
// Compute User's Age
function computeAge($dateOfBirth) {
    $timestamp = strtotime($dateOfBirth);
    $currentTimestamp = time();
    $age = $currentTimestamp - $timestamp;
    return floor($age / 31536000);
}

// Convert Date/Time from UNIX Timestamp Format to Date/Time Format
function convertTimestamp($unixTimestamp) {
    return date('Y-m-d H:i:s', $unixTimestamp);
}

// Determine if the User is an Adult or Not
function isAdult($age) {
    return $age >= 18;
}
?>
