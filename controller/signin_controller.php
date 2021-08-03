<?php
    session_start();

    include '../includes/common.php';

    $stmt = $conn->prepare("SELECT * FROM tbl_users");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $email = $_GET['email'];
    $password = $_GET['password'];

    $qr_result = $stmt->fetchAll();

    $logged_in = false;
    foreach($qr_result as $row){
        if($email == $row['email'] && $password == $row['password']){
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["surname"] = $row['surname'];
            $_SESSION["status"] = $row['status'];
            $logged_in = true;
            break;
        }
    }

    if($logged_in){
        echo "<script type='text/javascript'>location.href = '/main.php';</script>";
    }else{
        echo "<script type='text/javascript'>location.href = '/index.php';</script>";
    }
?>