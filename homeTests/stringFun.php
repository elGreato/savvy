<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/5/2017
 * Time: 9:32 AM
 */

echo strlen("Hello");
echo "<br>";
/* The strpos() function finds the position of the first occurrence of a string
inside another string. */
echo strpos("I love php, I love php too!", "php");
echo "<br>";
// The substr() function returns a part of a string.
echo substr("Hello world", 6);
echo "<br>";
// The substr_replace() function replaces a part of a string with another string.
echo substr_replace("Hello", "world", 0);
echo "<br>";