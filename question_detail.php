<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/question_function.php'); ?>

<!--变量初始化部分-->
<?php 
	$question_id=-1;
	if(isset($_GET['qid'])){
  		$question_id = $_GET['qid'];
	}

	$now_uid = 1;
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
						<td width="80%" style="padding-bottom:0px;padding-right:0px;text-align:left" valign="top">
							<p style="font-size:150%;font-weight:bold;color:#3C3B3B">[<?php echo $row_question['problem_title']; ?>]</p>
									<p class="clear"></p>
							<p style="font-size:120%"><?php echo $row_question['problem_description']; ?></p>
						</td>
						<td style="padding:0px;padding-top:5px;" valign="top">
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
								<td style="width:20%;padding-top:0px;padding-bottom:3px;vertical-align:top;"  > 
									<img src="<?php echo $answer_info['tea_pic']; ?>" width="100%" >
								</td>
								<td  style="height:100%;padding-top:0px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
									<dd>
										<p style="color:rgb(33, 177, 219)"><?php echo $answer_info['tea_name']; ?></p>
											<p><?php echo $answer_info['answer_content']; ?></p>		
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
									<td style="width:20%;padding-top:0px;padding-bottom:3px;vertical-align:top;"  > 
										<img src="<?php echo $row_pro['tea_pic']; ?>" width="100%" >
									</td>
									<td  style="height:100%;padding-top:0px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
										<dd>
											<p style="color:rgb(33, 177, 219)"><?php echo $row_pro['tea_name']; ?></p>
												<p><?php echo $row_pro['answer_content']; ?></p>		
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
									<td style="width:20%;padding-top:0px;padding-bottom:3px;vertical-align:top;"  > 
										<img src="<?php echo $row_answer['stu_pic']; ?>" width="100%" >
									</td>
									<td  style="height:100%;padding-top:0px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
										<dd>
											<p style="color:rgb(33, 177, 219)"><?php echo $row_answer['stu_name']; ?></p>
												<p><?php echo $row_answer['answer_content']; ?></p>		
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
            <a href="home.php" data-icon="home"   data-theme="a">动态</a>
          </li>
          <li>
            <a href="hot_recom.php" rel="external" data-icon="star" data-theme="a">发现</a>
          </li>
          <li>
            <a href="question.php" data-icon="edit" data-theme="a">提问</a>
          </li>
          <li>
            <a href="me.php" data-icon="user" data-theme="a">我</a>
          </li>
          <li>
            <a data-icon="bars" data-theme="a">更多</a>
          </li>
        </ul>
      </div>
    </div>
</body>
</html> 