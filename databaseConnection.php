<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first_repo";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn){die("Sorry, Database Connection Attempt Failed: " . mysqli_connect_error());}