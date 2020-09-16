liff.init(
  {
    liffId: "1654912408-5oQR7P4d",
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
      liffId: "1654912408-5oQR7P4d",
    },
    liff
      .getProfile()
      .then((profile) => {
        id = profile.userId;
        insert(id);
      })
      .catch((err) => {
        console.log("error", err);
      })
  );
});

function insert(id) {
  var id = id;
  var name_title = $("#myform").find('select[name="name_title"]').val();
  var fname = $("#myform").find('input[name="fname"]').val();
  var lname = $("#myform").find('input[name="lname"]').val();
  var HID = $("#myform").find('input[name="HID"]').val();
  var gender = $("#myform").find('input[name="gender"]').val();
  var email = $("#myform").find('input[name="email"]').val();
  var Phone = $("#myform").find('input[name="Phone"]').val();
  var position = $("#myform").find('input[name="position"]').val();
  console.log(id);
  console.log(name_title);
  console.log(fname);
  console.log(lname);
  console.log(HID);
  console.log(gender);
  console.log(email);
  console.log(Phone);
  console.log(position);

  $.ajax({
    url: "regismanager.php",
    type: "POST",
    data: {
      userId: id,
      name_title: name_title,
      fname: fname,
      lname: lname,
      HID: HID,
      gender: gender,
      email: email,
      Phone: Phone,
      position: position,
      level: "admin",
    },

    success: function (result) {
      console.log("เข้า");
      if (result == 0) {
        swal({
          title: "บันทึกข้อมูลสำเร็จ",
          text: "",
          icon: "success",
          button: "Yeah!",
        }).then((value) => {
          location.reload();
        });
      } else if (result == 1) {
        swal({
          title: "บันทึกข้อมูลผิดพลาด",
          text: "กรุณาลองอีกครั้ง",
          icon: "error",
          button: "Yeah!",
        });
      } else if (result == 2) {
        swal({
          title: "คุณได้ทำการลงทะเบียนไว้แล้ว",
          text: "กรุณาลองอีกครั้ง",
          icon: "error",
          button: "Yeah!",
        }).then((value) => {
          window.close();
        });
      }else{
        alert (result);
      }
    },
  });
}
