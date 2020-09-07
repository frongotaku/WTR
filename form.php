<?Php
$userid = $_POST['userId'];
echo $userid;
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Daily Form</title>
  <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
  <script src="jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- swalคือalertแบบสวยงาม -->
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
      /* font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji",
        "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5; */
      color: #212529;
      /* text-align: left; */
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

    form {
      border: 3px solid #f1f1f1;
    }

    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      background-color: rgba(255, 255, 255, 0.884);
    }

    input[type="text"],
    input[type="password"],
    input[type="date"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      background-color: rgba(255, 255, 255, 0.884);
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      background-color: rgb(236, 236, 236);
      outline: none;
    }

    button {
      background-color: #4caf50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 30%;
      border-radius: 10%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="container" align="center">
      <h3>
        <img src="./Photo/d93ce92db719a2a702fb1e303b7b57981283300926_large.png" alt="hamtaro" width="5%" />Daily Report
        <img src="./Photo/d93ce92db719a2a702fb1e303b7b57981283300926_large.png" alt="hamtaro" width="5%" />
      </h3>
    </div>
  </header>
  <section align="center" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 container">

    <!-- Show Profile -->
    <div align="center" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 container">
      <div class="row">
        <img class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" id="pictureUrl" width="25%" />

        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9" align="left">
          <b>
            <br>
            <br>
            <p id="name"></p>
            <p id="position"></p>
            <p id="userid"></p>
          </b>
        </div>
      </div>
    </div>
    <hr />
    </div>

    <!-- Form report -->
    <div class="container" align="center">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" align="center">
        <form action="forminsert.php" method="post" id="report">

          <input type="text" id="userid" name="userid"placeholder="Userid" />
         
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <br>
            <label for="name"><b>ชื่อนักศึกษา</b></label>
            <br>

            <!-- เลือกนักศึกษา -->ฤ
            <?php
            require "config.php";
            $conn = new mysqli($host, $user, $password, $database);
            mysqli_set_charset($conn, "utf8");
            $sql1 = "SELECT * FROM heroku_ca4ecde9fd95ba6.tbl_emp";
            $result1 = mysqli_query($conn, $sql1); ?>
            <!-- <select id="ID" name="ID" class="selectpicker text-center" data-live-search="true" title=" เลือก นักศึกษา " data-width="100%" require>
              <?php
              while ($row1 = mysqli_fetch_array($result1)) {
              ?>
                <option value="<?php echo $row1['m_line']; ?>">
                  <?php echo $row1['m_firstname']; ?><?php echo ' ' . $row1['m_lastname']; ?>
                </option>";
              <?php } ?>
            </select> -->
            <br><br>
            <label for="week"><b>สัปดาห์ที่</b></label>
            <input type="text" placeholder="Enter Week" name="week" onKeyUp="if(this.value*1!=this.value) this.value='' ;" required />

            <label for="date"><b>วัน/เดือน/ปี</b></label>
            <input type="date" placeholder="Choose Date" name="date" required />

            <label for="hour"><b>จำนวนชั่วโมง</b></label>
            <input type="text" placeholder="Enter Hour" name="hour" onKeyUp="if(this.value*1!=this.value) this.value='' ;" required />

            <label for="description"><b>งานที่ปฏิบัติโดยย่อ</b></label>
            <input type="text" placeholder="Enter Description" name="description" required />

            <label for="knowledge"><b>ความรู้/ทักษะที่ได้รับ</b></label>
            <input type="text" placeholder="Enter Knowledge" name="knowledge" required />

            <label for="problem"><b>ปัญหา/อุปสรรค</b></label>
            <input type="text" placeholder="Enter Problem" name="problem" />
            <input type="submit" name="submit" id="submit" class="btn btn-info" value="submit" />
            <!-- <button type="submit" id="submit">Submit</button> -->

          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- liff line -->
  <script src="https://static.line-scdn.net/liff/edge/versions/2.3.0/sdk.js"></script>
  <!-- action ปุ่ม -->
  <!-- <script src="button.js"></script> -->
  <!-- show profile -->
  <script src="getproflie.js"></script>
  <script src="formsub.js"></script>
</body>

</html>


<!-- Insert Report -->
<?php

if (isset($_POST['userId'])) {

  // insertdb();
}

function insertdb()
{
  if (isset($_POST['userId'])) {

    $id = $_POST['userId'];
  } else {
    $id = null;
  }
  if (isset($_POST['week'])) {
    $week = $_POST['week'];
  } else {
    $week = null;
  }
  if (isset($_POST['date'])) {
    $date_work = $_POST['date'];
  } else {
    $date_work = null;
  }
  if (isset($_POST['hour'])) {
    $hour = $_POST['hour'];
  } else {
    $hour = null;
  }
  if (isset($_POST['description'])) {
    $Description = $_POST['description'];
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
  if ($week != null &&  $date_work != null &&  $hour != null && $Description != null) {
    require "config.php";

    $conn = new mysqli($host, $user, $password, $database);
    mysqli_set_charset($conn, "utf8");

    // เช็คว่าต่อติดมั้ย
    // if ($conn->connect_error) {
    //     echo "Failed to connect to MySQL: " . $conn->connect_error;
    // } else {
    //     echo "Success!!!";
    // }

    $sql = "INSERT INTO report (userid,week,hour,date_work,Description_work,Knowledge,Problem,TimeStamp)
VALUES ('$id','$week', '$hour','$date_work', '$Description', '$knowledge', '$problem','$timestamp') ";
    $sql1 = "ALTER TABLE report AUTO_INCREMENT = 1";
    // $resultU = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
      if ($conn->query($sql1) === TRUE) {
      }
?>
      <script>
        console.log(<?php $result; ?>);
        swal({
          title: "บันทึกข้อมูลเรียบร้อยแล้ว",
          text: "",
          icon: "success",
          button: "Yeah!",
        })
      </script>

    <?php

    } else {
      echo "Error updating record: " . $conn->error;
    };
  } else { ?>
    <Script>
      swal({
        title: "ไม่มีข้อมูล",
        text: "กรุณากรอกข้อมูลด้วยครับ",
        icon: "error",
        button: "OK!",
      });
    </Script>
<?php }
}
$conn->close();
?>