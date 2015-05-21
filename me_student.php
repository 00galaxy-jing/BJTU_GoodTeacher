<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link href="./js/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css" />
  <script src="./js/jquery-1.9.1.min.js"></script>
  <script src="./js/jquery.mobile-1.4.5.min.js"></script>

  <title>交大好老师</title>
</head>

<body>
  <!-- Page: me  -->
  <div id="me" data-role="page">
    <div data-role="header" data-position="fixed" class="header" id="mheader" data-theme="a">
      <h3>交大好老师</h3>
    </div>
    <div role="main" class="ui-content">
      <!-- 个人信息 -->
        <div class="imgtest" style="text-align:center;">
          <figure>
            <div>
              <img src="./img/student/krislu.jpg" />
            </div>  
          </figure>
        </div>
        <!-- 消息列表 -->
        <div data-role="content" id="me_quick_access" name = "me_quick_access">
          <ul data-role="listview" data-inset="true">
          <li data-role="list-divider">我</li>
          <li>我关注的老师<span class="ui-li-count">9</span></li>
          <li>我关注的问题<span class="ui-li-count">4</span></li>
          <li>我的问题<span class="ui-li-count">13</span></li>
          <li>我的回答<span class="ui-li-count">8</span></li>
          </ul>
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


  <!-- 圆形头像style -->
  <style type="text/css">
    .imgtest{margin:10px 5px;
    overflow:hidden;
    }
    .list_ul figcaption p{
    font-size:12px;
    color:#aaa;
    }
    .imgtest figure div{
    display:inline-block;
    margin:5px auto;
    width:100px;
    height:100px;
    border-radius:100px;
    border:2px solid #fff;
    overflow:hidden;
    -webkit-box-shadow:0 0 3px #ccc;
    box-shadow:0 0 3px #ccc;
    }
    .imgtest img{width:100%;
    min-height:100%; text-align:center;
    }
  </style>
</body>

</html>
