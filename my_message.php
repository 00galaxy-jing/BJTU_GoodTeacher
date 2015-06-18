<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/message_function.php'); ?>

<!--变量初始化部分-->
<?php 
	$now_uid=$_SESSION['MM_uid'];
	$now_role=$_SESSION['MM_role'];
?>

<!--数据库操作部分 -->
<?php 
	$mesRS = get_my_message($now_uid,$now_role);
	//echo $now_role;
	//echo $now_uid;
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
	<div style="height:100px"data-role="header" data-position="fixed" data-fullscreen="false" class="header" id="iheader" data-theme="a">
	      <h3>交大好老师</h3>
	      <div class="ui-field-contain" data-position="fixed">
	        <label for="search"></label>
	        <input type="search" name id="search" data-mini="false" data-clear-btn="true" placeholder="搜索">
	      </div>
    	</div>
        <div id="active_br"></div>        


        <script language="javascript">

        </script>

        

<link rel="stylesheet" href="css/bbslist.css?v=2013013007" type="text/css" />
<div id="main">
	<div class="bbsdata_list">
		<!--列表开始-->
		<?php if(mysql_num_rows($mesRS)==0){ ?>
			<span>没有消息</span>
		<?php }else{ ?>
		<?php while($row_mes=mysql_fetch_assoc($mesRS)){ ?>
				<?php $name = get_name($row_mes['mes_from'],$row_mes['mes_from_role']); ?>

			<table width="100%">
				<tr>
					<!--<td style="padding-top:0px;padding-bottom:3px;width:30%" >
						<img src="images/shouwei/jobs/my.jpg">
					</td>-->
					<p style="text-align:left;font-size:15px;">
						<a href="me_student.php?sid=<?php echo $row_mes['mes_from']; ?>&mes=<?php echo $row_mes['mes_id']; ?> ">
						<span>
							<?php  echo $name; ?> 
						</span></a>
					<span><?php echo $row_mes['mes_content']; ?> </span><span style="float:right"><?php if($row_mes['mes_read']==0) echo "未读"; else echo "已读"; ?> </span></p>
					<p style="text-align:left;font-size:15px;"><a href="question_detail.php?qid=<?php echo $row_mes['mes_pid']; ?>&mes=<?php echo $row_mes['mes_id']; ?>">
					<span>【<?php $pro_name = get_pro($row_mes['mes_pid']); echo $pro_name; ?>】</span></a></p>
					<p style="text-align:left;font-size:15px;"><span><?php echo $row_mes['mes_time']; ?> </span></p>
				</tr>
			</table>	

			
			<div style="width: 100%;
						padding: 1px 0px;
							border-bottom: 2px solid #9D9D9D;">
			</div>

		<?php } ?>
			<?php } ?>
				<!--列表结束-->
	    <div class="clear"></div>
	</div>
			<!--<div id="more" class="mt10">
        <a class="more fl font14 c64"  href="home.html?act=index&page=2">更&nbsp;多</a>
        <p class="clear"></p>
    </div>
		<div class="clear"></div>-->
</div>
<!--尾部-->
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
            <a href="home.php" data-icon="home" class="ui-btn-active"  data-theme="a">动态</a>
          </li>
          <li>
            <a href="hot_recom.php" rel="external" data-icon="star" data-theme="a">发现</a>
          </li>
          <li>
            <a href="question.php" data-icon="edit" data-theme="a">提问</a>
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
            <a data-icon="bars" data-theme="a" id="more_m">更多</a>
          </li>
        </ul>
      </div>
    </div>
</body>
</html> 