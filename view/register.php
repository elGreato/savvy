<?php
require_once "header.php";

?>
<!DOCTYPE html>
<html>

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
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder" style="background-image:url(&quot;assets/img/register.jpg&quot;);"></div>
            <form method="post">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group">
                    <input class="form-control" type="username" name="username" placeholder="Username">
                    <p class="message" style="color: red;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php if(isset($this->usernameMsg)){echo $this->usernameMsg;}?></p>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                    <p class="message" style="color: red;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php if(isset($this->emailMsg)){echo $this->emailMsg;}?></p>

                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)">
                    <p class="message" style="color: red;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php if(isset($this->passwordMsg)){echo $this->passwordMsg;}?></p>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label class="control-label">
                            <input type="checkbox" name="agreement">I agree to the license terms.</label>
                        <p class="message" style="color: red;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php if(isset($this->agreementMsg)){echo $this->agreementMsg;}?></p></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                </div><a href=<?php echo $GLOBALS["ROOT_URL"]; ?>/login" class="already">You already have an account? Login here.</a></form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php require_once("footer.php"); ?>