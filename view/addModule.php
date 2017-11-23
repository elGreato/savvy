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
        <div class="page-header">
            <h1>Add Module<small>FHNW </small></h1>
            <form><span class="label label-default inputDescription">Name </span>
                <input class="form-control textInputs" type="text"><span class="label label-default inputDescription">Description </span>
                <textarea class="form-control textInputs"></textarea><span class="label label-default inputDescription">ECTS </span>
                <input class="form-control" type="number">
                <button class="btn btn-default" type="button" style="margin-top:10px;">Create </button>
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