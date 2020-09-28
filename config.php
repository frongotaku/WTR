<?php

$host = "us-cdbr-east-02.cleardb.com";
$user = "b180ac2be6fe66";
$password = "75d06d84";
$database = "heroku_ca4ecde9fd95ba6";
$conn = new mysqli($host, $user, $password, $database);
mysqli_set_charset($conn, "utf8");
date_default_timezone_set("Asia/Bangkok");
$timestamp = date("j/n/Y G:i");
$datenow =  date("Y-m-d");
$timenow = date("H:i:s");
