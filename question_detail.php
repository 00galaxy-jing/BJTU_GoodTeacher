<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/question_function.php'); ?>
<?php require_once('function/message_function.php'); ?>

<!--变量初始化部分-->
<?php 
	$question_id=-1;
	if(isset($_GET['qid'])){
  		$question_id = $_GET['qid'];
	}
	$mes = -1;
  	if(isset($_GET['mes'])){
        $mes = $_GET['mes'];
        set_read($mes);
    }

	$now_uid=$_SESSION['MM_uid'];
	$now_role=$_SESSION['MM_role'];
?>

<!--数据库操作部分-->
<?php 
	$question_info = get_question_info($question_id);
	$row_question = mysql_fetch_assoc($question_info);
?> 

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
<style type="text/css">
		#reply_button{
			padding: 5px;
			margin: 5px 0px 8px;
			width: 100%;
		}
		#reply_submit{
			padding: 5px;
			margin: 0px 5% 0px;
			width: 95%;
			background-color: rgb(79, 141, 255);
  			text-shadow: none;
		}
		#esc_btn{
			padding: 5px;
			margin: 0px 5% 0px 0px;
			width: 95%;
		}
	</style>
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

			setTimeout("get_data()",3000);//1秒一次执行
		</script> 

	<script type="text/javascript">
		function reply_modal()
		{
			document.getElementById("reply_button").style.display="none";
			document.getElementById("reply_context").style.display="";
		}
		function reply_close()
		{
			document.getElementById("reply_button").style.display="";
			document.getElementById("reply_context").style.display="none";
		}
		function set_good(aid,uid,urole)
		{
			$.ajax( {
                        type: "post",
                        url : "set_good.php",
                        data: {"aid":aid,"uid":uid,"urole":urole},
                        success: function(data){//如果调用php成功,data为执行php文件后的返回值
	                        if(data == 1);
	                        else;
                        }
                 });
			//window.location.reload(true);
			//window.location.href="group_view.php?gid="+gid;
			history.go(0);
		}
		function del_good(aid,uid,urole)
		{
			$.ajax( {
                        type: "post",
                        url : "del_good.php",
                        data: {"aid":aid,"uid":uid,"urole":urole},
                        success: function(data){//如果调用php成功,data为执行php文件后的返回值
	                        if(data == 1);
	                        else;
                        }
                 });
			//window.location.reload(true);
			//window.location.href="group_view.php?gid="+gid;
			history.go(0);
		}
	</script>	
	<div style="height:40px"data-role="header" data-position="fixed" data-fullscreen="false" class="header" id="iheader" data-theme="a">
	      <button type="button" onClick="javascript:history.go(-1);">返回</button>
	      <h3>交大好老师</h3>
    </div>

	<link rel="stylesheet" href="css/bbslist.css?v=2013013007" type="text/css" />
	
	<div id="main" style="padding-top:10px">
		<div >
			<div style="border:1px solid rgb(219, 219, 219);padding-top:-5px;">
				<table width="100%">
						<tr>
							<td  style="padding-bottom:0px;padding-right:0px;text-align:left" valign="top">
								<p style="font-size:150%;font-weight:bold;color:#3C3B3B">[<?php echo $row_question['problem_title']; ?>]</p>
										<p class="clear"></p>
								<p style="font-size:120%"><?php echo $row_question['problem_description']; ?></p>
							</td>
							<td width="60px" style="padding:0px;padding-right:3px;padding-top:5px;" valign="top">
								<a href=""><img src="<?php echo $row_question['stu_pic']; ?>" width="100%"  ></a>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<dl style="padding-top:0px">
									<dd class="bbsdata_info">
										<div style="width: 100%;padding: 1px 0px;padding-bottom:0px;border-bottom: 1px dashed #B3B3B3;" ></div>
										<p style="padding-top:5px"><span >兴趣组：<a href="group_view.php?gid=<?php echo $row_question['group_id']; ?> " > <?php echo $row_question['group_name']; ?></a></span></p>				
										<p><span >问题来自： <a href="" style="color:rgb(33, 177, 219); font-weight:300"> <?php echo $row_question['stu_name']; ?></a></span></p>
										<p><span >指定教师： <a href="" style="color:rgb(33, 177, 219); font-weight:300"><?php echo $row_question['tea_name']; ?></a></span></p>
										<p><span >发起时间： <?php echo $row_question['problem_time']; ?></span></p>
									</dd>
								</dl>
							</td>
						</tr>
				</table> 
			</div>
			<button type="button" id="reply_button" onclick="reply_modal()">回     复</button>
				<form action="answer_submit.php?qid=<?php echo $row_question['problem_id'];?>&pto=<?php echo $row_question['problem_to']; ?>"  method="post" name="form1" id="form1">
					<div id="reply_context" style="display:none;">
						<textarea id="ans_content" name="ans_content" style="width:100%;"></textarea>
						<table width="100%">
							<tr>
								<td width="50%" style="padding:0px">
									<button type="button" id="esc_btn" onclick="reply_close()">取     消</button>
								</td>
								<td style="padding:0px">
									<button type="submit" id="reply_submit">提     交</button>
								</td>
							</tr>					
						</table>
					</div>
				</form>

			<!--列表开始-->
			<div class="bbsdata_list" style="padding-top:5px;padding-bottom:5px;" >

				<?php if($row_question['problem_point_status']==1) {
				    	       $pro_id=$row_question['problem_id'];
				    	       $answer_info = get_answer_info($pro_id);
				     ?>
				<div style="border:1px solid rgb(219, 219, 219);padding-top:-5px;">
					<table width="100%">
							<tr >
								<td colspan="2" style="padding:5px;padding-top:0px;">
									<p style="color:rgb(152, 152, 152);text-align:left;padding:5px;padding-bottom:0px;">指定教师回复</p>
									<div style="width: 100%;padding: 1px 0px;padding-bottom:0px;border-bottom: 1px dashed #B3B3B3;" ></div>
								</td>
							</tr>
							<tr>
								<td style="width:60px;padding-top:0px;padding-bottom:3px;vertical-align:top;"  > 
									<a href="me_teacher.php?tid=<?php echo $answer_info['tea_id']; ?> "><img src="<?php echo $answer_info['tea_pic']; ?>" width="100%" >
									</a>
								</td>
								<td  style="height:100%;padding-top:0px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
									<dd>
										<p style="color:rgb(33, 177, 219)"><?php echo $answer_info['tea_name']; ?></p>
											<p><?php echo $answer_info['answer_content']; ?></p>	
											<div style="  width: 50px;float: right;">
												<span> <?php echo $answer_info['answer_good']; ?></span>&nbsp
												<?php if(is_good($answer_info['answer_id'],$now_uid,$now_role) == 0){ ?>
													<button type="button" onclick="set_good(<?php echo $answer_info['answer_id']; ?>,<?php echo $now_uid; ?>,<?php echo $now_role; ?>)" style="background:url(image/jobs/no_good.png) no-repeat;  width: 24px;height: 20px;padding: 3px;border: 0px;box-shadow: none;margin: 0px;display: -webkit-inline-box;"></button>
												<?php }else {?>
													<button type="button" onclick="del_good(<?php echo $answer_info['answer_id']; ?>,<?php echo $now_uid; ?>,<?php echo $now_role; ?>)" style="background:url(image/jobs/good.png) no-repeat;  width: 24px;height: 20px;padding: 3px;border: 0px;box-shadow: none;margin: 0px;display: -webkit-inline-box;"></button>
												<?php } ?>
											</div>	
									</dd>
								</td>
							</tr>
					</table>
				</div>
				<?php }?>

					<?php 
						$other_tea_answerRS = get_other_teacher_answer($question_id);
						if(mysql_num_rows($other_tea_answerRS)>0){
					?>
					
					<div style="border:1px solid rgb(219, 219, 219);  margin-top: 5px;">
					
						<table width="100%">
								<tr >
									<td colspan="2" style="padding:5px;padding-top:0px;">
										<p style="color:rgb(152, 152, 152);text-align:left;padding:5px;padding-bottom:0px;">其他教师回复</p>
										<div style="width: 100%;padding: 1px 0px;padding-bottom:0px;border-bottom: 1px dashed #B3B3B3;" ></div>
									</td>
								</tr>
								<?php while($row_pro = mysql_fetch_assoc($other_tea_answerRS)) {?>
								<tr>
									<td style="width:60px;padding-top:0px;padding-bottom:3px;vertical-align:top;"  > 
										<a href="me_teacher.php?tid=<?php echo $row_pro['tea_id']; ?> "><img src="<?php echo $row_pro['tea_pic']; ?>" width="100%" >
										</a>
									</td>
									<td  style="height:100%;padding-top:0px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
										<dd>
											<p style="color:rgb(33, 177, 219)"><?php echo $row_pro['tea_name']; ?></p>
												<p><?php echo $row_pro['answer_content']; ?></p>	
												<div style="  width: 50px;float: right;">
													<span> <?php echo $row_pro['answer_good']; ?></span>&nbsp
													<?php if(is_good($row_pro['answer_id'],$now_uid,$now_role) == 0){ ?>
														<button type="button" onclick="set_good(<?php echo $row_pro['answer_id']; ?>,<?php echo $now_uid; ?>,<?php echo $now_role; ?>)" style="background:url(image/jobs/no_good.png) no-repeat;  width: 24px;height: 20px;padding: 3px;border: 0px;box-shadow: none;margin: 0px;display: -webkit-inline-box;"></button>
													<?php }else {?>
														<button type="button" onclick="del_good(<?php echo $row_pro['answer_id']; ?>,<?php echo $now_uid; ?>,<?php echo $now_role; ?>)" style="background:url(image/jobs/good.png) no-repeat;  width: 24px;height: 20px;padding: 3px;border: 0px;box-shadow: none;margin: 0px;display: -webkit-inline-box;"></button>
													<?php } ?>
											</div>	
										</dd>
									</td>
								</tr>
								<tr>
									<td colspan="2"><div style="width: 100%;
									padding: 1px 0px;
										border-bottom: 1px solid #dcdcdc;">
									</div></td>
								</tr>
								<?php } ?>
						</table>
						
						
					</div><?php } ?>

					<?php 
						$student_answerRS = get_student_answer($question_id);
						if(mysql_num_rows($student_answerRS)>0){
					?>
					
					<div style="border:1px solid rgb(219, 219, 219);  margin-top: 5px;">
						<table width="100%">
								<tr >
									<td colspan="2" style="padding:5px;padding-top:0px;">
										<p style="color:rgb(152, 152, 152);text-align:left;padding:5px;padding-bottom:0px;">其他同学回复</p>
										<div style="width: 100%;padding: 1px 0px;padding-bottom:0px;border-bottom: 1px dashed #B3B3B3;" ></div>
									</td>
								</tr>
								<?php while($row_answer = mysql_fetch_assoc($student_answerRS)) {?>
								<tr>
									<td style="width:60px;padding-top:0px;padding-bottom:3px;vertical-align:top;"  > 
										<a href="me_student.php?sid=<?php echo $row_answer['stu_id']; ?> "><img src="<?php echo $row_answer['stu_pic']; ?>" width="100%" >
										</a>
									</td>
									<td  style="height:100%;padding-top:0px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
										<dd>
											<p style="color:rgb(33, 177, 219)"><?php echo $row_answer['stu_name']; ?></p>
												<p><?php echo $row_answer['answer_content']; ?></p>	
												<div style="  width: 50px;float: right;">
													<span> <?php echo $row_answer['answer_good']; ?></span>&nbsp
													<?php if(is_good($row_answer['answer_id'],$now_uid,$now_role) == 0){ ?>
														<button type="button" onclick="set_good(<?php echo $row_answer['answer_id']; ?>,<?php echo $now_uid; ?>,<?php echo $now_role; ?>)" style="background:url(image/jobs/no_good.png) no-repeat;  width: 24px;height: 20px;padding: 3px;border: 0px;box-shadow: none;margin: 0px;display: -webkit-inline-box;"></button>
													<?php }else {?>
														<button type="button" onclick="del_good(<?php echo $row_answer['answer_id']; ?>,<?php echo $now_uid; ?>,<?php echo $now_role; ?>)" style="background:url(image/jobs/good.png) no-repeat;  width: 24px;height: 20px;padding: 3px;border: 0px;box-shadow: none;margin: 0px;display: -webkit-inline-box;"></button>
													<?php } ?>
											</div>	
										</dd>
									</td>
									
								</tr>
								<tr>
									<td colspan="2" style="padding:0px;" ><div style="width: 100%;
									padding: 1px 0px;
										border-bottom: 1px solid #dcdcdc;">
									</div></td>
								</tr>
								<?php } ?>
						</table>
					</div><?php } ?>
			</div>

		</div>
	</div>

	<div id="foot">
		<!--<a class="font13  mr12 c64" title="电脑版" href="../www.paidai.com/?id=1_2F">电脑版</a>
		<a class="font13  mr12 c64" title="触屏版" href="shouji">触屏版</a>
        		<a href="login.html" title="登录" class="font13 mr12 c64">登&nbsp;录</a>-->
			<p style="font-size: 9px;text-align:center">Copyright ©2015 BJTU</p>
	</div>

<!-- 底下的固定菜单栏-->
    <div data-position="fixed" data-role="footer" data-id="footernav">
      <div data-role="navbar" data-position="fixed">
        <ul>
          <li>
           <?php if($now_type == 2) {?>
            	<a href="home.php" data-icon="home"  data-theme="a">动态</a>
            <?php } else {?>
            	<a href="teacher_home.php" data-icon="home"  data-theme="a">动态</a>
            <?php }?>
          </li>
          <li>
            <a href="hot_recom.php" rel="external" data-icon="star" data-theme="a">发现</a>
          </li>
          <li>
            <?php if($now_type == 2) {?>
           		<a href="question.php" data-icon="edit" data-theme="a">提问</a>
           	<?php } else {?>
           		<a href="teacher_need_me.php" data-icon="edit"  data-theme="a">回答</a>
           	<?php }?>
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
            <a href="my_message.php" data-icon="bars" data-theme="a" id="more_m">消息</a>
          </li>
        </ul>
      </div>
    </div>
</body>
</html> 