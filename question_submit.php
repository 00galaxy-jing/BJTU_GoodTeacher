<?php 

header("content-type:text/html;charset=utf-8");

//连接数据库
$dblink=mysql_connect("localhost","root","") or die("数据库连接失败");

//设置字符串编码
mysql_query("set names utf8");

//选择数据库
mysql_select_db("bjtu_gt");

//获取表单数据。
$title=$_POST['title'];
$description=$_POST['description'];
$group=$_POST['group'];
$check=$_POST['check'];
$user="user";//换成session获取的值

$sql = "insert into gt_problem (problem_title, problem_description, problem_group) values ('$title', '$description','$group')";

if($check==='on'){
	$sql = "insert into gt_problem (problem_title, problem_description, problem_group, problem_private, problem_time) values ('$title', '$description','$group', 1, now())";
}else{
	$sql = "insert into gt_problem (problem_title, problem_description, problem_group, problem_from, problem_time, problem_private) values ('$title', '$description','$group', '$user', now(), 0)";
}
$rs=mysql_query($sql); //执行sql查询
if($rs){
	echo "alert['问题提交成功']";
	header("location:home.php");//正常应该跳转到这个问题的detail
}else{
	echo "alert['问题提交失败，请重试！']";
}
