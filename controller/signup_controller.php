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
    $uid = getSingleValue($conn, "SELECT id FROM tbl_users WHERE email=?", [$email]);

    if($uid == null) {
        $sql_users = "INSERT INTO tbl_users (surname, email, password, country)
        VALUES ('$surname', '$email', '$password', '$country')";
        $conn->exec($sql_users);

        $level = 0;
        $text1 = "This is First Debate Content";
        $text2 = "This is Second Debate Content";
        $text3 = "This is Third Debate Content";

        $userId = getSingleValue($conn, "SELECT id FROM tbl_users WHERE email=?", [$email]); 

        $sql_text = "INSERT INTO tbl_text (level, text1, text2, text3, userId)
        VALUES ('$level', '$text1', '$text2', '$text3', '$userId')";
        $conn->exec($sql_text);

        echo "<script type='text/javascript'>location.href = '/index.php';</script>";
    } else {
        echo "<script type='text/javascript'>location.href = '/signup.php';</script>";
    }

    function getSingleValue($conn, $sql, $parameters)
    {
        $q = $conn->prepare($sql);
        $q->execute($parameters);
        return $q->fetchColumn();
    }