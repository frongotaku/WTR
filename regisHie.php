
<?php

if (isset($_POST['userId'])) {
    $userid = $_POST['userId'];
} else {
    $userid = null;
}
if (isset($_POST['name_title'])) {
    $name_title = $_POST['name_title'];
    // echo $week;
} else {
    $name_title = null;
}
if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
    // echo $date_work;
} else {
    $fname = null;
}
if (isset($_POST['lname'])) {
    $lname = $_POST['lname'];
    // echo $date_work;
} else {
    $lname = null;
}
if (isset($_POST['HID'])) {
    $HID = $_POST['HID'];
    // echo  $hour;
} else {
    $HID = null;
}

if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
} else {
    $gender = null;
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = null;
}
if (isset($_POST['Phone'])) {
    $Phone = $_POST['Phone'];
} else {
    $Phone = null;
}
if (isset($_POST['position'])) {
    $position = $_POST['position'];
} else {
    $position = null;
}
if (isset($_POST['level'])) {
    $level = $_POST['level'];
} else {
    $level = null;
}
$location = "Bangkok Unitrade";

if ($userid != null && $name_title != null && $lname != null && $HID != null && $fname != null) {
    require "config.php";

    $conn = new mysqli($host, $user, $password, $database);
    // เช็คว่าต่อติดมั้ย
    // if ($conn->connect_error) {
    //     echo "Failed to connect to MySQL: " . $conn->connect_error;
    // } else {
    //     echo "Success!!!";
    // }
    mysqli_set_charset($conn, "utf8");

    $sql = "SELECT count(*)  FROM tbl_emp where m_line = '$userid'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($res);
    if ($data[0] != 0) {
        $err = "คุณได้ลงทะเบียนไว้แล้ว";
    }
    if ($err != "") {
        echo 2;
    } else {
        $sql = "INSERT INTO tbl_emp (m_line,m_id,m_nameTitle,m_firstname,m_lastname,m_position,m_phone,m_email,m_level,m_datesave,location_name,)
VALUES ('$userid','$HID','$name_title', '$fname','$lname','$position','$Phone', '$email','$level','$timestamp','$location')";
        if ($conn->query($sql) === TRUE) {
            // session_destroy();
            echo 0;
?>
    <?php
            $conn->close();
        } else {
            echo "Error updating record: " . $conn->error;
        };
    }
} else {
    // session_destroy();
    echo 1;
    ?>
<?php }

// unset($_SESSION['userid']);

?>