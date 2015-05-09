<?php
error_reporting(0);
$hostname_tankdb = "localhost:3306";   //database host 
$database_tankdb = "bjtu_gt";   //database name
$username_tankdb = "root";   //mysql user name
$password_tankdb = "dancingout";   //mysql password
$tankdb = mysql_connect($hostname_tankdb, $username_tankdb, $password_tankdb) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("set names 'utf8'");

?>