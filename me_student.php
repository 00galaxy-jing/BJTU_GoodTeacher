<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/student_function.php'); ?>
<?php require_once('function/message_function.php'); ?>

<?php 
  //初始化
  $stu_id = -1;
  if(isset($_GET['sid'])){
        $stu_id = $_GET['sid'];
    }
  $mes = -1;
  if(isset($_GET['mes'])){
        $mes = $_GET['mes'];
        set_read($mes);
    }
  $now_uid=$_SESSION['MM_uid'];
  $now_type=$_SESSION['MM_role'];

  //调用function
  $user_info = get_student_info($stu_id);
  $my_interest = get_student_interest($stu_id);
  $my_follow = get_student_teacher($stu_id);
  $my_problem = get_my_pro($stu_id);
  $my_answer = get_my_ans($stu_id);

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

      setInterval("get_data()",3000);//1秒一次执行
    </script> 
  <!-- Page: me  -->
  <div id="me" data-role="page">
    <div data-role="header" data-position="fixed" class="header" id="mheader" data-theme="a">
      <h3>交大好老师</h3>
    </div>
    <div role="main" class="ui-content">
      <!-- 个人信息 -->
        <div class="imgtest" style="text-align:center;">
          <div style="font-family: cursive;font-size: 20px;"><?php echo $user_info['stu_name']; ?></div>
          <figure style="  margin-top: 5px;margin-bottom:5px">
            <div>
              <img src="<?php echo $user_info['stu_pic']; ?>" />
            </div>  
          </figure>
        </div>
        <p><?php echo $user_info['stu_major']; ?> <?php echo $user_info['stu_grade']; ?>级</p>
        <p><?php echo $user_info['stu_mail']; ?></p>
        <!-- 消息列表 -->
        <?php if($now_type==2 && ($stu_id==$now_uid)) {?>
          <div data-role="content">
          <ul data-role="listview" data-inset="true">
            <li>
              <a href="my_group.php?sid=<?php echo $now_uid ?>">
              <img src="./img/student/krislu.jpg" class="ui-li-icon">
                  我关注的分组
                  <span class="ui-li-count"><?php echo $my_interest; ?></span>
              </a>
            </li>
            <li>
              <a href="my_interest.php?sid=<?php echo $now_uid ?>">
                  <img src="./img/student/krislu.jpg" class="ui-li-icon" >
                  我关注的老师
                  <span class="ui-li-count"><?php echo $my_follow; ?></span>
              </a>
            </li>
            <li>
              <a href="my_problem.php?sid=<?php echo $now_uid ?>">
                  <img src="./img/student/krislu.jpg" class="ui-li-icon">
                  我的问题
                  <span class="ui-li-count"><?php echo $my_problem; ?></span>
              </a>
            </li>
            <li>
              <a href="my_answer.php?sid=<?php echo $now_uid ?>">
                <img src="./img/student/krislu.jpg" class="ui-li-icon">
                我的回答
                <span class="ui-li-count"><?php echo $my_answer; ?></span>
              </a>
            </li>
            <li>
              <a href="my_get_good.php">
                <img src="./img/student/krislu.jpg" class="ui-li-icon">
                我收到的赞
                <span class="ui-li-count"><?php echo $user_info['stu_get_good']; ?></span>
              </a>
            </li>
          </ul>
        </div>
        <?php }else {?>
          <div data-role="content">
          <ul data-role="listview" data-inset="true">
          <li>
            <a href="my_problem.php">
                <img src="./img/student/krislu.jpg" class="ui-li-icon">
                TA的问题
                <span class="ui-li-count"><?php echo $my_problem; ?></span>
            </a>
          </li>
          <li>
            <a href="my_answer.php">
              <img src="./img/student/krislu.jpg" class="ui-li-icon">
              TA的回答
              <span class="ui-li-count"><?php echo $my_answer; ?></span>
            </a>
          </li>
          <li>
            <a href="my_get_good.php">
              <img src="./img/student/krislu.jpg" class="ui-li-icon">
              TA收到的赞
              <span class="ui-li-count"><?php echo $user_info['stu_get_good']; ?></span>
            </a>
          </li>
          </ul>
        </div>
        <?php }?>
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
