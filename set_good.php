<?php require_once('config/db_config.php'); ?>
<?php

    mysql_select_db($database_tankdb,$tankdb);
    global $tankdb;

    $aid = $_POST['aid'];
    $uid = $_POST['uid'];
    $urole= $_POST['urole'];

    $insertSQL="INSERT INTO gt_good(good_uid,good_role,good_aid) VALUES($uid,$urole,$aid)";
    $RS = mysql_query($insertSQL, $tankdb) or die(mysql_error());

    $uSQL="UPDATE gt_answer SET answer_good=answer_good+1 WHERE answer_id=$aid";
    $RS4 = mysql_query($uSQL, $tankdb) or die(mysql_error());
    
    $selAns = "SELECT * FROM gt_answer WHERE answer_id=$aid";
    $RS2 = mysql_query($selAns, $tankdb) or die(mysql_error());
    $ans_row = mysql_fetch_assoc($RS2);
    $answer_user=$ans_row['answer_user'];
    $answer_role=$ans_row['answer_role'];

    if($answer_role==2)
    {
    	$updateSQL="UPDATE gt_student SET stu_get_good=stu_get_good+1 WHERE stu_id=$answer_user";
    }
    else
    {
    	$updateSQL="UPDATE gt_teacher SET tea_get_good=tea_get_good+1 WHERE tea_id=$answer_user";
    }

     $RS3= mysql_query($updateSQL, $tankdb) or die(mysql_error());
?>