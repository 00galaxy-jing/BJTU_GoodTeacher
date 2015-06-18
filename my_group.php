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
  $GroupRS = get_my_group($stu_id);
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
      <h3>交大好老师</h3>
      <button type="button" onClick="javascript:history.go(-1);">返回</button>
    </div>
    <div role="main" class="ui-content">
        <?php while($group_info = mysql_fetch_array($GroupRS)) {?>
         <table width="100%">
          <tr>
            <td style="width:80px;height:100%" > 
              <img src="<?php echo $group_info['group_pic']; ?>" width="80px"  >
            </td>
            <td>
              <dl>
                <dt>
                  <p style="font-size:150%;font-weight:bold;color:#3C3B3B">[<?php echo $group_info['group_name']; ?>]</p>
                  <p class="clear"></p>
                </dt>
                <dd class="bbsdata_info">
                  <p style="font-size:120%"><?php echo $group_info['group_description']; ?></p>
                  <p><span >老师：<?php echo $group_info['group_tnum']; ?></span>&nbsp&nbsp&nbsp&nbsp&nbsp<span style="color:rgb(82, 179, 202);">查看所有老师</span></p>       
                  <p>
                  <span id="have_int">感兴趣：<?php echo get_group_snum($now_groupid); ?></span>&nbsp&nbsp&nbsp&nbsp&nbsp
                  <?php if($now_role==2){ ?>
                    <?php if(is_interest($group_info['group_id'],$now_uid)==0){ ?>
                      <button type="button" onclick="add_int(<?php echo $group_info['group_id']; ?>,<?php echo $now_uid; ?>)" style="  margin: 0px;border: 0px;padding: 0px;width: 50px;display:-webkit-inline-box;  font-size: 13px;font-family: 微软雅黑;background-color:rgb(54, 170, 253);text-shadow:none">关注</button></p>
                    <?php }else{ ?>
                      <button type="button" onclick="del_int(<?php echo $group_info['group_id']; ?>,<?php echo $now_uid; ?>)" style="  margin: 0px;border: 0px;padding: 0px;width: 70px;display:-webkit-inline-box;  font-size: 13px;font-family: 微软雅黑;background-color:rgb(54, 170, 253);text-shadow:none">取消关注</button></p>
                    <?php } ?>
                  <?php } ?>
                </dd>
              </dl>
            </td>
          </tr>

      </table>
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
            <a href="my_message.php" data-icon="bars" data-theme="a" id="more_m">更多</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</body>

</html>
