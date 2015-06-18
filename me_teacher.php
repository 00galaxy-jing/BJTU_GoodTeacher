<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/teacher_function.php'); ?>
<?php require_once('function/message_function.php'); ?>

<?php 
  //初始化
  $tea_id = -1;
  if(isset($_GET['tid'])){
        $tea_id = $_GET['tid'];
    }
  $mes = -1;
  if(isset($_GET['mes'])){
        $mes = $_GET['mes'];
        set_read($mes);
    }
  $now_uid=$_SESSION['MM_uid'];
  $now_type=$_SESSION['MM_role'];

  //调用function
  $user_info = get_teacher_info($tea_id);
?>
<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <?php require('header.php'); ?>
</head>

<body>
  <script type="text/javascript">
      function get_data()
      {
        $.ajax({
          url: 'getMessage.php',
          success: function(data) {
            document.getElementById('more_m').innerHTML=data;
          }
        });
      }

      setTimeout("get_data()",3000);//1秒一次执行
    </script> 
  <!-- Page: me  -->
  <div id="me" data-role="page">
    <div data-role="header" data-position="fixed" class="header" id="mheader" data-theme="a">
      <h3>交大好老师</h3>
      <button type="button" onClick="javascript:history.go(-1);">返回</button>
    </div>
    <div role="main" class="ui-content">
      <!-- 个人信息 实在太丑了 回头改一下-->
        <div class="imgtest" style="text-align:center;">
          <div style="font-family: cursive;font-size: 20px;"><?php echo $user_info['tea_name']; ?></div>
          <figure style="  margin-top: 5px;margin-bottom:5px">
            <div>
              <img src="<?php echo $user_info['tea_pic']; ?>" />
            </div>  
          </figure>
        </div>
        <p>所属院系：<?php echo $user_info['tea_major'] ?></p>
        <p>邮箱：<?php echo $user_info['tea_mail'] ?></p>
        <p>电话：<?php echo $user_info['tea_tel'] ?></p>
        <p>个人简介：<?php echo $user_info['tea_intro'] ?></p>
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
            <?php 
              if ($_SESSION['MM_role']===2) {
            ?>
            <a href="me_student.php?sid=<?php echo $now_uid ?>" data-icon="user" data-theme="a">我</a>
         <?php }else{?>
          <a href="me_teacher.php?tid=<?php echo $now_uid ?>" data-icon="user" data-theme="a">我</a>
         <?php } ?>
           </li>
          <li>
            <a data-icon="bars" data-theme="a" id="more_m">更多</a>
          </li>
        </ul>
      </div>
    </div>
  </div>


  <!-- 圆形头像style   margin:10px 5px; -->
  <style type="text/css">
    .imgtest{

    overflow:hidden;
    }
    .list_ul figcaption p{
    font-size:12px;
    color:#aaa;
    }
    .imgtest figure div{
    display:inline-block;
    margin:0px auto;
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
    .ui-content p{
        margin: 3px;
        font-family: "微软雅黑";
        text-align:center;
    }
  </style>
</body>

</html>
