<?php require_once('config/db_config.php'); ?>
<?php require_once('session/session_unset.php'); ?>
<?php require_once('session/session.php'); ?>
<?php
    mysql_select_db($database_tankdb,$tankdb);
    //这都是要从session取值的
    $now_user=$_SESSION['MM_uid'];
    $now_type=$_SESSION['MM_role'];

    $selSQL = "SELECT * FROM gt_message WHERE mes_to_role=$now_type AND mes_to=$now_user AND mes_read=0";
    $RS = mysql_query($selSQL, $tankdb) or die(mysql_error());
    $num = mysql_num_rows($RS);

    echo $num;
?>