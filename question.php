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
            <textarea id="description" name="description" placeholder="（不少于50字）">
            </textarea>
          </div>
          <div class="ui-field-contain">
            <label for="group">问题分类</label>
            <select name = "group" id="group">
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
              <option value="4">Option 4</option>
            </select>
          </div>
          <div class="ui-grid-a" style="height:60px">
            <div class="ui-block-a" style="height:100%">
              <input id="check" name="check" type="checkbox">
              <label for="check">Check</label>
            </div>
            <div class="ui-block-b" style="height:100%">
              <button type="submit">提交问题</button>
            </div>
          </div>
          <div class="ui-field-contain" id="cancel">
            <button type="submit" href="home.php" rel="external">提交问题</button>
              <!-- <a href="home.php" rel="external" class="ui-btn">取消</a> -->
          </div>
      </form>
    </div>
  </div>
</body>

</html>
