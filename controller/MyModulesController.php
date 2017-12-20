<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 12/20/2017
 * Time: 10:35 AM
 */

namespace controller;
use view\TemplateView;
use services\ModuleServiceImpl;

class MyModulesController
{
    public static function handleSelectedModules()
    {

        $conView = new TemplateView("view/mymodules.php");

        $conView->modService = new ModuleServiceImpl();


        $conView->selected = $_POST['modID'];





        echo $conView->createView();

    }
}