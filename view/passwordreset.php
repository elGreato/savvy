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
    <h1>Reset Password</h1>
        <form method="post" class="login-form">
            <input type="text" name="email" placeholder="email">
            <?php if (isset($this->msg)): ?>
                <p class="message" style="color: <?php if(isset($this->error)&&$this->iserror){echo "red";}else{echo "green";}?>"><?php echo $this->msg ?></p>
            <?php endif ?>
            <button type="submit">Send request</button>

        </form>
    </div>
</div>
</body>
</html>
<?php require_once "footer.php"; ?>