<?php
    include '../includes/common.php';

    $is_done = $_POST['is_done'];
    $task_id = $_POST['task_id'];

    $sql = "UPDATE tbl_tasklist SET is_done='$is_done' WHERE id='$task_id'";

    // Prepare statement
    $stmt = $conn->prepare($sql);
  
    // execute the query
    $stmt->execute();
    
    echo json_encode("success");
?>