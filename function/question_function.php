<?php
    $version = "1.3.3b";
    //$maxRows = 30;
    //$tasklevel = 0;
    mysql_select_db($database_tankdb,$tankdb);

    if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
    {
      if (PHP_VERSION < 6) {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
      }

      $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

      switch ($theType) {
        case "text":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;    
        case "long":
        case "int":
          $theValue = ($theValue != "") ? intval($theValue) : "NULL";
          break;
        case "double":
          $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
          break;
        case "date":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "defined":
          $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
          break;
      }
      return $theValue;
    }
}

//获取问题详情
function get_question_info($qid){

  global $tankdb;

  $selQuestion="SELECT * FROM gt_problem,gt_group,gt_student,gt_teacher WHERE problem_id=$qid AND problem_group=group_id AND problem_from=stu_id AND problem_to=tea_id";
  $QuestionRS = mysql_query($selQuestion, $tankdb) or die(mysql_error());

  return $QuestionRS;
}

//获取回答信息
function get_answer_info($pro_id){

  global $tankdb;

  $selAnswerInfo="SELECT * FROM gt_answer,gt_teacher WHERE answer_pid=$pro_id AND answer_point_status=1 AND answer_user=tea_id";
  $AnswerInfoRS = mysql_query($selAnswerInfo, $tankdb) or die(mysql_error());
  $AnswerInfo = mysql_fetch_assoc($AnswerInfoRS);
  return $AnswerInfo;
}

//获取其他老师回答信息
function get_other_teacher_answer($pro_id){

  global $tankdb;

  $selOtherTeaAns="SELECT * FROM gt_answer,gt_teacher WHERE answer_pid=$pro_id AND answer_role=1 AND answer_user=tea_id AND answer_point_status!=1";
  $AnswerInfoRS = mysql_query($selOtherTeaAns, $tankdb) or die(mysql_error());
  return $AnswerInfoRS;
}

//获取同学回答信息
function get_student_answer($pro_id){

  global $tankdb;

  $selOtherTeaAns="SELECT * FROM gt_answer,gt_student WHERE answer_pid=$pro_id AND answer_role=2 AND answer_user=stu_id";
  $AnswerInfoRS = mysql_query($selOtherTeaAns, $tankdb) or die(mysql_error());
  return $AnswerInfoRS;
}

//是否赞过
function is_good($answer_id,$uid,$urole){

  global $tankdb;

  $selIsGood="SELECT * FROM gt_good WHERE good_uid=$uid AND good_role=$urole AND good_aid=$answer_id";
  $RS = mysql_query($selIsGood, $tankdb) or die(mysql_error());
  $row_num = mysql_fetch_assoc($RS);
  return $row_num;
}


?>