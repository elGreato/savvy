<?php
namespace controller;
use services\StudentServiceImpl;
use view\TemplateView;

/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/12/2017
 * Time: 3:49 PM
 */

class StudentController
{
    public static function register()
    {
        $studentService = StudentServiceImpl::getInstance();
        $workStatus = $studentService->addStudent($_POST["username"],$_POST["password"], $_POST["email"]);
        if($workStatus == "successful")
        {
            Router::redirect("/main");

        }
        else if($workStatus == "usernameTaken")
        {

        }
        else if($workStatus == "emailTaken")
        {
            return false;
        }
        else
        {
            return false;
        }
    }
}