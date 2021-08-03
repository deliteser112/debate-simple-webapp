<?php
    include '../includes/common.php';
    
    // avatar upload

    // $target_dir = "../uploads/";

    // $date = new DateTime();
    // $timestamp = $date->getTimestamp();

    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // $upload_file = $target_dir.$timestamp.".".$imageFileType;

    // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $upload_file);

    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    // $avatar_src = $upload_file;
    // upload end.


    $sql = "INSERT INTO tbl_users (surname, email, password, country)
    VALUES ('$surname', '$email', '$password', '$country')";
    // use exec() because no results are returned
    $conn->exec($sql);

    echo "<script type='text/javascript'>location.href = '/index.php';</script>";
