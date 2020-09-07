<!-- Insert Report -->
<?php

// if (isset($_POST['submit'])) {

// insertdb($id, $week, $date_work, $hour, $Description, $knowledge, $problem);
//   insertdb();
// }
if (isset($_POST['userIn'])) {
    $id = $_POST['userIn'];
    echo $id;
} else {
    $id = null;
}

if (isset($_POST['week'])) {
    $week = $_POST['week'];
    echo $week;
} else {
    $week = null;
}
if (isset($_POST['date_work'])) {
    $date_work = $_POST['date_work'];
    echo $date_work;
} else {
    $date_work = null;
}
if (isset($_POST['hour'])) {
    $hour = $_POST['hour'];
    echo  $hour;
} else {
    $hour = null;
}
if (isset($_POST['description'])) {
    $Description = $_POST['description'];
    echo $Description;
} else {
    $Description = null;
}
if (isset($_POST['knowledge'])) {
    $knowledge = $_POST['knowledge'];
} else {
    $knowledge = null;
}
if (isset($_POST['problem'])) {
    $problem = $_POST['problem'];
} else {
    $problem = null;
}
// echo $id;
// require 'database.php';
if ($id != null && $week != null &&  $date_work != null &&  $hour != null && $Description != null) {
    require "config.php";

    $conn = new mysqli($host, $user, $password, $database);
    // เช็คว่าต่อติดมั้ย
    // if ($conn->connect_error) {
    //     echo "Failed to connect to MySQL: " . $conn->connect_error;
    // } else {
    //     echo "Success!!!";
    // }

    $sql = "INSERT INTO report (userid,week,hour,date_work,Description_work,Knowledge,Problem)
VALUES ('$id','$week', '$hour','$date_work', '$Description', '$knowledge', '$problem')";

    $resultU = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        echo "Success!!!";
?>
        <!-- <script>
        console.log (<?php// $result; ?>);
       // swal({
          title: "บันทึกข้อมูลเรียบร้อยแล้ว",
          text: "",
          icon: "success",
          button: "Yeah!",
       // })
      </script> -->

    <?php
        $conn->close();
    } else {
        echo "Error updating record: " . $conn->error;
    };
} else { ?>
    <!-- <Script> -->
    <!-- swal({ -->
    <!-- title: "ไม่มีข้อมูล",
        text: "กรุณากรอกข้อมูลด้วยครับ",
        icon: "error",
        button: "OK!", -->
    <!-- }); -->
    <!-- </Script> -->
<?php }
?>