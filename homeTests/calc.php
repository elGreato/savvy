<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/5/2017
 * Time: 8:11 AM
 */

$capital = $_POST["x"];
echo "If you invest $capital. You will have in one year: ";
$capital = $capital/2;
echo $capital;

for ($x = 32; $x <= 255; $x++) {
    echo "&#$x;" . "<br/>";
}
