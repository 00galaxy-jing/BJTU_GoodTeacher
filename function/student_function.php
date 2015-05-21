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

//获取学生信息
function get_student_info($uid){

  global $tankdb;

  $selStuInfo="SELECT * FROM gt_student WHERE stu_id=$uid";
  $StuRS = mysql_query($selStuInfo, $tankdb) or die(mysql_error());
  $stu_info = mysql_fetch_assoc($StuRS);

  return $stu_info;
}

//获取分组数
function get_student_interest($uid){

  global $tankdb;

  $selStuInt="SELECT * FROM gt_stu_interest WHERE si_sid=$uid";
  $StuRS = mysql_query($selStuInt, $tankdb) or die(mysql_error());
  $int_num = mysql_num_rows($StuRS);

  return $int_num;
}

//获取关注老师数
function get_student_teacher($uid){

  global $tankdb;

  $selStuFol="SELECT * FROM gt_stu_teacher WHERE st_sid=$uid";
  $StuRS = mysql_query($selStuFol, $tankdb) or die(mysql_error());
  $fol_num = mysql_num_rows($StuRS);

  return $fol_num;
}

//获取问题数
function get_my_pro($uid){

  global $tankdb;

  $selStuPro="SELECT * FROM gt_problem WHERE problem_from=$uid";
  $StuRS = mysql_query($selStuPro, $tankdb) or die(mysql_error());
  $int_pro = mysql_num_rows($StuRS);

  return $int_pro;
}

//获取回答数
function get_my_ans($uid){

  global $tankdb;

  $selStuAns="SELECT * FROM gt_answer WHERE answer_user=$uid and answer_role=2";
  $StuRS = mysql_query($selStuAns, $tankdb) or die(mysql_error());
  $int_ans = mysql_num_rows($StuRS);

  return $int_ans;
}


?>