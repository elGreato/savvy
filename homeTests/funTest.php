<!DOCTYPE html>
<html>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/5/2017
 * Time: 9:50 AM
 */

$makeCapital =function  ($fName, $lName){

    $fName = strtoupper($fName);
    $lName = strtolower($lName);

    return $fName. " ". $lName;
};
echo $makeCapital("ali", "HabbAbeh");


$salo = array("Salo", "lang");

echo  call_user_func_array($makeCapital,$salo);

?>
</body>
</html>