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
    <h1>Enter new password</h1>
        <form method="post" class="login-form">
            <input type="hidden" name="token"value="<?php echo $this->token ?>">
            <input type="password" name="password" placeholder="password">
            <input type="password" name="repeatpassword" placeholder="password (repeat)">
            <?php if (isset($this->errormsg)): ?>
                <p class="message" style="color: red"><?php echo $this->errormsg ?></p>
            <?php endif ?>
            <button type="submit">Reset Password</button>

        </form>
    </div>
</div>
</body>
</html>
<?php require_once "footer.php"; ?>