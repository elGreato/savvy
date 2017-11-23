<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 23.11.2017
 * Time: 17:41
 */

namespace controller;
use view\TemplateView;

class ModuleController
{
    public static function showModules()
    {
        $tempView = new TemplateView("view/main.php");
        echo $tempView->createView();
    }
    public static function showAddModule()
    {
        $tempView = new TemplateView("view/addModule.php");
        echo $tempView->createView();
    }
}