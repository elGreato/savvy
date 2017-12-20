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
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/stylesModulesOverview.css">
    <link rel="stylesheet" href="assets/css/mainPage.css">

</head>


<form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/myModules" method="post" id="modForm">
    <div id="content">
        <div class="page-header" style="width:800px;">
            <h1>Modules List<small> FHNW </small></h1></div>



                <?php

                foreach ($this->modules as $module):?>
                <div class="columns">
                    <div class="price">
                        <li class="header" style="font-weight:bold;"><?php echo $module->getName()?></li>
                        <li class="grey"> <input type="checkbox" name="modID[]" value="<?php echo $module->getId()?>">Add this module to my list</li>


                        <li ><strong>credits: <?php echo $module->getNumCredits()?></strong></li>
                        <li class="numberColumn">number of students inscribed: <strong><?php echo $module->getInscriptions()?></strong> </li>
                        <li >
                            <a class="button" type="button" id="opnModuleBtn" href=" <?php echo $GLOBALS["ROOT_URL"]. "/module?id=".$module->getId(); ?> ">Discuss</a>
                        </li>

                        <li>
                            <?php if ($this->studentid == $module->getEditorid()):?>
                            <a class="button" type="button" style=" background-color: cornflowerblue" href="<?php echo $GLOBALS["ROOT_URL"]. "/main/editmodule?id=".$module->getId();?>"> <i class="glyphicon glyphicon-pencil"></i></a>
                            <?php
                            else:?>
                                <a class="button" disabled style=" background-color: grey"> <i class="glyphicon glyphicon-pencil"></i></a>
                            <?php
                            endif; ?>
                            </li>

                        <li>
                            <?php  if ($this->studentid == $module->getEditorid()):?>
                            <button class="button" style=" background-color: red" type="button" onclick="deleteModule(<?php echo $module->getId();?>)"> <i class="glyphicon glyphicon-trash"></i></button>
                                <?php
                            else:?>
                                <a class="button" disabled style=" background-color: grey"> <i class="glyphicon glyphicon-trash"></i></a>

                            <?php endif; ?>
                        </li>
                    </div>
                </div>
                <?php  endforeach;?>

        </div>
        <div class="btnContain">
         <input type="submit" id="but2" value="Add Selected Modules"></a>
        </div>
    <!--<input type="submit" value="Submit">-->
        </form>
        <div class="btnContain">
        <a onclick="location.href='<?php echo $GLOBALS["ROOT_URL"]; ?>/main/addmodule'"  id="but"><span>Add New Module</span></a>
        </div>
        </div>

    <script type="text/javascript">
        function deleteModule(id) {
            if(confirm("Do you really want to delete this module?"))
            {
               location.replace(location.href + "/deletemodule?id="+id);

            }
        }

    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
<?php

require_once ("footer.php");
?>
