<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php require_once('function/my_follow_function.php'); ?>

<!--变量初始化部分-->
<?php 
	$now_uid=$_SESSION['MM_uid'];
	$now_role=$_SESSION['MM_role'];
?>

<!--数据库操作部分 -->
<?php 
	$stu_follow = get_my_follow($now_uid);
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
	<div data-role="header" data-position="fixed" data-fullscreen="false" class="header" id="iheader" data-theme="a">
	      <h3>交大好老师</h3>
    	</div>
        <div id="active_br"></div>        

        <style>

        

        #link img{ max-width: 100%;}

        #oTop img{ max-width: 100%;}

        #oTop{width:100%; position:relative;}

        #oLink1{ position:absolute; top:0px; left:0px; width:14%; height:35%;}

        #oLink2{ position:absolute; top:0px; right:0px; width:86%; height:100%;}

        .nav a{width:50%;}

        .nav a.last{

                border-right:none;}

        

        </style>

        <script language="javascript">

	        

		var ua = navigator.userAgent,

		isIphone = /iPhone/.test(ua),

		isIpad = /iPad/.test(ua),

		isSafari = /Version/i.test(ua),

	    version = /OS[7-9](_\d+){2}/i.test(ua),<!--/OS [7-9]_\d[_\d]/i.test(ua)-->

		isAndroid = /Android/i.test(ua) || /Linux/.test(ua);

		isMobile = /AppleWebKit.*Mobile.*/.test(ua); //是否是移动终端

		



		if(isIphone && !isIpad && !isSafari && version){

				var oLink = document.createElement('a');				

				oLink.id='link';

				oLink.style.width="100%";

				oLink.href='../um0.cn/8MCBM/default.htm';

				oLink.innerHTML = '<img width="640" src="images/shouwei/WAP-IOS.jpg">';

				var logo = document.getElementById('top');

				document.body.insertBefore(oLink,logo);

		}

		if(isMobile && isAndroid && !isIpad){

			var oTop = document.createElement('div');

			oTop.id = 'oTop';

			active_br.innerHTML = '<a href="../www.wandoujia.com/apps/com.paidai.jinghua"><img style="width:100%; max-width:100%" src="image/WAP-Android-new.jpg"></a><a href="javascript:;" id="oLink1"></a>';

			document.getElementById('oLink1').onclick = function(){

				active_br.style.display = 'none';

			}

		}

	

        </script>

        

    <div class="nav">
	<a class="c96 font14 fl nav_list b25" href="home.php" style="color:black;font-weight:500" title="我的兴趣">我的兴趣</a>
	<a class="black bold c96 font14 fl nav_list b25" href="home_follow.php" style="color:black;" title="我的关注">我的关注</a>


	<p class="clear"></p>

</div>

<link rel="stylesheet" href="css/bbslist.css?v=2013013007" type="text/css" />
<div id="main">
	<div class="bbsdata_list">
		<!--列表开始-->

		<?php while($row_follow=mysql_fetch_assoc($stu_follow)){ ?>

			<table width="100%">
				<tr>
					<td  style="height:100%;padding-top:5px;padding-bottom:3px;font-size:13px;color:#898989;text-align:left;vertical-align:top">
						<dd>
							<span style="color:rgb(33, 177, 219)"><?php echo $row_follow['tea_name']; ?></span>&nbsp
							<span style="font-weight:bold;color:rgb(56, 55, 55)">回答了问题</span>
							<a href="question_detail.php?qid=<?php echo $row_follow['problem_id'] ?>">
								<p style="font-size:15px;color:rgb(56, 55, 55);font-weight:bold"><?php echo $row_follow['problem_title']; ?></p>
							</a>
							<div style="width: 100%;
										padding: 0px 0px;
										border-bottom: 1px solid #dcdcdc;">
							</div>
							<p>回复： <?php echo $row_follow['answer_content']; ?></p>		
						</dd>
					</td>
					<td style="width:50px;height:100%;padding-top:8px;padding-bottom:3px;vertical-align:top;"  > 
						<a href="me_teacher.php?tid=<?php echo $row_follow['tea_id']; ?> "><img src="<?php echo $row_follow['tea_pic']; ?>" width="50px" >
					    </a>
					</td>	
				</tr>
			</table>	

			
			<div style="width: 100%;
						padding: 1px 0px;
							border-bottom: 2px solid #9D9D9D;">
			</div>

		<?php } ?>
				
				<!--列表结束-->
	    <div class="clear"></div>
	</div>
</div>
<!--尾部-->
<div id="foot">
			<p style="font-size: 9px;text-align:center">Copyright ©2015 BJTU</p>
	<div class="foot_right fr" style="margin-right: 2%;">
		<a class="font13 fr c64 to_top" title="回顶部" href="#top">顶部</a>
	</div>
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
            <a data-icon="bars" data-theme="a" id="more_m">消息</a>
          </li>
        </ul>
      </div>
    </div>
</body>
</html> 