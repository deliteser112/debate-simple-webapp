<?php
    session_start();

    include '../includes/common.php';

    $score = $_POST['score'];
    $email = $_SESSION["email"];
    $status = 0;
    $sql = "UPDATE tbl_users SET score=? WHERE email=?;";
    $q = $conn->prepare($sql);
    $q->execute([$score, $email]);

    $sql1 = "UPDATE tbl_users SET status=? WHERE email=?;";
    $q1 = $conn->prepare($sql1);
    $q1->execute([$status, $email]);

    echo "<script type='text/javascript'>location.href = '/main.php';</script>";
?>