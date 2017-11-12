<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/5/2017
 * Time: 10:24 AM
 */
session_start();
echo $_SESSION[' viewCount'];

for($x = 0; $x < 10; $x++) {
    echo $_SESSION[' viewCount'];
    echo "<br>";
}