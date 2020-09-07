<?php
require "config.php";



$userId = $_POST["userOut"];
$email = $_POST["emailOut"];
insertdb($userId, $email, $datenow);

function insertdb($userId, $email, $date)
{
    $count = 0;
    if ($count == 0) {
        // require 'database.php';
        require "config.php";

        $conn = new mysqli($host, $user, $password, $database);
        // if ($conn->connect_error) {
        //     echo "Failed to connect to MySQL: " . $conn->connect_error;
        // } else {
        //     echo "Success!!!";
        // }

        $sql = "INSERT INTO checkout (userid, email, stamptime)
VALUES ('$userId','$email','$date')";

        if ($conn->query($sql) === TRUE) {

            echo "Check-Out Success";
            echo "";
            echo  "$time";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
