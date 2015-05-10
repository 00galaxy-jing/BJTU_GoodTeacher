<!DOCTYPE html>
<html>

<head> 
  <?php require('header.php');?>
  <script language="javascript">
    if (top.location != location) top.location.href = location.href;
  </script>

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
</head>

<body>
  <!-- Page: question  -->
  <div id="question" data-role="page">
    <div data-role="header" data-position="fixed" id="qheader" class="header">
      <h3>交大好老师</h3>
    </div>
    <div role="main" class="ui-content">
      <div class="ui-field-contain">
        <label for="gk-566T6t" class>标题</label>
        <input type="text" name id="gk-566T6t" placeholder="（标题不超过30字）" data-theme="a" data-prevent-focus-zoom="true" data-mini="true">
      </div>
      <div class="ui-field-contain">
        <label for="gk-56hOWm">问题描述</label>
        <textarea id="gk-56hOWm" name placeholder="（不少于50字）"></textarea>
      </div>
      <div class="ui-field-contain" id="qselector">
        <label for="gk-56I1dj">问题分类</label>
        <select id="gk-56I1dj">
          <option value="option1">Option 1</option>
        </select>
      </div>
      <div class="ui-grid-a" style="height:60px">
        <div class="ui-block-a" style="height:100%">
          <input id="gk-566PTC" name="gk-566PTC" type="checkbox">
          <label for="gk-566PTC">Check</label>
        </div>
        <div class="ui-block-b" style="height:100%">
          <a class="ui-btn" style="color:white;background:green;">提交问题</a>
        </div>
      </div>
      <div class="ui-field-contain" id="cancel">
          <a href="home.php" rel="external" class="ui-btn">取消</a>
      </div>
    </div>
  </div>
</body>

</html>
