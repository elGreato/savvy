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
use services\ModuleSelectionServiceImpl;

class MyModulesController
{
    public static function handleSelectedModules()
    {

        $conView = new TemplateView("view/mymodules.php");
        //this is just for view
        $conView->modService = new ModuleServiceImpl();
        //this is for the DB
        $conView->modSelectService = new ModuleSelectionServiceImpl();

        $conView->selected = $_POST['modID'];





        echo $conView->createView();

    }
    //add a method for myTopics
    public static function showMyModules()
    {

        $conView = new TemplateView("view/allmymodules.php");
        $conView->modSelectService = new ModuleSelectionServiceImpl();
        $conView->modService = new ModuleServiceImpl();
         $m = array();
        foreach ($conView->modSelectService->showSelectedModules() as $r){
            $m[]= $r->getId();
        }

        $conView->allmods =$m;
        echo $conView->createView();
    }
}