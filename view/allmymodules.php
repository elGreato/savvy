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
    <title>All My Selected Modules</title>
</head>
<body>

<div>
<?php

foreach ($this->allmods as $r):?>
<span id="but" style="color: #000; display: inline-block; font-size: 30px">
    <?php

    // this is to show the mods to the user

    echo $this->modService->readModule($r)->getName();

     ?>
    <h4>amount of credits : </h4>
    <?php

 echo $this->modService->readModule($r)->getNumcredits();



?>

</span>
    <?php
endforeach;
?>

</div>
<span id="but2"> total amount of credits registered are : <?php echo $this->modSelectService->showNumCredits()?></span>
<form method="post" action="<?php echo $GLOBALS["ROOT_URL"]; ?>/pdfContent" id="pdfForm">

   <input name="mymods" type="hidden" value="<?php echo  base64_encode(serialize($this->allmods)) ?>">
<input type="submit" value="PDF">
</form>
</body>



<?php


require_once ("footer.php");
?>

