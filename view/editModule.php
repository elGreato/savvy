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
            <h1>Edit Module<small>FHNW </small></h1>
            <form>
                <input type="hidden" name="module_id" class="form-control textInputs" value="<?php if(isset($this->id)){echo $this->id;}?>">
                <span class="label label-default inputDescription">Name </span>
                <input name="module_name" class="form-control textInputs" type="text"value="<?php if(isset($this->name)){echo $this->name;}?>">
                <p class="message" style="color: red;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php if(isset($this->nameReply)){echo $this->nameReply;}?></p>
                <span class="label label-default inputDescription">Description </span>
                <textarea name="module_description" class="form-control textInputs"><?php if(isset($this->description)){echo $this->description;}?></textarea>
                <p class="message" style="color: red;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php if(isset($this->descriptionReply)){echo $this->descriptionReply;}?></p>
                <span class="label label-default inputDescription">ECTS </span>
                <input name="num_credits" class="form-control" type="number"value="<?php if(isset($this->ects)){echo $this->ects;}?>">
                <p class="message" style="color: red;margin-top: 0; padding-top: 0; margin-bottom: 10px;"><?php if(isset($this->ectsReply)){echo $this->ectsReply;}?></p>
                <button class="btn btn-default" type="submit" formmethod="post" style="margin-top:10px;">Save Changes</button>
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