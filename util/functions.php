<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/13/2017
 * Time: 6:59 PM
 */
// url for takes you to the public folder
function url_for($script_path)
{

    // add the leading '/' if not present

    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;

    }
    return WWW_ROOT . $script_path;
}


    function u($string=""){
        return urlencode($string);
    }


    function raw_u($string=""){
        return rawurlencode($string);
    }

    function h($string=""){
        return htmlspecialchars($string);
    }

?>