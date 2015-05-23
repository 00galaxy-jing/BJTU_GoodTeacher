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
  $ProblemRS = get_my_problem($stu_id);
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
  <div id="me" data-role="page">
    <div data-role="header" data-position="fixed" class="header" id="mheader" data-theme="a">
      <h3>交大好老师</h3>
      <button type="button" onClick="javascript:history.go(-1);">返回</button>
    </div>
    <div role="main" class="ui-content">
         <?php while($row_pro = mysql_fetch_array($ProblemRS)) {?>
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
                    <dd>
                      <p style="text-align:left"><span>发起时间：</span>
                      <span><?php echo $row_pro['problem_time']; ?></span></p>
                        <p style="text-align:left">--------------教师回复-------------</p>
                    </dd>
                  </dl>     
                </td>     
              </tr>       
                      <!--<font class="rpy two_num fl">19</font>-->
                      <!--<p style="font-size:150%;font-weight:bold;color:#3C3B3B">[学术组]</p>
                      <p class="clear"></p>-->
                <?php if($row_pro['problem_point_status']==1) {
                         $pro_id=$row_pro['problem_id'];
                         $answer_info = get_answer_info($pro_id);
                 ?>
                <tr>
                  <!--<td style="padding-top:0px;padding-bottom:3px;width:30%" >
                    <img src="images/shouwei/jobs/my.jpg">
                  </td>-->
                  <td style="width:50px;height:100%;padding-top:0px;padding-bottom:3px;vertical-align:top;"  > 
                    <img src="<?php echo $answer_info['tea_pic']; ?>" width="50px" >
                  </td>
                  <td  style="height:100%;padding-top:0px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
                    <dd>
                      <p style="color:rgb(33, 177, 219)"><?php echo $answer_info['tea_name']; ?></p>
                        <p><?php echo $answer_info['answer_content']; ?></p>    
                    </dd>
                  </td> 
                </tr>
              <?php }else {?>
                  <td>
                    <p style="  text-align: left;margin-left:24%">暂无老师回复</p>
                  </td>
              <?php }?>
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
