<?php
    include '../includes/common.php';
    session_start();
    $cur_id = $_SESSION['user_id'];
    $stmt1 = $conn->prepare("SELECT * FROM (SELECT tbl_tasklist.*, tbl_todolist.name AS list_name FROM tbl_tasklist LEFT JOIN tbl_todolist ON tbl_tasklist.list_id = tbl_todolist.id WHERE is_important = '1') t1 WHERE user_id = '$cur_id'");
    $stmt1->execute();

    $qr_important = $stmt1->fetchAll();
    
    echo json_encode($qr_important);
?>