<?php
/**
 * Created by PhpStorm.
 * User: Ali-Surface
 * Date: 11/28/2017
 * Time: 9:56 AM
 */

namespace controller;
use router\Router;
use view\TemplateView;

class ContactUsController
{
    public static function handleContactUs(){

        $conView = new TemplateView("view/thanks.php");
       echo $conView->createView();
    }
}