
<?php

if (isset($_POST['userId'])) {
    $userid = $_POST['userId'];
} else {
    $userid = null;
}
if (isset($_POST['week'])) {
    $week = $_POST['week'];
    // echo $week;
} else {
    $week = null;
}
if (isset($_POST['date'])) {
    $date_work = $_POST['date'];
    // echo $date_work;
} else {
    $date_work = null;
}
if (isset($_POST['hour'])) {
    $hour = $_POST['hour'];
    // echo  $hour;
} else {
    $hour = null;
}
if (isset($_POST['description'])) {
    $Description = $_POST['description'];
    // echo $Description;
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
$status = 0;
// echo $id;
// require 'database.php';
if ($userid != null && $week != null && $date_work != null && $hour != null && $Description != null) {
    require "config.php";

    $conn = new mysqli($host, $user, $password, $database);
    // เช็คว่าต่อติดมั้ย
    // if ($conn->connect_error) {
    //     echo "Failed to connect to MySQL: " . $conn->connect_error;
    // } else {
    //     echo "Success!!!";
    // }
    mysqli_set_charset($conn, "utf8");


    $sql = "SELECT count(*)  FROM student where userid = '$userid'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($res);

    if ($data[0] == 0) {
        echo 3;
    } else {
        $sql = "SELECT count(*)  FROM report where date_work = '$date_work'";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($res);

        if ($data[0] != 0) {
            echo 2;
        } else {

            $sql = "INSERT INTO report (userid,weeks,hour,date_work,Description_work,Knowledge,Problem,TimeStamp,progress)
VALUES ('$userid','$week', '$hour','$date_work', '$Description', '$knowledge', '$problem','$timestamp','$status')";

            // $resultU = mysqli_query($conn, $sql);

            if ($conn->query($sql) === TRUE) {
                // session_destroy();
                echo 0;

                $conn->close();
            } else {
                echo "Error updating record: " . $conn->error;
            };
        }
    }
} else {
    // session_destroy();
    echo 1;
?>
<?php }
// unset($_SESSION['userid']);

?>