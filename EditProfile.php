<?php
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];
    echo $userId;

    // เชื่อมเบสเพื่อเข้าถึงข้อมูลบุคคล
    include('config.php');
    include('condb.php');
    // $userId = 'Uc7026ba61505c5e3ae2877cbda30e3a0';
    $sql = "SELECT * FROM student where userid = '$userId'";
    $res = mysqli_query($condb, $sql);
    $data = mysqli_fetch_array($res);

    $name = $data['name_title'] . " " . $data['fname'] . ' ' . $data['lname'];
    $StudentID = $data['stuid'];
    $faculty = $data['faculty'];
    $field = $data['field'];
    $semail = $data['semail'];
    $sphone = $data['sphone'];
    $position = $data['sposition'];
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="bootstrapregis.css" rel="stylesheet" id="bootstrap-css" />
    <!-- <script src="bootstrapregis.js"></script> -->
    <script src="jqueryregis.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Edit Employee</title>
    <style>
        .register {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            margin-top: 3%;
            padding: 3%;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }

        .left {
            float: left;
            margin: 8px 0px 0px -80px;
        }

        select {
            border-radius: 8%;
        }
    </style>
</head>

<body class="container register">
    <!------ Include the above in your HEAD tag ---------->

    <section>
        <div class="row">
            <div class="col-md-3 register-left">
                <img id="pictureUrl" width="25%" />
                <h4 id="name"></h4>
                <h4 id="position"></h4>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">พนักงาน</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">แก้ไขข้อมูลพนักงาน</h3>

                        <!-- <div class="row register-form"> -->
                        <form method="post" id="myform">
                            <div class="row register-form">
                                <div class="col-md-6 col-xl-6">
                                    <div class="row">
                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <select name="name_title" id="name_title">
                                                <option value="นาย">นาย</option>
                                                <option value="นาง">นาง</option>
                                                <option value="นางสาว">นางสาว</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                                            <input type="text" name="fname" class="form-control" placeholder="ชื่อ" value="<?php echo $data['fname']; ?>" required />

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="lname" class="form-control" placeholder="นามสกุล" value="<?php echo $data['lname']; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="SID" class="form-control" placeholder="รหัสนักศึกษา" value="<?php echo $StudentID; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="SPhone" class="form-control" value="<?php echo $sphone; ?>" placeholder="หมายเลขโทรศัพท์" />
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="male" checked />
                                                <span> ผู้ชาย </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="female" />
                                                <span>ผู้หญิง </span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="faculty" class="form-control" placeholder="คณะวิชา" value="<?php echo $faculty; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="field" class="form-control" placeholder="สาขาวิชา" value="<?php echo $field; ?>" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="อีเมล" value="<?php echo $semail; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="position" class="form-control" placeholder="ตำแหน่งงาน" value="<?php echo $position; ?>" />
                                    </div>
                                    <button type="button" id="submit" class="btnRegister" value="แก้ไข" text-align: center;>
                                        แก้ไข
                                    </button>

                                    <!-- onclick="document.getElementById('submit').disabled = true;
                  document.getElementById('submit').style.opacity='0.5';" -->
                                </div>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
        <script src="https://static.line-scdn.net/liff/edge/versions/2.3.0/sdk.js"></script>
        <script src="Editemp.js"></script>
        <script src="getproflie.js"></script>
</body>

</html>