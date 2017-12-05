<?php
/**
 * Created by PhpStorm.
 * User: Ali-Surface
 * Date: 12/5/2017
 * Time: 11:26 AM
 */


namespace controller;
use dao\ModuleDAO;
use domain\Module;
use services\ModuleServiceImpl;
use view\TemplateView;


class ModelContentController{

    public static function handleModule(){

        $conView = new TemplateView("view/module.php");
        $modImp = new ModuleServiceImpl();
        $conView->mod = $modImp->readModule($_GET[id]) ;



        echo $conView->createView();
    }













}