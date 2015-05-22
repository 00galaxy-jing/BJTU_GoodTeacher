<?php require_once('config/db_config.php'); ?>
<?php

    mysql_select_db($database_tankdb,$tankdb);
    global $tankdb;

    $gid = $_POST['gid'];
    $uid = $_POST['uid'];

    $insertSQL="INSERT INTO gt_stu_interest(si_sid,si_gid) VALUES($uid,$gid)";
    $RS = mysql_query($insertSQL, $tankdb) or die(mysql_error());

    $updateSQL="UPDATE gt_group SET group_snum=group_snum+1 WHERE group_id=$gid";
    $RS = mysql_query($updateSQL, $tankdb) or die(mysql_error());


?>