<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/12/2017
 * Time: 12:35 PM
 */
require_once "headerLoggedIn.php";
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
    <link rel="stylesheet" href="assets/css/stylesModulesOverview.css">

</head>

<body>

    <div id="content">
        <div class="page-header" style="width:800px;">
            <h1>Modules List<small> FHNW </small></h1></div>
        <div style="margin-top:10px;width:100%;max-width:800px;min-width:200px;border:2px solid lightgrey;padding-left:0px;padding-bottom:0px;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="tableheader numberColumn" style="width:20px;">ID</th>
                    <th class="tableheader" style="max-width:none;">Name </th>
                    <th class="tableheader numberColumn" style="width:80px;">ECTS </th>
                    <th class="tableheader numberColumn" style="width:80px;">Inscript. </th>
                    <th class="tableheader" style="width:40px;"> </th>
                    <th class="tableheader" style="width:40px;"> </th>
                    <th class="tableheader" style="width:40px;"> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($this->modules as $module):?>
                <tr>
                    <td class="numberColumn"><?php echo $module->getId()?></td>
                    <td style="font-weight:bold;"><?php echo $module->getName()?></td>
                    <td class="numberColumn"><?php echo $module->getNumCredits()?></td>
                    <td class="numberColumn"><?php echo $module->getInscriptions()?> </td>
                    <td style="color:rgb(100,0,0);">
                        <button class="btn btn-default openButton" type="button"> <i class="glyphicon glyphicon-search searchButton"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-default editButton" type="button"> <i class="glyphicon glyphicon-pencil"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-default deleteButton" type="button"> <i class="glyphicon glyphicon-trash"></i></button>
                    </td>
                </tr>
                <?php endforeach;?>

                </tbody>
            </table>

        </div>

        <button onclick="location.href='<?php echo $GLOBALS["ROOT_URL"]; ?>/main/addmodule'"  class="btn btn-default addButton" type="button" style="margin-top: 10px"><a href="/main/addmodule">Add Module</a></button>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
<?php

require_once ("footer.php");
?>
