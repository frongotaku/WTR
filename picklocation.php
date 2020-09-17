<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Location point WTR</title>
    <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script src="jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- swalคือalertแบบสวยงาม -->
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <!-- <link href="bootstrap.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-select-1.13.14/dist/css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="bootstrap-select-1.13.14/dist/js/bootstrap-select.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji",
                "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #DAFAE9;
        }

        header {
            padding: 10px 10px;
            margin-bottom: 10px;
            background-color: #ABEFFA;
            border-radius: 0.3rem;
        }

        #pictureUrl {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <header>
        <div class="container" align="center">
            <h3><img src="./Photo/d93ce92db719a2a702fb1e303b7b57981283300926_large.png" alt="hamtaro" width="5%">เลือกชื่อนักศึกษาแล้วเลือกจุดหมายที่ต้องการ
                <img src="./Photo/d93ce92db719a2a702fb1e303b7b57981283300926_large.png" alt="hamtaro" width="5%"></h3>

        </div>
    </header>

    <div class="container" align="center">
        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
            <div class="container" align="center">
                <div class="row text-center">
                    <img id="pictureUrl" width="25%" />
                </div>
                <br />
                <br />
                <form method="post" id="locat" action="picklocation.php">
                    <?php
                    require "config.php";
                    $conn = new mysqli($host, $user, $password, $database);
                    mysqli_set_charset($conn, "utf8");
                    $sql1 = "SELECT * FROM heroku_ca4ecde9fd95ba6.student";
                    $result1 = mysqli_query($conn, $sql1); ?>

                    <!-- เลือกนักศึกษา -->
                    <select id="ID" name="ID" class="selectpicker" data-live-search="true" title="----- เลือก นักศึกษา -----" data-width="60%" require>
                        <?php
                        while ($row1 = mysqli_fetch_array($result1)) {
                        ?>
                            <option value="<?php echo $row1['userid']; ?>">
                                <?php echo $row1['fname']; ?><?php echo ' ' . $row1['lname']; ?>
                            </option>";
                        <?php } ?>
                    </select>


                    <br />
                    <br />
                    <?php
                    // เลือกlocation
                    $sql = "SELECT location_name FROM heroku_ca4ecde9fd95ba6.location";
                    $result = mysqli_query($conn, $sql); ?>
                    <select id="location" name="location" class="selectpicker" data-live-search="true" title="----- เลือก จุดหมาย -----" data-width="60%" require>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['location_name'] . "'>" . $row['location_name'] . "</option>";
                        }
                        echo "</select>";

                        ?>
                        <br /><br />
                        <!-- <input type="hidden" name="hidden_framework" id="hidden_framework" /> -->
                        <input type="submit" name="submit" class="btn btn-info" value="Submit" id="submit" />
                </form>
                <br />
            </div>
        </div>
        <script src="jquery.min.js"></script>
        <script src="https://static.line-scdn.net/liff/edge/versions/2.3.0/sdk.js"></script>
        <script>
            liff.init({
                    liffId: "1654474033-WpmdOQE1",
                },
                () => {
                    if (liff.isLoggedIn()) {
                        runApp();
                    } else {
                        liff.login();
                    }
                },
                (err) => console.error(err.code, error.message)
            );

            function runApp() {
                liff
                    .getProfile()
                    .then((profile) => {
                        id = profile.userId;
                        console.log(id);
                        getprofile(id);

                    })
                    .catch((err) => {
                        console.log("error", err);
                    });
            }

            function getprofile(id) {
                console.log(id);

                $.ajax({
                    url: "picklocation.php",
                    type: "POST",
                    data: {
                        userId: id,
                    },
                    success: function(result) {
                        if (result == '<br>') {
                            swal({
                                title: "คุณไม่มีสิทธิ์",
                                text: "คุณไม่สามารถเปลี่ยนสถานที่ได้",
                                icon: "Error",
                                button: "OK!",
                            }).then((value) => {
                                liff.closeWindow();
                            });
                        }
                    },
                });
            }
        </script>
        <?php
        if (isset($_POST['submit'])) {

            if (isset($_POST['userId'])) {
                $id = $_POST['userId'];
                require "config.php";

                $conn = new mysqli($host, $user, $password, $database);
                // เช็คว่าต่อติดมั้ย
                // if ($conn->connect_error) {
                //     echo "Failed to connect to MySQL: " . $conn->connect_error;
                // } else {
                //     echo "Success!!!";
                // }
                mysqli_set_charset($conn, "utf8");

                $sql = "SELECT count(*)  FROM tbl_emp where m_line = '$id'";
                $res = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($res);
                if ($data[0] != 0) {
                    update();
                }
            } else {
                echo '<br>';
            }
        }



        function update()
        {
            require "config.php";
            $conn = new mysqli($host, $user, $password, $database);
            mysqli_set_charset($conn, "utf8");

            if (isset($_POST['ID'])) {

                $id = $_POST['ID'];
            } else {
                $id = null;
            }

            if (isset($_POST['location'])) {

                $location = $_POST['location'];
            } else {
                $location = null;
            }
            if ($id != null && $location != null) {
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }


                $sqlU = "UPDATE student SET location_name='$location' WHERE userid='$id'";
                $resultU = mysqli_query($conn, $sqlU);

                if ($conn->query($sqlU) === TRUE) {
        ?>
                    <script>
                        console.log(<?php $resultU; ?>);
                        swal({
                            title: "บันทึกข้อมูลสำเร็จ",
                            text: "ต้องการใช้งานอีกรอบหรือไม่?",
                            icon: "success",
                            buttons: {
                                cancel: "No",
                                Yes: true,
                            },
                        }).then((value) => {
                            switch (value) {
                                case "Yes":
                                    window.location.reload();
                                    break;
                                default:
                                    liff.closeWindow();
                            }
                        });
                    </script>
                <?php
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else { ?>
                <Script>
                    swal({
                        title: "ไม่มีข้อมูล",
                        text: "กรุณาเลือกชื่อหรือสถานที่ด้วยครับ",
                        icon: "error",
                        button: "OK!",
                    });
                </Script>
        <?php }

            $conn->close();
            echo "<p>";
        }
        ?>

</body>

</html>