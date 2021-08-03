<?php
    session_start();

    include '../includes/common.php';

    $todolistname = $_POST['list_name'];

    $cur_id = $_SESSION['user_id'];
    $sql = "INSERT INTO tbl_todolist (name, user_id)
    VALUES ('$todolistname', $cur_id)";
    // use exec() because no results are returned
    $conn->exec($sql);

    $stmt = $conn->prepare("SELECT t1.*, t2.done_count FROM (SELECT * FROM tbl_todolist WHERE user_id = '$cur_id') t1 LEFT JOIN (SELECT list_id, COUNT(is_done) AS done_count FROM tbl_tasklist WHERE is_done = '0' GROUP BY list_id) t2 ON t1.id = t2.list_id");
    $stmt->execute();
    $qr_result = $stmt->fetchAll();
    
    echo json_encode($qr_result);
?>