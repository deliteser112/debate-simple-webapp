<?php
    session_start();

    include '../includes/common.php';

    $list_id = $_POST['list_id'];
    $cur_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT id, name FROM tbl_todolist where user_id = '$cur_id' and id = '$list_id'");
    $stmt->execute();
    $res['list_name'] = $stmt->fetch();

    $stmt1 = $conn->prepare("SELECT * FROM tbl_tasklist where list_id = '$list_id'");
    $stmt1->execute();
    $res['task_list'] = $stmt1->fetchAll();
    
    echo json_encode($res);
?>