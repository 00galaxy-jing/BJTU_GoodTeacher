<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/group_function.php'); ?>
<?php require_once('function/teacher_function.php'); ?>

<!DOCTYPE html>
<html>

<head> 
  <?php require('header.php');?>
  <script language="javascript">
    if (top.location != location) top.location.href = location.href;
  </script>
</head>

<body>
  <!-- Page: question  -->
  <?php 
      $GroupRS = get_all_group();
      $TeacherRS = get_all_teachers();
   ?>
  <div id="question" data-role="page">
    <div data-role="header" data-position="fixed" id="qheader" class="header">
      <h3>交大好老师</h3>
    </div>
    <div role="main" class="ui-content">
      <form action="question_submit.php" method="post">
          <div class="ui-field-contain">
            <label for="title" class>标题</label>
            <input type="text" name="title" id="title" placeholder="（标题不超过30字）" data-theme="a" data-prevent-focus-zoom="true" data-mini="true">
          </div>
          <div class="ui-field-contain">
            <label for="description">问题描述</label>
            <textarea id="description" name="description" placeholder="（不少于50字）"></textarea>
          </div>
          <div class="ui-field-contain">
            <label for="group">问题分类</label>
            <select name = "group" id="group">
              <?php while($row=mysql_fetch_assoc($GroupRS)){ ?>
                <option value="<?php echo $row['group_id']; ?>"><?php echo $row['group_name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="ui-field-contain">
            <label for="group">指定教师回答</label>
            <select name = "point" id="point">
              <option value="0"><?php echo ""; ?></option>
              <?php while($row1=mysql_fetch_assoc($TeacherRS)){ ?>
                <option value="<?php echo $row1['tea_id']; ?>"><?php echo $row1['tea_name']; ?></option>
                <!--<?php while($row=mysql_fetch_assoc($GroupRS)){ ?>
                    <option value="<?php echo $row['group_id']; ?>"><?php echo $row['group_name']; ?></option>
                <?php } ?>-->
              <?php } ?>
            </select>
          </div>
          <div class="ui-grid-a" style="height:60px">
            <div class="ui-block-a" style="height:100%">
              <input id="check" name="check" type="checkbox" value="0">
              <label for="check">匿名</label>
            </div>
            <div class="ui-block-b" style="height:100%">
              <button type="submit" style="  margin-top: 5px;">提交问题</button>
            </div>
          </div>
          <div class="ui-field-contain" id="cancel">
              <a href="home.php" rel="external" class="ui-btn">取消</a>
          </div>
      </form>
    </div>
  </div>
</body>

</html>
