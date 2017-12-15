<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 23.11.2017
 * Time: 16:55
 */?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>savvy</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">

    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">

    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><strong><em>Savvy</em> </strong></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/main"><strong>All topics</strong></a></li>
                    <li class="active" role="presentation"><a href="#"><strong>My Topics</strong></a></li>
                    <li class="active" role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/myprofile"><strong>My Profile</strong></a></li>
                    <li class="active" role="presentation"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/logout"><strong>Logout</strong></a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>