<?php 

header("content-type:text/html;charset=utf-8");

//连接数据库
$dblink=mysql_connect("localhost","root","") or die("数据库连接失败");

//设置字符串编码
mysql_query("set names utf8");

//选择数据库
mysql_select_db("bjtu_gt");

//获取表单数据。
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

//$pwd=md5($pwd); //本示例仅为测试，未考虑测安全方面， 可以对密码进行md5加密。
echo $role;
if ($role==="学生") {
	$sql="select * from gt_student where stu_name='{$username}'"; 
	$r="stu_password"; 
}else{
	$sql="select * from gt_teacher where tea_name='{$username}'";  
	$r="tea_password";
}
$rs=mysql_query($sql); //执行sql查询
$num=mysql_num_rows($rs); //获取记录数
		if($num){ // 用户存在；
		   $row=mysql_fetch_array($rs);
		   if($password===$row[$r]){ //对密码进行判断。
		    echo "登陆成功，正在为你跳转至后台页面";
		    header("location:home.php");
		    }else{
				echo "密码不正确";
				echo "<a href='user_login.php'>返回登陆页面</a>";
				} 
		}else{
		 echo "用户不存在";
		 echo "<a href='user_login.php'>返回登陆页面</a>";
		}

?>