<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addModule</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/stylesAddModule.css">
</head>
<?php
require_once "headerLoggedIn.php";
?>
<body>
    <div class="addModuleDiv">
        <div class="page-header" style="width:50vw">
            <h1><?php echo $this->username ?><small>Edit Profile</small></h1>
            <h2>Change Password</h2>
            <form>
                <input type="hidden" name="username"value="<?php echo $this->username ?>">
                <span class="label label-default inputDescription">New Password</span>
                <input name="new_pw" class="form-control textInputs" type="text">
                <span class="label label-default inputDescription">New Password (repeat)</span>
                <input name="rep_new_pw" class="form-control textInputs" type="text">
                <span class="label label-default inputDescription">Old Password</span>
                <input name="old_pw" class="form-control textInputs" type="text">
                 <p class="message" style="color: <?php if(isset($this->msg)){if($this->iserror){echo "red";}else {echo "green";}}?>;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php if(isset($this->msg)){echo $this->msg;}?></p>
                <button class="btn btn-default" type="submit" formmethod="post" style="margin-top:10px;">Confirm</button>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

<?php
require_once "footer.php";
?>
</html>