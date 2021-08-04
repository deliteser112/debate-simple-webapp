<!DOCTYPE html>
<html lang="en">
<head>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>

    <!-- customize css -->
    <link
    href="assets/css/style.css"
    rel="stylesheet"
    />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debate</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/gif" sizes="16x16">
</head>
<body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <section>
        <div class="container">
            <div style="text-align: center; margin-top: 150px; margin-bottom: 60px;">
                <h1 style="font-weight:900; color: #FF7F27; font-size: 90px; font-family: sans-serif;">DEBATE</h1>
            </div>
            <form action="controller/signup_controller.php" method="POST">
                <div class="card" style="max-width: 500px; margin: auto; margin-bottom: 100px; border-radius: 30px">
                    <div class="card-image">
                        <span class="card-title" style="color: black">Sign Up</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pf-fix">account_circle</i>
                                <input id="surname" name="surname" type="text" class="validate" required>
                                <label for="surname">Sure Name</label>
                            </div>

                            <div class="input-field col s12 inline">
                                <i class="material-icons prefix pf-fix">email</i>
                                <input id="email" name="email" type="email" class="validate" required>
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix pf-fix">lock</i>
                                <input id="password" name="password" type="password" class="validate" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix pf-fix">location_on</i>
                                <input id="country" name="country" type="text" class="validate" required>
                                <label for="country">Country</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix pf-fix">layers</i>
                                <input id="level" name="level" type="text" class="validate" required>
                                <label for="level">Level</label>
                            </div>
                            <!-- <div class="file-field input-field col s12" style="width:80%; margin-left:20px;">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-action ta-right" style="border-bottom-left-radius: 30px; border-bottom-right-radius: 30px">
                        <a href="index.php" class="btn waves-effect waves-light btn-bk-color">Sign-In</a>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Sign-Up</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>