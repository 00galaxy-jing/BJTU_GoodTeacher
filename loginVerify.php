<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php 

mysql_select_db($database_tankdb,$tankdb);
//获取表单数据。
$username=$_POST['username'];
//echo $username;
$password=$_POST['password'];
//echo $password;
$role=$_POST['role'];

//$pwd=md5($pwd); //本示例仅为测试，未考虑测安全方面， 可以对密码进行md5加密。
if ($role==="学生") {
	$sql="select * from gt_student where stu_name='$username'"; 
	$r="stu_password"; 
}else{
	$sql="select * from gt_teacher where tea_name='$username'";  
	$r="tea_password";
}
//echo $r;
$rs=mysql_query($sql, $tankdb) or die(mysql_error()); //执行sql查询
$num=mysql_num_rows($rs); //获取记录数
		if($num){ // 用户存在；
		   $row=mysql_fetch_array($rs);
		   if($password===$row[$r]){ //对密码进行判断。
			    //echo "登陆成功，正在为你跳转至后台页面";
			    if($role==="学生")
			    {
			    	$_SESSION['MM_uid'] = $row['stu_id'];
			    	$user=$_SESSION['MM_uid'];
			    	$_SESSION['MM_role'] = 2;
			    	$GOTO = "home.php";
			    }
			    else
			    {
			    	$_SESSION['MM_uid'] = $row['tea_id'];
			    	$_SESSION['MM_role'] = 1;
			    	$GOTO = "teacher_home.php";
			    }
		    }else{
				 //echo "密码不正确";
				 //echo "<a href='user_login.php'>返回登陆页面</a>";
				} 
		}else{
		 // echo "用户不存在";
		 	//echo "<a href='user_login.php'>返回登陆页面</a>";
			//header("location:user_login.php");
		}

		//重定向
		// header("Location: ".$GOTO);
		mysql_close($tankdb);
		header("Location: ".$GOTO);
?>