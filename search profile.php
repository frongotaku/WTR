<?php
// เอาไอดีไปเสิชโปรไฟล์
if (isset($_POST["usermId"])) {
  include('config.php');
  include('condb.php');

  // include('profile.php');
  $userId = $_POST["usermId"];
  // $userid = "Uc7026ba61505c5e3ae2877cbda30e3a0";
  $sql = "SELECT * FROM student WHERE userid='$userId' ";
  // echo ""
  $result = mysqli_query($condb, $sql);
  $rowm = mysqli_fetch_array($result);

  $name = $rowm['name_title'] . " " . $rowm['fname'] . ' ' . $rowm['lname'];
  $position = $rowm['sposition'];
  $level = $rowm['level'];
  echo "$name,$position,$level";
}
