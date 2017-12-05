<?php
namespace controller;
use domain\Student;
use services\StudentServiceImpl;
use view\TemplateView;
use validator\studentValidator;
use router\Router;
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
        $student = new Student();
        $student->setUsername($_POST["username"]);
        $student->setPassword($_POST["password"]);
        $student->setEmail($_POST["email"]);
        $studentVal = new StudentValidator($student);
        if($studentVal->getNameError() == 'Oops! you didnt Enter a name')
        {
            $view = new TemplateView("view/register.php");
            $view->usernameMsg = 'Oops! you didnt Enter a name';
            echo $view->createView();
        }
        else if($studentVal->getEmailError() == 'You have forgot to enter an email address')
        {
            $view = new TemplateView("view/register.php");
            $view->emailMsg = 'You have forgot to enter an email address';
            echo $view->createView();
        }
        else if($studentVal->getPasswordError() == 'Please enter a password')
        {
            $view = new TemplateView("view/register.php");
            $view->passwordMsg = 'Please enter a password';
            echo $view->createView();
        }
        else if ($_POST["password"]!=$_POST["password-repeat"])
        {
            $view = new TemplateView("view/register.php");
            $view->passwordMsg = 'Passwords do not match';
            echo $view->createView();
        }
        else if (!isset($_POST["agreement"]))
        {
            $view = new TemplateView("view/register.php");
            $view->passwordMsg = 'Please accept the license agreement';
            echo $view->createView();
        }
        else if($workStatus == 'successful')
        {
            Router::redirect('/main');

        }
        else if($workStatus == 'usernameTaken')
        {
            $view = new TemplateView("view/register.php");
            $view->usernameMsg = "Username already taken";
            echo $view->createView();
        }
        else if($workStatus == 'emailTaken')
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