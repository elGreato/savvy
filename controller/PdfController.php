<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 12/20/2017
 * Time: 1:21 PM
 */

namespace controller;
use view\TemplateView;
use services\ModuleServiceImpl;


class PdfController
{
    public static function startPdf(){

        $pdfView = new TemplateView("view/pdfContent.php");
        $modImp = new ModuleServiceImpl();
        $deserlized = unserialize(base64_decode($_POST['mymods']));
        $arr = array();
        foreach ($deserlized as $r):
       array_push($arr,  $modImp->readModule($r)->getName());
        endforeach;
        $pdfView->allmods = $arr;


      echo $pdfView->createView();


    }


}