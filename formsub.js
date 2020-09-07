$("#submit").click(function () {
  
    liff.init(
      {
        liffId: "1654474033-wYMyONgd",
      },
      liff
        .getProfile()
        .then((profile) => {
          id = profile.userId;
        //   email = liff.getDecodedIDToken().email;
        })
        .catch((err) => {
          console.log("error", err);
        })
    );
  
    setTimeout(() => {
      $.ajax({
        url: "forminsert.php",
        type: "POST",
        data: {
          userIn: id,
        //   emailIn: email,
        },
  
        success: function (result) {
          // swalคือalertแบบสวยงาม
          swal({
            title: "success!!!",
            text: result,
            icon: "success",
            button: "Yeah!",
          })
          .then((value) => {
            liff.closeWindow();
          });
          // closeWindow;
          // , (window.location.href = "/check-in.php");
  
          // console.log(result);
        },
      });
    }, 250);
  });