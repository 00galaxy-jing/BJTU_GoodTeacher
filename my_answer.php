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
  
  echo $stu_id;
  //调用function
  $user_info = get_student_info($stu_id);
  $AnswerRS = get_my_answer($stu_id);
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
      <button type="button" onClick="javascript:history.go(-1);">返回</button>
      <h3>交大好老师</h3>
    </div>
    <div role="main" class="ui-content">
         <?php while($row_pro = mysql_fetch_array($AnswerRS)) {?>
          <div style="border-left:1px solid rgb(219, 219, 219);border-right:1px solid rgb(219, 219, 219);">
            <table width="100%" >
              <tr>
                <td style="padding-bottom:0px"  colspan="2" >
                <!--<img src="images/shouwei/jobs/my.jpg" width="70%">-->
                  <dl style="padding:3px">
                    <dt>
                      <a href="question_detail.php?qid=<?php echo $row_pro['problem_id']; ?>">
                        <p style="font-size:15px;color:rgb(8, 150, 211);font-weight:bold"><?php echo $row_pro['problem_title']; ?></p>
                      </a>
                    </dt>
                  </dl>     
                </td>     
              </tr>       
            </table>  
          </div>
          <div style="width: 100%;
                padding: 1px 0px;
                  border-bottom: 1px solid #dcdcdc;">
          </div>
        <?php } ?>
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
</body>

</html>
