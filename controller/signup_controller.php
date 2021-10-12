<?php
    include '../includes/common.php';

    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $level = $_POST['level'];

    $uid = getSingleValue($conn, "SELECT id FROM tbl_users WHERE email=?", [$email]);

    if($uid == null) {
        $sql_users = "INSERT INTO tbl_users (surname, email, password, country, level)
        VALUES ('$surname', '$email', '$password', '$country', 0)";
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