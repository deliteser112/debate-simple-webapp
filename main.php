<?php
    session_start();
    include 'includes/common.php';

    $email = $_SESSION["email"];
    $status = getSingleValue($conn, "SELECT status FROM tbl_users WHERE email=?", [$email]);
    $userId = getSingleValue($conn, "SELECT id FROM tbl_users WHERE email=?", [$email]);
    $text = getMultiValue($conn, "SELECT * FROM tbl_text WHERE userId=?", [$userId]);

    $userList = getMultiRowValue($conn, "SELECT id FROM tbl_users");

    $userNumber = 0;

    foreach($userList as $key => $user) {
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
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/materialize-stepper@2.1.4/materialize-stepper.css" rel="stylesheet">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link
    href="assets/css/style.css"
    rel="stylesheet"
    />
    <link
    href="assets/css/ratestar.css"
    rel="stylesheet"
    />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debate</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/gif" sizes="16x16">
</head>
<body>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="assets/js/debate.js"></script>
    <script type="text/javascript" src="assets/js/timer.js"></script>
    <script type="text/javascript" src="assets/js/ratestar.js"></script>


    <ul id="slide-out" class="side-nav fixed">
        <li>
            
            <div class="user-view">
                <div class="background">
                    <img src="assets/images/office.jpg">
                </div>
                <a href="index.php"><i class="material-icons btn-logout" style="background-color: #fff200;">login</i></a>
                <a href="#"><img class="circle" src="assets/images/img_avatar.png"></a>
                <a href="#"><span class="white-text name"><?php echo $_SESSION["surname"]; ?></span></a>
                <a href="#"><span class="white-text email"> <?php echo $_SESSION["email"]; ?> </span></a>
            </div>
        </li>

        <div style="padding: 40px 20px 10px 20px;">
            <p style="line-height: 2; text-indent: 20px;font-style: italic;">
                "<b>Debate</b> is a valuable activity for students of all skill levels. Debate teaches useful skills for other academic pursuits and life more generally. ... They learn to explain their own ideas and assess different viewpoints, whether in a debate round, a political discussion, a classroom, or a written essay."
            </p>
        </div>
    </ul>
    <div class="ps-collapse-button">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons hamburger-menu">menu</i></a>
    </div>
    

    <main class="main-body">
        <div class="container">
            <div style="text-align: center; margin-top: 150px; margin-bottom: 60px;">
                <h1 style="font-weight:900; color: #FF7F27; font-size: 90px; font-family: sans-serif;">DEBATE</h1>
            </div>
            <div class="card" style="border-radius: 30px">
                <div class="card-content">
                    <?php if($status == 0) { ?>
                        <h5>Your Debate is not ready yet. Contact the professor for more information.</h5>
                    <?php } else { ?>
                        <form action="controller/rating_controller.php" method="POST">
                            <ul class="stepper parallel horizontal">
                            <!-- step 1 -->
                            <li class="step active">
                                <div class="step-content">
                                    <div class="row">
                                        <div class='form-field'>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?> ">When you and the other user are ready, press the button ready</p>
                                        </div>
                                    </div>
                                    <div class="step-actions" style="justify-content: center">
                                        <button class="waves-effect waves-dark btn next-step" style="background-color: #A5C931;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">READY</button>
                                    </div>
                                </div>
                            </li>
                            <!-- step 2 -->
                            <li class="step">
                                <div class="step-content">
                                    <div class="row">
                                        <div class='form-field'>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Press START button to start the Debate.</p>
                                        </div>
                                    </div>
                                    <div class="step-actions" style="justify-content: center;">
                                        <button class="waves-effect waves-dark btn next-step" style="background-color: #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="startTimer(1)">START</button>
                                    </div>
                                </div>
                            </li>
                            <!-- step 3 -->
                            <li class="step">
                                <div class="step-content">
                                    <div class="row">
                                        <div class='form-field'>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Talk about "<?php echo $text['text1']; ?>"</p>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you finish, press NEXT</p>
                                            <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer1" />
                                        </div>
                                    </div>
                                    <div class="step-actions" style="justify-content: center;">
                                        <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="stopTimers()">NEXT</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                    </div>
                                </div>
                            </li>
                            <!-- step 4 -->
                            <li class="step">
                                <div class="step-content">
                                <div class="row">
                                    <div class='form-field'>
                                        <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Now listen to the other user.</p>
                                        <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When he/she finishes talking, press NEXT</p>
                                        <div style="text-align: center; margin-top: 30px; margin-bottom: 60px;">
                                            <img src="assets/images/7-512.png" style="width: 80px; height: auto;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="step-actions" style="justify-content: center;">
                                    <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="startTimer(2)">NEXT</button>
                                    <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                </div>
                                </div>
                            </li>
                            <!-- step 5 -->
                            <?php if($userNumber > 2) { ?> 
                                <li class="step">
                                    <div class="step-content">
                                    <div class="row">
                                        <div class='form-field'>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Say if you agree or not.</p>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you finish, press NEXT</p>
                                        </div>
                                    </div>
                                    <div class="step-actions" style="justify-content: center;">
                                        <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">NEXT</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
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
                                            <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="stopTimers()">NEXT</button>
                                            <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                            <!-- step 6 -->
                            <?php if($userNumber > 2) { ?> 
                                <li class="step">
                                    <div class="step-content">
                                        <div class="row">
                                            <div class='form-field'>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Talk about "<?php echo $text['text2']; ?>"</p>
                                                <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you finish, press NEXT</p>
                                                <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer2" />
                                            </div>
                                        </div>
                                        <div class="step-actions" style="justify-content: center;">
                                            <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="stopTimers()">NEXT</button>
                                            <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
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
                                        <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">NEXT</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                    </div>
                                    </div>
                                </li>
                            <?php } ?>
                            
                            <!-- step 7 -->
                            <?php if($userNumber > 2) { ?> 
                                <li class="step">
                                    <div class="step-content">
                                    <div class="row">
                                        <div class='form-field'>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Now listen to the other user. When he/she finishes talking, press NEXT</p>
                                            <div style="text-align: center; margin-top: 30px; margin-bottom: 60px;">
                                                <img src="assets/images/7-512.png" style="width: 80px; height: auto;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-actions" style="justify-content: center;">
                                        <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">NEXT</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
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
                                        <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">NEXT</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                    </div>
                                    </div>
                                </li>
                            <?php } ?>
                            
                            <!-- step 8 -->
                            <li class="step">
                                <div class="step-content">
                                <div class="row">
                                    <div class='form-field'>
                                        <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Now you are goint to talk about the same text.</p>
                                        <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you and other user are ready, press NEXT</p>
                                    </div>
                                </div>
                                <div class="step-actions" style="justify-content: center">
                                    <button class="waves-effect waves-dark btn next-step" style="background-color: #A5C931;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="startTimer(3)">READY</button>
                                </div>
                                </div>
                            </li>
                            <!-- step 9 -->
                            <li class="step">
                                <div class="step-content">
                                    <div class="row">
                                        <div class='form-field'>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Talk about "<?php echo $text['text3']; ?>"</p>
                                            <p class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">When you finish, press NEXT</p>
                                            <h4 style="text-align: center; font-weight: bold; margin-top: 40px" id="timer3" />
                                        </div>
                                    </div>
                                    <div class="step-actions" style="justify-content: center;">
                                        <button class="waves-effect waves-dark btn next-step" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>" onClick="stopTimers()">NEXT</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step" onClick="stopTimers()" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
                                    </div>
                                </div>
                            </li>
                            <!-- step 10 -->
                            <li class="step">
                                <div class="step-content">
                                <div class="row">
                                    <div class='form-field' style="text-align: center">
                                        <span class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">This is the end of debate.</span>
                                        <br>
                                        <span class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Rate the debate ,and press FINISH.</span>
                                        <br>
                                        <span class="flow-text" style="text-align: center; margin-top: 30px;<?php if($userNumber > 2) { ?> font-weight: 500; <?php } ?>">Hope to see you soon</span>
                                        <p class="counterW" style="text-align: center; margin-top: 30px">score: <span class="scoreNow">3</span> out of <span>5</span></p>
                                        <ul class="ratingW">
                                        <li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
                                        <li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
                                        <li class="on"><a href="javascript:void(0);"><div class="star"></div></a></li>
                                        <li><a href="javascript:void(0);"><div class="star"></div></a></li>
                                        <li><a href="javascript:void(0);"><div class="star"></div></a></li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="step-actions" style="justify-content: center;">
                                    <button class="waves-effect waves-dark btn" style="<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">FINISH</button>
                                    <button class="waves-effect waves-dark btn-flat previous-step" style="border: 1px solid #FF7F27;<?php if($userNumber > 2) { ?> border-radius: 30px <?php } ?>">BACK</button>
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

    <!-- Modal Structure -->
    <!-- <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="row">
                <h4>Add List</h4>
                <div class="input-field col s10">
                    <i class="material-icons prefix pf-fix">playlist_add</i>
                    <input id="add_list" name="add_list" type="text" class="validate" required>
                    <label for="password">Input List Name</label>
                </div>
                <div class="col s2" style="padding-top:22px;">
                    <button class="btn waves-effect waves-light" type="button" id="btn_list_add">Add</button>
                </div>
            </div>
        </div>
    </div> -->
</body>
</html>