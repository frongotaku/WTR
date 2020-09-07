// setTimeout(() => {
var result;
// ajaxส่งไอดีไปเรียกข้อมูลจากDB
function endlocation(id) {
  $.ajax({
    url: "search location.php",
    type: "POST",
    data: {
      usermId: id,
    },
    success: function (result) {
      // console.log(result);

      getLocation(result);
      var res = result.split(",");
      document.getElementById("endpoint").innerHTML = res[0];
    },
  });
}

// }, 250);

function getLocation(result) {
  var res = result.split(",");
  var cur_lat;
  var cur_lng;
  var end_lat = res[2]; //ละติจูด
  var end_lng = res[3]; //ลองติจูด
  var d;
  // console.log(res[2]);
  // console.log(res[3]);
  setTimeout(() => {
    //   console.log("1");
    if (navigator.geolocation) {
      // console.log("2");

      navigator.geolocation.getCurrentPosition(
        function (position) {
          // console.log("3");
          cur_lat = position.coords.latitude; //ละติจูดตัวเอง
          cur_lng = position.coords.longitude; //ลองติจูดตัวเอง
          // console.log(cur_lat);

          // คำนวนระยะห่าง
          const R = 6371e3; // metres
          const φ1 = (cur_lat * Math.PI) / 180; // φ, λ in radians
          const φ2 = (end_lat * Math.PI) / 180;
          const Δφ = ((end_lat - cur_lat) * Math.PI) / 180;
          const Δλ = ((end_lng - cur_lng) * Math.PI) / 180;
          const a =
            Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
            Math.cos(φ1) * Math.cos(φ2) * Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
          const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

          d = R * c; // in metres

          if (
            position.coords.latitude != "" &&
            position.coords.longtitide != ""
          ) {
            if (d > 200) {
              //ถ้าระยะทางเกิน200เมตร
              $("#checkin").hide();
              // $("#checkOut").hide();
              swal({
                title: "อยู่ห่างเกินไป",
                text:
                  "คุณอยู่ห่างจาก " +
                  res[1] +
                  " เกินระยะ200เมตร เป็นระยะทาง: " +
                  Math.round(d) +
                  " เมตร",
                icon: "error",
                button: "OK!",
              }).then((value) => {
                liff.closeWindow();
              });
              // alert(
              //   "คุณอยู่ห่างจากบริษัทเกินระยะ100เมตร เป็นระยะทาง: " +
              //     Math.round(d) +
              //     " เมตร ยูโน้ว ไอควาย"
              //   // ลบด้วย
              // );

              document.getElementById("distance").innerHTML =
                "คุณอยู่ห่างจาก " +
                res[1] +
                " เกินระยะ200เมตร เป็นระยะทาง: " +
                Math.round(d) +
                " เมตร";

              // liff.init(
              //   {
              //     liffId: "1654474033-wYMyONgd",
              //   },
              //   liff.closeWindow()
              // );
            } else {
              $("#checkin").show();
              $("#checkOut").show();
              document.getElementById("distance").innerHTML =
                "คุณอยู่ในระยะที่กำหนด เป็นระยะทาง: " + Math.round(d) + " เมตร";
            }
          } else {
            alert("Error");
          }
        },
        function (err) {
          if (err.code > 0) {
            $("#distance").append(
              "กรุณาเปิดใช้งานGPSหรือยอมรับการเข้าถึงLocationด้วยครับ"
            );
            // swalคือalertแบบสวยงาม

            swal({
              title: "",
              text: "กรุณาเปิดใช้งานGPSหรือยอมรับการเข้าถึงLocationด้วยครับ",
              icon: "error",
              button: "OK!",
            }).then((value) => {
              liff.closeWindow();
            });

            // $("#distance").append(
            //   "มึงไม่ยอมเปิดGPSแล้วมันจะทำงานให้มึงมั้ยล่ะ ไอควายเนื้อออออ"
            // );
            // alert(
            //   "มึงไม่ยอมเปิดGPSแล้วมันจะทำงานให้มึงมั้ยล่ะ ไอควายเนื้อออออ"
            // );
            // liff.init(
            //   {
            //     liffId: "1654474033-wYMyONgd",
            //   }
            //   liff.closeWindow()
            // );
          }
        },
        { enableHighAccuracy: true, timeout: 2000, maximumAge: 0 }
      );
    } else {
      $("#distance").show().html("ไม่สารถใช้ฟังชั่นได้");
    }
  }, 250);
}
