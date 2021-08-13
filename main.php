<?php
session_start();
include 'includes/common.php';

$email = $_SESSION["email"];
$status = getSingleValue($conn, "SELECT status FROM tbl_users WHERE email=?", [$email]);
$userId = getSingleValue($conn, "SELECT id FROM tbl_users WHERE email=?", [$email]);
$text = getMultiValue($conn, "SELECT * FROM tbl_text WHERE userId=?", [$userId]);

$userList = getMultiRowValue($conn, "SELECT id FROM tbl_users");

$userNumber = getSingleValue($conn, "SELECT level FROM tbl_users WHERE email=?", [$email]);

function getSingleValue($conn, $sql, $parameters)
{
    $q = $conn->prepare($sql);
    $q->execute($parameters);
    return $q->fetchColumn();
}

function getMultiValue($conn, $sql, $parameters)
{
    $q = $conn->prepare($sql);
    $q->execute($parameters);
    return $q->fetch();
}

function getMultiRowValue($conn, $sql)
{
    $q = $conn->prepare($sql);
    $q->execute();
    return $q->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/materialize-stepper@2.1.4/materialize-stepper.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/ratestar.css" rel="stylesheet" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debate</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/gif" sizes="16x16">
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script type="text/javascript" src="assets/js/debate.js"></script>
    <script type="text/javascript" src="assets/js/timer.js"></script>
    <script type="text/javascript" src="assets/js/ratestar.js"></script>


    <ul id="slide-out" class="side-nav fixed">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="assets/images/office.jpg">
                </div>
                <a href="index.php"><i class="material-icons btn-logout">login</i></a>
                <a href="#"><img class="circle" src="assets/images/img_avatar.png"></a>
                <a href="#"><span class="white-text name"><?php echo $_SESSION["surname"]; ?></span></a>
                <a href="#"><span class="white-text email"> <?php echo $_SESSION["email"]; ?> </span></a>
            </div>
        </li>
    </ul>
    <a href="index.php"><i class="material-icons btn-logout-mobile">login</i></a>
    <div class="ps-collapse-button">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons hamburger-menu">menu</i></a>
    </div>


    <main class="main-body">
        <div class="container">
            <div class="font-logo-position">
                <h1 class="font-logo">DEBATE</h1>
            </div>
            <div class="card" style="border-radius: 30px">
                <div class="card-content">
                    <?php if ($status == 0) { ?>
                        <h5>Your Debate is not ready yet. Contact the professor for more information.</h5>
                    <?php } else { ?>
                        <?php if ($userNumber > 2) {
                            include 'groupTwo.php';
                        } else {
                            include 'groupOne.php';
                        } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>