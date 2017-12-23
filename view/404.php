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
if($this->loggedIn){
    require_once"headerLoggedIn.php";
}
else {
    require_once "header.php";
}
?>
<body>
<div class="addModuleDiv">
    <div class="page-header" style="width:50vw">
        <h1>404<small>Not Found </small></h1>
        <p>The requested page does not exist. </p><br><p>To navigate to your desired destination, please visit our </p><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>./">Main Page</a>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

<?php
require_once "footer.php";
?>
</html>