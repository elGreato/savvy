<?php
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
                <tr>
                    <td class="numberColumn">1</td>
                    <td style="font-weight:bold;">Programming I</td>
                    <td class="numberColumn">4 </td>
                    <td class="numberColumn">14 </td>
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
                <tr>
                    <td class="numberColumn">2 </td>
                    <td style="font-weight:bold;">Practical Project</td>
                    <td class="numberColumn">12 </td>
                    <td class="numberColumn">9 </td>
                    <td>
                        <button class="btn btn-default openButton" type="button"> <i class="glyphicon glyphicon-search"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-default editButton" type="button"> <i class="glyphicon glyphicon-pencil"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-default deleteButton" type="button"> <i class="glyphicon glyphicon-trash"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        <button class="btn btn-default addButton" type="button" style="margin-top: 10px">Add Module</button>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
<?php

require_once ("footer.php");
?>
