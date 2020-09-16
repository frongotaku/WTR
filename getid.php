<?php
include ("test.php");
session_start();
ob_start();
$userid = $_POST['userId'];
$_SESSION['userid'] = $userid;
