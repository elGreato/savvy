<?php
session_start();
require_once("view/layout.php");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savvy</title>

    <link rel="stylesheet" href="view/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="view/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="view/assets/css/Features-Blue.css">
    <link rel="stylesheet" href="view/assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="view/assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="view/assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="view/assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="view/assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="view/assets/css/styles.css">
</head>

<body style="background-image:url(&quot;assets/img/background.jpg&quot;);">
<nav class="navbar navbar-default" style="height:90px;">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-size:48px;height:55px;margin:-10px;padding:5px;"><strong><em>Savvy</em> </strong></a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active" role="presentation"><a href="#" style="height:55px;color:rgb(0,2,6);font-size:30px;"><strong>Register</strong> </a></li>
                <li role="presentation"><a href="#" style="height:55px;color:rgb(0,2,6);font-size:30px;"><strong>Login</strong> </a></li>
                <li role="presentation"><a href="#" style="height:55px;color:rgb(0,1,1);font-size:30px;"><strong>Contact us</strong></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron" style="margin:30px;background-color:rgba(236,237,236,0.52);">
    <h1 class="text-center">Why Savvy</h1>
    <p class="text-center">@ Savvy you can easily choose your path till graduation and even get to talk about it! </p>
    <p class="text-center">
        <button class="btn btn-success btn-lg" type="submit">Learn more</button>
    </p>
</div>
<div class="footer-dark" style="background-color:rgba(8,8,8,0.51);margin-top:13%;">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6 item text">
                    <h3>Savvy </h3>
                    <p>A small paragraph about our vision and bla bla later to add on, Remind me Kevin</p>
                </div>
                <div class="col-md-3 col-md-pull-6 col-sm-4 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">ECTS Calculation</a></li>
                        <li><a href="#">Tweeting </a></li>
                        <li><a href="#">Voting </a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-md-pull-6 col-sm-4 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Savvy Services</a></li>
                        <li><a href="#">Savvy Team</a></li>
                        <li><a href="#">Web Engineering Project</a></li>
                    </ul>
                </div>
                <div class="col-md-12 col-sm-4 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
            </div>
            <p class="copyright">Savvy © 2017</p>
        </div>
    </footer>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>