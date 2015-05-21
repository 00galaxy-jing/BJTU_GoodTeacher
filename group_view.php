<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/group_function.php'); ?>

<!--变量初始化部分-->
<?php 
	$now_groupid=-1;
	if(isset($_GET['gid'])){
  		$now_groupid = $_GET['gid'];
	}

	$now_uid = 1;
?>

<!--数据库操作部分-->
<?php 
	$group_infoRS = get_group_info($now_groupid);
	$group_info = mysql_fetch_array($group_infoRS);
	$problem_infoRS = get_pro_info($now_groupid);
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
	
	<div id="main">
		<div class="bbsdata_list">
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
									<span >感兴趣：<?php echo $group_info['group_snum']; ?></span>			
								</dd>
							</dl>
						</td>
					</tr>

			</table>
			<div style="width: 100%;
							padding: 1px 0px;
								border-bottom: 1px solid #dcdcdc;">
			</div>

			<!--列表开始-->
			<?php while($row_pro = mysql_fetch_assoc($problem_infoRS)) {?>
			<div style="border-left:1px solid rgb(219, 219, 219);border-right:1px solid rgb(219, 219, 219);">
				<table width="100%" >
					<tr>
						<td style="padding-bottom:0px"  colspan="2" >
						<!--<img src="images/shouwei/jobs/my.jpg" width="70%">-->
							<dl style="padding:3px">
								<dt>
									<a href="question_detail.php?qid=<?php echo $row_pro['problem_id']; ?>">
										<p style="font-size:15px;color:rgb(8, 150, 211);font-weight:bold"><?php echo $row_pro['problem_title']; ?></p>
									</a>
								</dt>
								<dd>
									<p style="text-align:left"><span>发起时间：</span>
									<span><?php echo $row_pro['problem_time']; ?></span></p>
										<p style="text-align:left">--------------教师回复-------------</p>
								</dd>
							</dl>			
						</td>			
					</tr>				
									<!--<font class="rpy two_num fl">19</font>-->
									<!--<p style="font-size:150%;font-weight:bold;color:#3C3B3B">[学术组]</p>
									<p class="clear"></p>-->
				    <?php if($row_pro['problem_point_status']==1) {
				    	       $pro_id=$row_pro['problem_id'];
				    	       $answer_info = get_answer_info($pro_id);
				     ?>
						<tr>
							<!--<td style="padding-top:0px;padding-bottom:3px;width:30%" >
								<img src="images/shouwei/jobs/my.jpg">
							</td>-->
							<td style="width:50px;height:100%;padding-top:0px;padding-bottom:3px;vertical-align:top;"  > 
								<img src="<?php echo $answer_info['tea_pic']; ?>" width="50px" >
							</td>
							<td  style="height:100%;padding-top:0px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
								<dd>
									<p style="color:rgb(33, 177, 219)"><?php echo $answer_info['tea_name']; ?></p>
										<p><?php echo $answer_info['answer_content']; ?></p>		
								</dd>
							</td>	
						</tr>
					<?php }else {?>
							<td>
								<p style="  text-align: left;margin-left:24%">暂无老师回复</p>
							</td>
					<?php }?>
				</table>	
			</div>

				
				<div style="width: 100%;
							padding: 1px 0px;
								border-bottom: 1px solid #dcdcdc;">
				</div>

				<?php } ?>

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
            <a href="me_student.php?sid=<?php echo $now_uid ?>" data-icon="user" data-theme="a">我</a>
          </li>
          <li>
            <a data-icon="bars" data-theme="a">更多</a>
          </li>
        </ul>
      </div>
    </div>
</body>
</html> 