<?php
    $version = "1.3.3b";
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

//获取老师信息
function get_teacher_info($uid){
  global $tankdb;

  $selTeaInfo="SELECT * FROM gt_teacher WHERE tea_id=$uid";
  $TeaRS = mysql_query($selTeaInfo, $tankdb) or die(mysql_error());
  $tea_info = mysql_fetch_assoc($TeaRS);

  return $tea_info;
}

//获取全部老师
function get_all_teachers(){
  global $tankdb;

  $selTeaInfo="SELECT * FROM gt_teacher";
  $TeaRS = mysql_query($selTeaInfo, $tankdb) or die(mysql_error());

  return $TeaRS;
}
?>