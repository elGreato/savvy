<?php
namespace controller;
use domain\Student;
use services\StudentServiceImpl;
use view\TemplateView;
use validator\studentValidator;
use router\Router;
use services\EmailService;
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
    public static function showPasswordReset()
    {
        $view = new TemplateView("view/passwordreset.php");
        echo $view->createView();
    }
    public static function resetPassword()
    {
       $student = StudentServiceImpl::getInstance()->readStudentByEmail($_POST['email']);
       if($student == null)
       {
           $view = new TemplateView("view/passwordreset.php");
           $view->errormsg = "Email not found";
           echo $view->createView();
       }
       else{
           if(EmailService::passwordReset($student)){
             Router::redirect("/passwordreset/successful");
           }
           else{
               echo"not successful";
           }
       }
    }
    public static function requestSent()
    {
        echo "Succesful";
    }
    public static function showNewPassword()
    {
        $view = new TemplateView("view/newpassword.php");
        $view->token = $_GET["token"];
        echo $view->createView();
    }
    public static function confirmNewPassword()
    {
        if(StudentServiceImpl::getInstance()->validateToken($_POST["token"])) {
            $studentValidator = new StudentValidator();
            $student = new Student();
            $student->setPassword($_POST["password"]);
            $studentValidator->validate($student);
            if ($_POST["password"] == $_POST["repeatpassword"] && $studentValidator->getPasswordError() == null) {
                $studentService = StudentServiceImpl::getInstance();
                $studentService->updateStudent($student);
                $view = new TemplateView("view/login.php");
                echo $view->createView();
            } elseif ($_POST["password"] == $_POST["repeatpassword"]) {
                $view = new TemplateView("view/newpassword.php");
                $view->errormsg = "The passwords do not match";
                echo $view->createView();
            } else {
                $view = new TemplateView("view/newpassword.php");
                $view->errormsg = $studentValidator->getPasswordError();
                echo $view->createView();
            }
        }

    }
}