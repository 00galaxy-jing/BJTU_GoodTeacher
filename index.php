<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>

<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head> 
	<?php require('header.php');?>
	<script language="javascript">
		if (top.location != location) top.location.href = location.href;
	</script>
</head>

<body>

<div data-role="page">

	<div style="height:50px"data-role="header" data-position="fixed" data-fullscreen="false" class="header" id="iheader" data-theme="a">
	      <h3>交大好老师</h3>
    </div>
	<div id="active_br"></div>

	<div data-role="content">
		
		<form action="loginVerify.php" method="post">
			
			<div data-role="fieldcontain">
			    <label for="username">用户名</label>
			    <input type="text" name="username" id="username" value=""  />
			</div>	

			<div data-role="fieldcontain">
			    <label for="password">密码</label>
			    <input type="password" name="password" id="password" value=""  />
			</div>	
			
			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup">
					<legend>身份</legend>

					<input type="radio" name="role" id="teacher" value="老师">
					<label for="teacher">老师</label> 

					<input type="radio" name="role" id="student" value="学生">
					<label for="student">学生</label> 
				</fieldset>
			</div>	

			<div data-role="fieldcontain">
			    <input type="submit" name="submit"  data-theme="b" value="登录"  />
			</div>	
		
		</form>

	</div>

</div>

</body>
</html>