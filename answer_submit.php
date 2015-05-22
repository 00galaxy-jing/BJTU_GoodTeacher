<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php
    //$version = "1.3.3b";
    //$maxRows = 30;
    //$tasklevel = 0;
    mysql_select_db($database_tankdb,$tankdb);
    //这都是要从session取值的
    $now_user=$_SESSION['MM_uid'];
    $now_type=$_SESSION['MM_role'];

    $problem_id = $_GET['qid'];
    $problem_to = $_GET['pto'];
    $ans_content = $_POST['ans_content'];

    $point_status = 0;
    $answer_role = 0;
    $now_time = date('Y-m-d H:i:s',time());

    if($now_type == 1)//是老师回答的问题
    {
      $answer_role=1;
      if($problem_to == $now_user)
      { 
        $point_status = 1;
      }
    }else{//学生回答
      $answer_role=2;
    }


      $insert_answer="INSERT INTO gt_answer(answer_pid,answer_role,answer_user,answer_content,answer_point_status,answer_time) VALUES($problem_id,$answer_role,$now_user,'$ans_content',$point_status,'$now_time')";
      $insert_answerRS = mysql_query($insert_answer, $tankdb) or die(mysql_error());

      $update_problem="UPDATE gt_problem SET problem_answer=problem_answer+1 ,problem_point_status=$point_status WHERE problem_id=$problem_id";
      $updateRS = mysql_query($update_problem, $tankdb) or die(mysql_error());

      $selProblem="SELECT * FROM gt_problem WHERE problem_id=$problem_id";
      $selRS = mysql_query($selProblem, $tankdb) or die(mysql_error());
      $proInfo = mysql_fetch_assoc($selRS);
      $proFrom = $proInfo['problem_from'];

      // if($now_type==2)
      // {
      //   $selUser = "SELECT * FROM gt_student WHERE stu_id=$now_user";
      //   $userRS = mysql_query($selUser, $tankdb) or die(mysql_error());
      //   $userInfo = mysql_fetch_array($userRS);
      //   $userName = $userInfo['stu_name'];
      // }
      // else
      // {
      //   $selUser = "SELECT * FROM gt_teacher WHERE tea_id=$now_user";
      //   $userRS = mysql_query($selUser, $tankdb) or die(mysql_error());
      //   $userInfo = mysql_fetch_array($userRS);
      //   $userName = $userInfo['tea_name'];
      // }
      // echo $userName;

      $mes_con="回答了您的问题";
      $insert_mess="INSERT INTO gt_message(mes_from,mes_from_role,mes_to,mes_to_role,mes_type,mes_pid,mes_time,mes_content)
                    VALUES($now_user,$now_type,$proFrom,2,2,$problem_id,'$now_time','$mes_con')";
      $messRS = mysql_query($insert_mess, $tankdb) or die(mysql_error());

      header("location:question_detail.php?qid=$problem_id");
?>