<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php 
	mysql_select_db($database_tankdb,$tankdb);

	//获取表单数据。
	$title=$_POST['title'];
	$description=$_POST['description'];
	$group=$_POST['group'];
	$check=$_POST['check'];
	$point=$_POST['point'];
	$user=$_SESSION['MM_uid'];
	$role=$_SESSION['MM_role'];


	if($check == "0"){//匿名
		$sql = "insert into gt_problem (problem_from, problem_to, problem_title, problem_description, problem_group, problem_private, problem_time) values ('$user','$point','$title', '$description','$group', 0, now())";
	}else{//非匿名
		$sql = "insert into gt_problem (problem_from, problem_to, problem_title, problem_description, problem_group, problem_time, problem_private) values ('$user','$point','$title', '$description','$group', now(), 1)";
	}
	$rs=mysql_query($sql); //执行sql查询
	$insertId = mysql_insert_id();
	$sql1 = "insert into gt_message (mes_from, mes_from_role, mes_to, mes_to_role, mes_type, mes_pid, mes_time, mes_content) values ('$user','$role','$point', 1, 1,'$insertId', now(), '您被指定回答问题')";
	$rs1=mysql_query($sql1);//将问题插入消息列表
	
	if($rs){
		echo "alert['问题提交成功']";
		header("location:home.php");//跳转过去还在一直运行？不停getmessage.php，不造为啥啊
		exit;
	}else{
		echo "alert['问题提交失败，请重试！']";
}
?>