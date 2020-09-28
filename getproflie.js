function runApp() {
  liff
    .getProfile()
    .then((profile) => {
      document.getElementById("pictureUrl").src = profile.pictureUrl;
      id = profile.userId;

      // email = liff.getDecodedIDToken().email;
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
        if (result == 0) {
          swal({
            title: "คุณยังไม่ได้ลงชื่อเข้าใช้งาน",
            text: "กรุณาลงชื่อเข้าใช้งานก่อนครับ",
            icon: "error",
            button: "OK!",
          }).then((value) => {
            window.location.assign("https://liff.line.me/1654474033-W8O1nEQj");
          });
        } else {
          var res = result.split(",");
          // alert (result);
          document.getElementById("name").innerHTML = res[0];
          document.getElementById("position").innerHTML = "ตำแหน่ง : " + res[1];
          // document.getElementById("userid").innerHTML=id;
        }
      } else {
        console.log("เข้า");
        // window.close
      }
    },
  });
  
  
}
// function Report(id) {
//   $.ajax({
//     url: "getid.php",
//     type: "POST",
//     data: {
//       userId: id,
//     },
//   });
// }
