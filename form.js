function formreport() {
  liff.init(
    {
      liffId: "1654474033-wYMyONgd",
    },
    liff
      .getProfile()
      .then((profile) => {
        id = profile.userId;

        // email = liff.getDecodedIDToken().email;
      })
      .catch((err) => {
        console.log("error", err);
      })
  );

  var week = document.forms["formreport"]["week"].value;
  var date_work = document.forms["formreport"]["date"].value;
  var hour = document.forms["formreport"]["hour"].value;
  var description = document.forms["formreport"]["description"].value;
  var knowledge = document.forms["formreport"]["knowledge"].value;
  var problem = document.forms["formreport"]["problem"].value;
  if (week == "") {
    alert("Name must be filled out");
    return false;
  }
  console.log(id);
  Report(id, week, date_work, hour, description, knowledge, problem);
}
function Report(id, week, date_work, hour, description, knowledge, problem) {
  $.ajax({
    url: "forminsert.php",
    type: "POST",
    data: {
      usermId: id,
      week: week,
      date_work: date_work,
      hour: hour,
      description: description,
      knowledge: knowledge,
      problem: problem,
    },
    success: function (result) {
      // console.log(result);
      console.log(id);
      if (result != "null") {
        swal({
          title: "บันทึกข้อมูลเรียบร้อยแล้ว",
          text: result,
          icon: "success",
          button: "Yeah!",
        });
        console.log("ผ่าน");
      } else {
        console.log("เข้า");
        // window.close
      }
    },
  });
}
