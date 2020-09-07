liff.init(
  {
    liffId: "1654474033-wYMyONgd",
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
      document.getElementById("pictureUrl").src = profile.pictureUrl;
      id = profile.userId;

      email = liff.getDecodedIDToken().email;
      // console.log(id);
      getprofile(id);
      endlocation(id);
      // Report(id);
    })
    .catch((err) => {
      console.log("error", err);
    });
}
function getprofile(id) {
  $.ajax({
    url: "search profile.php",
    type: "POST",
    data: {
      usermId: id,
    },
    success: function (result) {
      // console.log(result);
      if (result != "null") {
        var res = result.split(",");
        document.getElementById("name").innerHTML = res[0];
        document.getElementById("position").innerHTML = "ตำแหน่ง : " + res[1];
        document.getElementById("userid").innerHTML=id;
      } else {
        console.log("เข้า");
        // window.close
      }
    },
  });
}
// function Report(id) {
//   $.ajax({
//     url: "form.php",
//     type: "POST",
//     data: {
//       userId: id,
//     },
//     success: function () {
//       // console.log(result);
//       console.log(id);
//       if (result != "null") {
//         document.getElementById("userid").innerHTML=id;
//         // swal({
//         //   title: "บันทึกข้อมูลเรียบร้อยแล้ว",
//         //   text: result,
//         //   icon: "success",
//         //   button: "Yeah!",
//         // });
//         console.log("ผ่าน");
//       } else {
//         console.log("เข้า");
//         // window.close
//       }
//     },
//   });
// }
