<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My LIFF v2</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
    />
    <script src="https://kit.fontawesome.com/55fb55c22f.js"></script>

    <style>
      #pictureUrl {
        display: block;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="row text-center">
        <img id="pictureUrl" width="25%" />
      </div>
      <p id="userId"></p>
      <div class="row text-center">
        <p id="displayName"></p>
      </div>
      <div class="row text-center">
        <p id="statusMessage"></p>
      </div>
      <div class="row text-center">
        <p id="getDecodedIDToken"></p>
      </div>

      <div class="row text-center">
        <button onclick="getLocation()">Try It</button>
        <p id="demo"></p>
      </div>
    </div>

    <!-- check in-out -->
    <div class="container">
      <div class="row text-center">
        <!-- check in -->
        <div class="col-sm-6 col-md-6 col-lg-6">
          <a>
            <button type="button" onclick="checkin()">
              <img
                src="Photo/checkIn.png"
                alt="checkin"
                class="img-fluid rounded mx-auto d-block img-fluid"
                width="200px"
                height="200px"
              />
            </button>
          </a>
        </div>

        <!-- check out -->
        <div class="col-sm-6 col-md-6 col-lg-6">
          <a href="#">
            <button type="button" onclick="checkin()">
              <img
                src="Photo/checkOut.png"
                alt="checkout"
                class="img-fluid rounded mx-auto d-block"
                width="200px"
                height="200px"
              />
            </button>
          </a>
        </div>
      </div>
    </div>





    <script>
      var x = document.getElementById("demo");

      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
      }

      function showPosition(position) {
        x.innerHTML =
          "Latitude: " +
          position.coords.latitude +
          "<br>Longitude: " +
          position.coords.longitude;
      }
    </script>

    <!-- show profile -->
    <script src="https://static.line-scdn.net/liff/edge/versions/2.3.0/sdk.js"></script>
    <script>
      function runApp() {
        liff
          .getProfile()
          .then((profile) => {
            document.getElementById("pictureUrl").src = profile.pictureUrl;
            document.getElementById("userId").innerHTML =
              "<b>UserId:</b> " + profile.userId;
            document.getElementById("displayName").innerHTML =
              "<b>DisplayName:</b> " + profile.displayName;
            document.getElementById("statusMessage").innerHTML =
              "<b>StatusMessage:</b> " + profile.statusMessage;
            document.getElementById("getDecodedIDToken").innerHTML =
              "<b>Email:</b> " + liff.getDecodedIDToken().email;
          })
          .catch((err) => console.error(err));
      }
      liff.init(
        { liffId: "1654474033-wYMyONgd" },
        () => {
          if (liff.isLoggedIn()) {
            runApp();
          } else {
            liff.login();
          }
        },
        (err) => console.error(err.code, error.message)
      );
    </script>
    <script src="index.js"></script>
  </body>
</html>
