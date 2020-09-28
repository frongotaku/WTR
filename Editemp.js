liff.init(
    {
      liffId: "1654474033-1qg3DGMd",
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
  
  $("#submit").click(function () {
    liff.init(
      {
        liffId: "1654474033-1qg3DGMd",
      },
      liff
        .getProfile()
        .then((profile) => {
          id = profile.userId;
          check1(id);
        })
        .catch((err) => {
          console.log("error", err);
        })
    );
  });
  function check1(id) {
    var name_title = $("#myform").find('select[name="name_title"]').val();
    var fname = $("#myform").find('input[name="fname"]').val();
    var lname = $("#myform").find('input[name="lname"]').val();
    var SID = $("#myform").find('input[name="SID"]').val();
    var faculty = $("#myform").find('input[name="faculty"]').val();
    var field = $("#myform").find('input[name="field"]').val();
    var gender = $("#myform").find('input[name="gender"]').val();
    var email = $("#myform").find('input[name="email"]').val();
    var SPhone = $("#myform").find('input[name="SPhone"]').val();
    var position = $("#myform").find('input[name="position"]').val();
    swal({
      title: "เช็คความถูกต้องด้วยครับ",
      text:
        "ชื่อ : " +
        name_title +
        fname +
        " " +
        lname +
        "\n รหัสนศ. : " +
        SID +
        "\n คณะ : " +
        faculty +
        " สาขา : " +
        field +
        "\n เพศ : " +
        gender +
        "\n Email : " +
        email +
        "\n เบอร์มือถือ : " +
        SPhone +
        "\n ตำแหน่ง : " +
        position,
      icon: "warning",
      buttons: {
        cancel: "แก้ไข",
        Yes: true,
      },
    }).then((value) => {
      switch (value) {
        case "Yes":
          check2(id);
          break;
        default:
          break;
      }
    });
  }
  
  function check2(id) {
    swal("โปรดกรอกรหัสยืนยันจากบริษัทด้วยครับ:", {
      content: "input",
    }).then((value) => {
      if (!value) {
        throw null;
      } else insert(id, value);
    });
  }
  
  function insert(id, value) {
    var id = id;
  
    var name_title = $("#myform").find('select[name="name_title"]').val();
    var fname = $("#myform").find('input[name="fname"]').val();
    var lname = $("#myform").find('input[name="lname"]').val();
    var SID = $("#myform").find('input[name="SID"]').val();
    var faculty = $("#myform").find('input[name="faculty"]').val();
    var field = $("#myform").find('input[name="field"]').val();
    var gender = $("#myform").find('input[name="gender"]').val();
    var email = $("#myform").find('input[name="email"]').val();
    var SPhone = $("#myform").find('input[name="SPhone"]').val();
    var position = $("#myform").find('input[name="position"]').val();
    console.log(id);
    console.log(name_title);
    console.log(fname);
    console.log(lname);
    console.log(SID);
    console.log(faculty);
    console.log(field);
    console.log(gender);
    console.log(email);
    console.log(SPhone);
    console.log(position);
  
    $.ajax({
      url: "EditProfileUpdate.php",
      type: "POST",
      data: {
        userId: id,
        name_title: name_title,
        fname: fname,
        lname: lname,
        SID: SID,
        faculty: faculty,
        field: field,
        gender: gender,
        email: email,
        SPhone: SPhone,
        position: position,
        level: "emp",
        value: value,
      },
  
      success: function (result) {
        if (result == 0) {
          swal({
            title: "แก้ไขข้อมูลสำเร็จ",
            text: "",
            icon: "success",
            button: "OK!",
          }).then((value) => {
            liff.closeWindow();
          });
        } else if (result == 1) {
          swal({
            title: "บันทึกข้อมูลผิดพลาด",
            text: "กรุณาลองใหม่อีกครั้ง",
            icon: "error",
            button: "OK!",
          });
        } else if (result == 2) {
          swal({
            title: "คุณไม่ได้ทำการลงทะเบียนไว้",
            text: "กรุณาสมัครก่อนใช้งานครับ",
            icon: "error",
            button: "OK!",
          }).then((value) => {
            window.location.assign("https://liff.line.me/1654474033-PewaBzAe");
          });
        } else if (result == 3) {
          swal({
            title: "คุณไม่ใช่พนักงานของที่Bangkok Unitrade",
            text: "อย่าริบังอาจใช้งานครับ",
            icon: "warning",
            button: "OK!",
          }).then((value) => {
            liff.closeWindow();
          });
        }
      },
    });
  }
  