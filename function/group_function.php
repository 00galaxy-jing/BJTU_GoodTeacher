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

//获取兴趣组信息
function get_group_info($g_id){

  global $tankdb;

  $selGroupInfo="SELECT * FROM gt_group WHERE group_id=$g_id";
  $GroupInfoRS = mysql_query($selGroupInfo, $tankdb) or die(mysql_error());
  return $GroupInfoRS;
}

//获取问题信息
function get_pro_info($g_id){

  global $tankdb;

  $selProInfo="SELECT * FROM gt_problem WHERE problem_group=$g_id";
  $ProInfoRS = mysql_query($selProInfo, $tankdb) or die(mysql_error());
  return $ProInfoRS;
}

//获取回答信息
function get_answer_info($pro_id){

  global $tankdb;

  $selAnswerInfo="SELECT * FROM gt_answer,gt_teacher WHERE answer_pid=$pro_id AND answer_point_status=1 AND answer_user=tea_id";
  $AnswerInfoRS = mysql_query($selAnswerInfo, $tankdb) or die(mysql_error());
  $AnswerInfo = mysql_fetch_assoc($AnswerInfoRS);
  return $AnswerInfo;
}

//获取问题信息
function get_all_group(){

  global $tankdb;

  $selAllGroup="SELECT * FROM gt_group";
  $GroupRS = mysql_query($selAllGroup, $tankdb) or die(mysql_error());
  return $GroupRS;
}

?>