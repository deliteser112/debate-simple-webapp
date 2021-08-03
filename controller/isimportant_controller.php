<?php
    include '../includes/common.php';

    $is_important = $_POST['is_important'];
    $task_id = $_POST['task_id'];

    $sql = "UPDATE tbl_tasklist SET is_important='$is_important' WHERE id='$task_id'";

    // Prepare statement
    $stmt = $conn->prepare($sql);
  
    // execute the query
    $stmt->execute();
    
    echo json_encode("success");
?>