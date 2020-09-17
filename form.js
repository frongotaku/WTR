function Report(id) {
  $.ajax({
    url: "getid.php",
    type: "POST",
    data: {
      userId: id,
    },
  });
}

$("#submit").click(function () {
  liff.init(
    {
      liffId: "1654474033-lP6MvkJp",
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
  var week = $("#myform").find('input[name="week"]').val();
  var date_work = $("#myform").find('input[name="date"]').val();
  var hour = $("#myform").find('input[name="hour"]').val();
  var description = $("#myform").find('input[name="description"]').val();
  var knowledge = $("#myform").find('input[name="knowledge"]').val();
  var problem = $("#myform").find('input[name="problem"]').val();
  console.log(id);
  console.log(week);
  console.log(date_work);
  console.log(hour);
  console.log(description);
  console.log(knowledge);
  console.log(problem);
  
    $.ajax({
      url: "forminsert.php",
      type: "POST",
      data: {
        userId: id,
        week: week,
        date: date_work,
        hour: hour,
        description: description,
        knowledge: knowledge,
        problem: problem,
      },
      success: function (result) {
        if (result == 0) {
          swal({
            title: "บันทึกข้อมูลสำเร็จ",
            text: "ต้องการกรอกเพิ่มหรือไม่?",
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
        } else if (result == 1) {
          swal({
            title: "บันทึกข้อมูลผิดพลาด",
            text: "กรุณาลองอีกครั้ง",
            icon: "error",
            button: "OK!",
          });
        } else if (result == 2) {
          swal({
            title: "คุณได้ลงบันทึกไว้แล้ว",
            text: "กรุณาเลือกวันอื่น",
            icon: "error",
            button: "OK!",
          });
        } else if (result == 3) {
          swal({
            title: "ไม่สามารถเพิ่มได้",
            text: "ไม่มีชื่อนี้ในระบบครับ",
            icon: "error",
            button: "OK!",
          }).then((value) => {
            window.location.assign("https://liff.line.me/1654474033-PewaBzAe");
          });
        } else {
          alert(result);
        }
      },
    });
  }
