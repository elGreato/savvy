<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 12/20/2017
 * Time: 11:15 AM
 */
require_once "headerLoggedIn.php";

?>
<head>
<link rel="stylesheet" href="assets/css/mainPage.css">
    <title>My Modules</title>
</head>
<body>
<div>
<?php
$credit=0;
foreach ($this->selected as $r):?>
<span id="but" style="color: #000; display: inline-block; font-size: 30px">
    <?php
echo $this->modService->readModule($r)->getName();?>
    <h4>amount of credits : </h4>
    <?php

echo $this->modService->readModule($r)->getNumcredits();
    $credit+=$this->modService->readModule($r)->getNumcredits();



?>

</span>
    <?php
endforeach;
?>

</div>
<span id="but2"> total amount of credits registered are : <?php echo $credit?></span>
<button href="<?php echo $GLOBALS["ROOT_URL"]; ?>/main/pdfContent"> get pdf</button>
</body>



<?php


require_once ("footer.php");
?>
