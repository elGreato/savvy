<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 12/20/2017
 * Time: 1:21 PM
 */

namespace controller;
use view\TemplateView;



class PdfController
{
    public static function startPdf(){

        $pdfView = new TemplateView("view/pdfContent.php");

      echo $pdfView->createView();


    }


}