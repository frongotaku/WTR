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
if (isset($_POST['SID'])) {
    $SID = $_POST['SID'];
    // echo  $hour;
} else {
    $SID = null;
}
if (isset($_POST['faculty'])) {
    $faculty = $_POST['faculty'];
    // echo $Description;
} else {
    $faculty = null;
}
if (isset($_POST['field'])) {
    $field = $_POST['field'];
} else {
    $field = null;
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
if (isset($_POST['SPhone'])) {
    $SPhone = $_POST['SPhone'];
} else {
    $SPhone = null;
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

if (isset($_POST['value'])) {
    $OTP = $_POST['value'];
} else {
    $OTP = null;
}
$location = 'Bangkok Unitrade';

if ($OTP != 'BUC1266') {
    // ป้องกันการคนนอกสมัครใช้งาน
    echo 3;
} else {
    if ($userid != null && $name_title != null && $lname != null && $SID != null && $fname != null) {
        require "config.php";

        $conn = new mysqli($host, $user, $password, $database);

        mysqli_set_charset($conn, "utf8");

        $sql = "SELECT count(*)  FROM student where userid = '$userid'";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($res);
        if ($data[0] == 0) {
            echo 2;
        } else {
            $sql = "UPDATE student SET userid='$userid',stuid='$SID',name_title='$name_title',fname='$fname',lname='$lname',faculty='$faculty',field='$field',semail='$email',sphone='$SPhone',sposition='$position',level='$level',location_name='$location' WHERE userid='$userid'";
            if ($conn->query($sql) === TRUE) {
                echo 0;
?>
        <?php
                $conn->close();
            } else {
                echo "Error updating record: " . $conn->error;
            };
        }
    } else {
        echo 1;
        ?>
<?php }
}
?>