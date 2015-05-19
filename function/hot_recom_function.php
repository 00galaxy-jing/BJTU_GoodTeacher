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

//获取全部热门推荐
function get_all_hot_recom(){

  global $tankdb;

  $selAllHotRecom="SELECT * FROM gt_problem,gt_student,gt_group WHERE  problem_from=stu_id AND problem_group=group_id AND problem_private=1  ORDER BY problem_answer DESC";
  $AllRecomRS = mysql_query($selAllHotRecom, $tankdb) or die(mysql_error());

  return $AllRecomRS;
}


//获取一周热门推荐
function get_week_hot_recom(){

  global $tankdb;
  $today_date = date('Y-m-d');
  $week_sdate = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-7,date("Y")));

  $selWeekHotRecom="SELECT * FROM gt_problem,gt_student,gt_group WHERE  problem_from=stu_id AND problem_group=group_id AND problem_private=1 AND problem_time>'$week_sdate' ORDER BY problem_answer DESC";
  $AllRecomRS = mysql_query($selWeekHotRecom, $tankdb) or die(mysql_error());

  return $AllRecomRS;
}

//获取回答
function get_hot_answer($pid){

  global $tankdb;

  $selHotAnswer="SELECT * FROM gt_answer,gt_teacher WHERE  answer_pid=$pid AND answer_role=1 AND answer_user=tea_id ORDER BY answer_point_status DESC,answer_good DESC";
  $TeacherAnswerRS = mysql_query($selHotAnswer, $tankdb) or die(mysql_error());
  if(mysql_num_rows($TeacherAnswerRS) > 0)
  {
    return $TeacherAnswerRS;
  }
  else
  {
     $selStuAnswer="SELECT * FROM gt_answer,gt_student WHERE  answer_pid=$pid AND answer_role=2 AND answer_user=stu_id ORDER BY answer_good DESC";
     $StuAnswerRS = mysql_query($selStuAnswer, $tankdb) or die(mysql_error());
     return $StuAnswerRS;
  }
}

?>