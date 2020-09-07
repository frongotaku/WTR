
<?php
// เอาไว้เสิชว่าจุดหมายที่ต้องไปคือที่่ไหน
if (isset($_POST["usermId"])) {
  include('config.php');
  include('condb.php');

  // include('profile.php');
  $userId = $_POST["usermId"];

  $sql = "SELECT * FROM tbl_emp WHERE m_line='$userId' ";

  // echo ""
  $result = mysqli_query($condb, $sql);
  $rowm = mysqli_fetch_array($result);
  $point = $rowm['location_name'];

  $sql1 = "select  e.m_line, l.longitude,l.latitude from location l , tbl_emp e where  e.m_line = '$userId' and l.location_name = '$point' ";
  $result1 = mysqli_query($condb, $sql1);
  $rowm1 = mysqli_fetch_array($result1);
  $endpoint = "จุดหมาย : " . $point;
  $lat = $rowm1['latitude'];
  $lng = $rowm1['longitude'];
  echo "$endpoint,$point, $lat,$lng";
}
