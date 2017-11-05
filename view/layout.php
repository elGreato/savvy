<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/5/2017
 * Time: 3:41 PM
 */

function layoutSetContent($content){
    require_once ("header.php");
    require_once ("footer.php");
    require_once ($content);
}
?>