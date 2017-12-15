<?php
require_once "header.php";


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>savvy</title>
    <link rel="stylesheet" href="assets/css/loginCss.css">

</head>

<body>
<div class="login-page">
    <div class="form">
        <form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form method="post" class="login-form">
            <input type="text" name="username" placeholder="username"/>
            <input type="password" name="password" placeholder="password"/>
            <?php if(isset($this->reply)):?>
            <p class="message" style="color: red;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php echo $this->reply;?></p>
            <?php endif;?>
            <div style="display: block">
            <label for="rememberme" class="message">
                <input id="rememberme" class="message" type="checkbox" name="rememberme" style="width: 10%;"> Remember me</label>
            </div>
            <br>
            <button type="submit">login</button>
            <p class="message">Not registered? <a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/register">Create an account</a></p>
            <p class="message">Forgot password? <a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/passwordreset">Reset password</a></p>

        </form>
    </div>
</div>
</body>
</html>
<?php require_once "footer.php"; ?>