<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/student_function.php'); ?>

<?php 
  //初始化
  $stu_id = -1;
  if(isset($_GET['sid'])){
        $stu_id = $_GET['sid'];
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
          <div style="  font-family: cursive;font-size: 20px;"><?php echo $user_info['stu_name']; ?></div>
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
          <div data-role="content" id="me_quick_access" name = "me_quick_access">
            <ul data-role="listview" data-inset="true">
              <li data-role="list-divider">我</li>
              <li>我关注的分组<span class="ui-li-count"><?php echo $my_interest; ?></span></li>
              <li>我关注的老师<span class="ui-li-count"><?php echo $my_follow; ?></span></li>
              <li>我的问题<span class="ui-li-count"><?php echo $my_problem; ?></span></li>
              <li>我的回答<span class="ui-li-count"><?php echo $my_answer; ?></span></li>
              <li>我收到的赞<span class="ui-li-count"><?php echo $user_info['stu_get_good']; ?></span></li>
            </ul>
          </div>
        <?php }else {?>
          <div data-role="content" id="me_quick_access" name = "me_quick_access">
            <ul data-role="listview" data-inset="true">
              <li data-role="list-divider">TA</li>
              <li>TA的问题<span class="ui-li-count"><?php echo $my_problem; ?></span></li>
              <li>TA的回答<span class="ui-li-count"><?php echo $my_answer; ?></span></li>
              <li>TA收到的赞<span class="ui-li-count"><?php echo $user_info['stu_get_good']; ?></span></li>
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
            <a href="me_student.php?sid=<?php echo $now_uid ?>" data-icon="user" data-theme="a" class="ui-btn-active">我</a>
          </li>
          <li>
            <a data-icon="bars" data-theme="a">更多</a>
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
