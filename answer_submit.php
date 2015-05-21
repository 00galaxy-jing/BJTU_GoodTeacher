<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php
    //$version = "1.3.3b";
    echo "1";
    //$maxRows = 30;
    //$tasklevel = 0;
    mysql_select_db($database_tankdb,$tankdb);
    echo "1";
    //这都是要从session取值的
    $now_user=1;//id
    $now_type=1;//类型为老师

    $problem_id = $_GET['qid'];
    echo $problem_id;
    $problem_to = $_GET['pto'];
    echo $problem_to;
    $ans_content = $_POST['ans_content'];

    $point_status = 0;
    $answer_role = 0;
    $now_time = date('Y-m-d H:i:s',time());
    echo "1";

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
    echo "1";

      $insert_answer="INSERT INTO gt_answer(answer_pid,answer_role,answer_user,answer_content,answer_point_status,answer_time) VALUES($problem_id,$answer_role,$now_user,'$ans_content',$point_status,'$now_time')";
      $insert_answerRS = mysql_query($insert_answer, $tankdb) or die(mysql_error());
      echo "1";
      $update_problem="UPDATE gt_problem SET problem_answer=problem_answer+1 AND problem_point_status=$point_status WHERE problem_id=$problem_id";
      $updateRS = mysql_query($update_problem, $tankdb) or die(mysql_error());
      echo "1";

      header("location:question_detail.php?qid=$problem_id");
?>