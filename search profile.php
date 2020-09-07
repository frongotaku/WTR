<?php
// เอาไอดีไปเสิชโปรไฟล์
if (isset($_POST["usermId"])) {
  include('config.php');
  include('condb.php');

  // include('profile.php');
  $userId = $_POST["usermId"];
  // $m_line = "Uc7026ba61505c5e3ae2877cbda30e3a0";
  $sql = "SELECT * FROM tbl_emp WHERE m_line='$userId' ";
  // echo ""
  $result = mysqli_query($condb, $sql);
  $rowm = mysqli_fetch_array($result);

  $name = $rowm['m_nameTitle'] . " " . $rowm['m_firstname'] . ' ' . $rowm['m_lastname'];
  $position = $rowm['m_position'];
  $level = $rowm['m_level'];
  echo "$name,$position,$level";
}
