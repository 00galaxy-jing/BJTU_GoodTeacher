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
function get_my_message($uid,$role){

  global $tankdb;

  $selMes="SELECT * FROM gt_message WHERE mes_to=$uid AND mes_to_role=$role";
  $MesRS = mysql_query($selMes, $tankdb) or die(mysql_error());
  return $MesRS;
}

function get_name($uid,$role)
{
   global $tankdb;
  if($role==2)
      {
        $selUser = "SELECT * FROM gt_student WHERE stu_id=$uid";
        $userRS = mysql_query($selUser, $tankdb) or die(mysql_error());
        $userInfo = mysql_fetch_array($userRS);
        $userName = $userInfo['stu_name'];
      }
      else
      {
        $selUser = "SELECT * FROM gt_teacher WHERE tea_id=$uid";
        $userRS = mysql_query($selUser, $tankdb) or die(mysql_error());
        $userInfo = mysql_fetch_array($userRS);
        $userName = $userInfo['tea_name'];
      }
      return $userName;
}

function get_pro($pid){

  global $tankdb;

  $selPro="SELECT * FROM gt_problem WHERE problem_id=$pid";
  $ProRS = mysql_query($selPro, $tankdb) or die(mysql_error());
  $row = mysql_fetch_array($ProRS);
  $pro_name = $row['problem_title'];
  return $pro_name;
}

function set_read($mid){

  global $tankdb;

  $upd="UPDATE gt_message SET mes_read=1 WHERE mes_id=$mid";
  $ProRS = mysql_query($upd, $tankdb) or die(mysql_error());
}

?>