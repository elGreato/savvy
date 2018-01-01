<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 23.12.2017
 * Time: 19:23
 */

namespace controller;

use view\TemplateView;

class ErrorController
{
    public static function show404(){
        $view = new TemplateView("404.php");
        if(AuthController::authenticate()) {
            $view->loggedIn = true;
        }
        else {
            $view->loggedIn = false;
        }
        echo ($view->createView());


    }
}
?>