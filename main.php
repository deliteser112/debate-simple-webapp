<?php
session_start();
include 'includes/common.php';

$email = $_SESSION["email"];
$status = getSingleValue($conn, "SELECT status FROM tbl_users WHERE email=?", [$email]);
$userId = getSingleValue($conn, "SELECT id FROM tbl_users WHERE email=?", [$email]);
$text = getMultiValue($conn, "SELECT * FROM tbl_text WHERE userId=?", [$userId]);

$userList = getMultiRowValue($conn, "SELECT id FROM tbl_users");

$userNumber = 0;

foreach ($userList as $key => $user) {
    if ($userId == $user["id"]) {
        $userNumber = $key + 1;
    }
}

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
                        <form action="controller/rating_controller.php" method="POST">
                            <ul class="stepper parallel horizontal">
                                <!-- step 1 -->
                                <li class="step active">
                                    <div class="step-content">
                                        <div class="row">
                                            <div class='form-field'>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?> ">When you and the other user are ready, press the button ready</p>
                                            </div>
                                        </div>
                                        <div class="step-actions" style="justify-content: center">
                                            <button class="waves-effect waves-dark btn next-step" style="background-color: #A5C931;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">READY</button>
                                        </div>
                                    </div>
                                </li>
                                <!-- step 2 -->
                                <li class="step">
                                    <div class="step-content">
                                        <div class="row">
                                            <div class='form-field'>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Press START button to start the Debate.</p>
                                            </div>
                                        </div>
                                        <div class="step-actions" style="justify-content: center;">
                                            <button class="waves-effect waves-dark btn next-step" style="background-color: #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="startTimer(1)">START</button>
                                        </div>
                                    </div>
                                </li>
                                <!-- step 3 -->
                                <li class="step">
                                    <div class="step-content">
                                        <div class="row">
                                            <div class='form-field'>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Talk about "<?php echo $text['text1']; ?>"</p>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you finish, press NEXT</p>
                                                <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer1" />
                                            </div>
                                        </div>
                                        <div class="step-actions" style="justify-content: center;">
                                            <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="stopTimers()">NEXT</button>
                                            <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                        </div>
                                    </div>
                                </li>
                                <!-- step 4 -->
                                <li class="step">
                                    <div class="step-content">
                                        <div class="row">
                                            <div class='form-field'>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Now listen to the other user.</p>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When he/she finishes talking, press NEXT</p>
                                                <div style="text-align: center; margin-top: 30px; margin-bottom: 60px;">
                                                    <img src="assets/images/7-512.png" style="width: 80px; height: auto;" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step-actions" style="justify-content: center;">
                                            <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="startTimer(2)">NEXT</button>
                                            <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                        </div>
                                    </div>
                                </li>
                                <!-- step 5 -->
                                <?php if ($userNumber > 2) { ?>
                                    <li class="step">
                                        <div class="step-content">
                                            <div class="row">
                                                <div class='form-field'>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Say if you agree or not.</p>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you finish, press NEXT</p>
                                                </div>
                                            </div>
                                            <div class="step-actions" style="justify-content: center;">
                                                <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">NEXT</button>
                                                <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php } else { ?>
                                    <li class="step">
                                        <div class="step-content">
                                            <div class="row">
                                                <div class='form-field'>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;">Talk about "<?php echo $text['text2']; ?>"</p>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;">When you finish, press NEXT</p>
                                                    <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer2" />
                                                </div>
                                            </div>
                                            <div class="step-actions" style="justify-content: center;">
                                                <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="stopTimers()">NEXT</button>
                                                <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                <!-- step 6 -->
                                <?php if ($userNumber > 2) { ?>
                                    <li class="step">
                                        <div class="step-content">
                                            <div class="row">
                                                <div class='form-field'>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Talk about "<?php echo $text['text2']; ?>"</p>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you finish, press NEXT</p>
                                                    <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer2" />
                                                </div>
                                            </div>
                                            <div class="step-actions" style="justify-content: center;">
                                                <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="stopTimers()">NEXT</button>
                                                <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php } else { ?>
                                    <li class="step">
                                        <div class="step-content">
                                            <div class="row">
                                                <div class='form-field'>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;">Now listen to the other user.</p>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;">When he/she finishes talking, press NEXT</p>
                                                    <div style="text-align: center; margin-top: 30px; margin-bottom: 60px;">
                                                        <img src="assets/images/7-512.png" style="width: 80px; height: auto;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step-actions" style="justify-content: center;">
                                                <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">NEXT</button>
                                                <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>

                                <!-- step 7 -->
                                <?php if ($userNumber > 2) { ?>
                                    <li class="step">
                                        <div class="step-content">
                                            <div class="row">
                                                <div class='form-field'>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Now listen to the other user. When he/she finishes talking, press NEXT</p>
                                                    <div style="text-align: center; margin-top: 30px; margin-bottom: 60px;">
                                                        <img src="assets/images/7-512.png" style="width: 80px; height: auto;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step-actions" style="justify-content: center;">
                                                <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">NEXT</button>
                                                <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php } else { ?>
                                    <li class="step">
                                        <div class="step-content">
                                            <div class="row">
                                                <div class='form-field'>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;">Say if you agree or not.</p>
                                                    <p class="flow-text" style="text-align: center; margin-top: 30px;">When you finish, press NEXT</p>
                                                </div>
                                            </div>
                                            <div class="step-actions" style="justify-content: center;">
                                                <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">NEXT</button>
                                                <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>

                                <!-- step 8 -->
                                <li class="step">
                                    <div class="step-content">
                                        <div class="row">
                                            <div class='form-field'>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Now you are goint to talk about the same text.</p>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you and other user are ready, press NEXT</p>
                                            </div>
                                        </div>
                                        <div class="step-actions" style="justify-content: center">
                                            <button class="waves-effect waves-dark btn next-step" style="background-color: #A5C931;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="startTimer(3)">READY</button>
                                        </div>
                                    </div>
                                </li>
                                <!-- step 9 -->
                                <li class="step">
                                    <div class="step-content">
                                        <div class="row">
                                            <div class='form-field'>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Talk about "<?php echo $text['text3']; ?>"</p>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you finish, press NEXT</p>
                                                <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer3" />
                                            </div>
                                        </div>
                                        <div class="step-actions" style="justify-content: center;">
                                            <button class="waves-effect waves-dark btn next-step" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="stopTimers()">NEXT</button>
                                            <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                        </div>
                                    </div>
                                </li>
                                <!-- step 10 -->
                                <li class="step">
                                    <div class="step-content">
                                        <div class="row">
                                            <div class='form-field' style="text-align: center">
                                                <span class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">This is the end of debate.</span>
                                                <br>
                                                <span class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Rate the debate ,and press FINISH.</span>
                                                <br>
                                                <span class="flow-text" style="text-align: center; margin-top: 30px;<?php if ($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Hope to see you soon</span>
                                                <p class="counterW" style="text-align: center; margin-top: 30px">score: <span class="scoreNow">3</span> out of <span>5</span></p>
                                                <ul class="ratingW">
                                                    <li class="on"><a href="javascript:void(0);">
                                                            <div class="star"></div>
                                                        </a></li>
                                                    <li class="on"><a href="javascript:void(0);">
                                                            <div class="star"></div>
                                                        </a></li>
                                                    <li class="on"><a href="javascript:void(0);">
                                                            <div class="star"></div>
                                                        </a></li>
                                                    <li><a href="javascript:void(0);">
                                                            <div class="star"></div>
                                                        </a></li>
                                                    <li><a href="javascript:void(0);">
                                                            <div class="star"></div>
                                                        </a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="step-actions" style="justify-content: center;">
                                            <button class="waves-effect waves-dark btn" style="<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">FINISH</button>
                                            <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if ($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                        </div>
                                    </div>
                                </li>
                                <input type="hidden" name="score" id="score" value="3" />
                            </ul>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>