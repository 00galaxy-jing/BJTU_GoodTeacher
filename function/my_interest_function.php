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

//获取“我的兴趣”分组
function get_my_interest($uid){

  global $tankdb;

  $selStuInterest="SELECT * FROM gt_student,gt_group,gt_stu_interest WHERE stu_id=$uid and stu_id=si_sid and si_gid=group_id";
  $StuInterestRS = mysql_query($selStuInterest, $tankdb) or die(mysql_error());

  return $StuInterestRS;
}