<!DOCTYPE html>
<html>

<head>
  <?php require('header.php');?>
</head>

<body>
  <!-- Page: home  -->
  <div id="home" data-role="page">
    <div style="height:100px"data-role="header" data-position="fixed" data-fullscreen="false" class="header" id="iheader" data-theme="a">
      <h3>交大好老师</h3>
      <div class="ui-field-contain" data-position="fixed">
        <label for="search"></label>
        <input type="search" name id="search" data-mini="false" data-clear-btn="true" placeholder="搜索">
      </div>
    </div>
    <div role="main" class="ui-content">
      <div data-role="content">
        <ul data-role="listview" data-inset="true">
          <li><img src="./image/profile.png">Miura Haruma</li>
          <li><img src="./image/profile.png" class="ui-li-icon">Miura Haruma</li>
          <li><a href="#me" ><img src="./image/profile.png" alt="" class="ui-li-icon">Miura Haruma</a></li>
          <li><a href="#me"><img src="./image/profile.png" alt="">Miura Haruma</a></li>
        </ul>
      </div>
      <div data-role="content">
        <ul data-role="listview" data-inset="true">
          <li data-role="list-divider">通知</li>
          <li><a href="#">好友动态<span class="ui-li-count">9</span></a></li>
          <li>最新通知<span class="ui-li-count">9</span></li>
          <li>我的提问<span class="ui-li-count">9</span></li>
          <li>赞<span class="ui-li-count">9</span></li>
          <li>评论<span class="ui-li-count">9</span></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- 底下的固定菜单栏-->
    <div data-position="fixed" data-role="footer" data-id="footernav">
      <div data-role="navbar" data-position="fixed">
        <ul>
          <li>
            <a href="home.php" data-icon="home" class="ui-btn-active"  data-theme="a">动态</a>
          </li>
          <li>
            <a href="hot_recom.php" rel="external" data-icon="star" data-theme="a">发现</a>
          </li>
          <li>
            <a href="question.php" data-icon="edit" data-theme="a">提问</a>
          </li>
          <li>
            <a href="me.php" data-icon="user" data-theme="a">我</a>
          </li>
          <li>
            <a data-icon="bars" data-theme="a">更多</a>
          </li>
        </ul>
      </div>
    </div>
</body>

</html>
