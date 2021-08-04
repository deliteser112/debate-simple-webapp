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
            <div class="font-logo-position">
                <h1 class="font-logo">DEBATE</h1>
            </div>
            <form action="controller/signin_controller.php" method="GET">
                <div class="card" style="max-width: 500px; margin: auto; border-radius: 30px">
                    <div class="card-image">
                        <span class="card-title" style="color: black">Sign In</span>
                    </div>
                    <div class="card-content">
                        <div class="row">
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
                        </div>
                    </div>
                    <div class="card-action ta-right" style="border-bottom-left-radius: 30px; border-bottom-right-radius: 30px">
                        <a href="signup.php" class="btn waves-effect waves-light btn-bk-color">Sign-Up</a>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Sign-In</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>