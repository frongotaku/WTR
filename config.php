<?php

$host = "";
$user = "";
$password = "";
$database = "";
$conn = new mysqli($host, $user, $password, $database);
mysqli_set_charset($conn, "utf8");
date_default_timezone_set("Asia/Bangkok");
$timestamp = date("j/n/Y G:i");
$datenow =  date("Y-m-d");
$timenow = date("H:i:s");
