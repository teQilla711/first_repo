<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentFeedback";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn){die("Sorry, The Database Connection Attempt Failed: " . mysqli_connect_error());}