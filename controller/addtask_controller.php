<?php
    include '../includes/common.php';
    session_start();
    $task_name = $_POST['task_name'];
    $list_id = $_POST['list_id'];
    $cur_id = $_SESSION['user_id'];

    $sql = "INSERT INTO tbl_tasklist (user_id, list_id, task_name)
    VALUES ('$cur_id', '$list_id', '$task_name')";
    // use exec() because no results are returned
    $conn->exec($sql);

    $stmt = $conn->prepare("SELECT * FROM tbl_tasklist where list_id = '$list_id'");
    $stmt->execute();
    $qr_result = $stmt->fetchAll();
    
    echo json_encode($qr_result);
?>