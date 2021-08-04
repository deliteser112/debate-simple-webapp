<?php

    $servername = "localhost";
    // $username = "debateuser";
    // $password = "Deliteser112!!@";
    $username = "root";
    $password = "root";
    $dbname = "db_debate";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
?>