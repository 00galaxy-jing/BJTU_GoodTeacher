<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link href="./js/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css" />
  <script src="./js/jquery-1.9.1.min.js"></script>
  <script src="./js/jquery.mobile-1.4.5.min.js"></script>
  <!-- Uncomment the following to include cordova in your android project -->
  <!--<script src="//ezoui.com/platforms/android/cordova.js"></script>-->
  <!-- Export JS  -->
  <script>
    /*** code gen by capture-photo  ***/
    $(document).on("gkComponentsReady", function () {
      $("#gk-563NrA-btn").on("click", function () {
        if (navigator.camera) {
          navigator.camera.getPicture(
            // Called when a photo is successfully retrieved
            function (imgURI) {
              // Set image use DATA_URL

              // imgURI = "data:image/jpeg;base64,"+imgURI;
              $("#gk-563NrA-img").attr("src", imgURI);
            },
            // Called if something bad happens
            function (msg) {
              alert("Failed because: " + msg);
            },
            // Camera options
            {
              quality: 80,
              //destinationType: navigator.camera.DestinationType.DATA_URL, 
              destinationType: navigator.camera.DestinationType.FILE_URI,
              sourceType: Camera.PictureSourceType.CAMERA,
              encodingType: Camera.EncodingType.JPEG,
              saveToPhotoAlbum: true
            });
        }
      });
    });
  </script>
  <title>EZo App</title>
</head>

<body>
  <!-- Page: me  -->
  <div id="me" data-role="page">
    <div data-role="header" data-position="fixed" class="header" id="mheader" data-theme="a">
      <h3>交大好老师</h3>
    </div>
    <div role="main" class="ui-content">
      <div class="ui-grid-b" style="height:150px">
        <div class="ui-block-a" style="height:100%"></div>
        <div class="ui-block-b" style="height:100%">
          <img src="./image/profile.png" style="height:90px;width:90px" alt="profile"></img>
        </div>
        <div class="ui-block-c" style="height:100%"></div>
      </div>
    </div>
    <div data-position="fixed" data-role="footer">
      <div data-role="navbar">
        <ul>
          <li>
            <a href="home.php" data-icon="home" data-theme="a">动态</a>
          </li>
          <li>
            <a href="hot_recom.php" data-icon="star" data-theme="a">发现</a>
          </li>
          <li>
            <a href="question.php" data-icon="edit" data-theme="a">提问</a>
          </li>
          <li>
            <a href="me.php" data-icon="user" data-theme="a" class="ui-btn-active">我</a>
          </li>
          <li>
            <a data-icon="bars" data-theme="a">更多</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</body>

</html>
