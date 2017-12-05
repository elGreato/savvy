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
            $view = new TemplateView("view/register.php");
            $view->usernameMsg = "Username already taken";
            echo $view->createView();
        }
        else if($workStatus == "emailTaken")
        {
            $view = new TemplateView("view/register.php");
            $view->emailMsg = "Email already taken";
            echo $view->createView();
        }
        else
        {
            $view = new TemplateView("view/register.php");
            $view->usernameMsg = "Username already taken";
            $view->emailMsg = "Email already taken";
            echo $view->createView();
        }
    }
}