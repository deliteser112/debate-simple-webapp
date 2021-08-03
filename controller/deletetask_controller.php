<?php
    include '../includes/common.php';

    $task_id = $_POST['task_id'];

    $sql = "DELETE FROM tbl_tasklist WHERE id='$task_id'";

    // Prepare statement
    $stmt = $conn->prepare($sql);
  
    // execute the query
    $stmt->execute();
    
    echo json_encode("success");
?>