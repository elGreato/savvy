<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/13/2017
 * Time: 6:59 PM
 */

// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory

// those constants are for file paths, not browser
define("UTIL_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(UTIL_PATH));

define("ASSETS_PATH", PROJECT_PATH.'/view/assets');



// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '/ali/savvy/view');
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/view"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/view') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);


require_once "functions.php";

