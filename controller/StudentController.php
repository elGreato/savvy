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
        $student = new Student();
        $student->setUsername($_POST["username"]);
        $student->setPassword($_POST["password"]);
        $student->setEmail($_POST["email"]);
        $studentVal = new StudentValidator($student);
        if(!$studentVal->isValid())
        {
            $nameError = $studentVal->getNameError();
            $emailError  = $studentVal->getEmailError();
            $passError = $studentVal->getPasswordError();
            $view = new TemplateView("view/register.php");
            if(isset($nameError)){
                $view->usernameMsg = $nameError;
            }
            if (isset($emailError)){
                $view->emailMsg = $emailError;
            }
            if (isset($passError)){
                $view->passwordMsg = $passError;
            }
            echo $view->createView();
        } else if ($_POST["password"] != $_POST["password-repeat"]) {
            $view = new TemplateView("view/register.php");
            $view->passwordMsg = 'Passwords do not match';
            echo $view->createView();
        } else if (!isset($_POST["agreement"])) {
            $view = new TemplateView("view/register.php");
            $view->passwordMsg = 'Please accept the license agreement';
            echo $view->createView();
        }
        else {
            $studentService = StudentServiceImpl::getInstance();
            $workStatus = $studentService->addStudent($_POST["username"],$_POST["password"], $_POST["email"]);

            if ($workStatus == 'successful') {
                Router::redirect('/main');

            } else if ($workStatus == 'usernameTaken') {
                $view = new TemplateView("view/register.php");
                $view->usernameMsg = "Username already taken";
                echo $view->createView();
            } else if ($workStatus == 'emailTaken') {
                $view = new TemplateView("view/register.php");
                $view->emailMsg = "Email already taken";
                echo $view->createView();
            } else {
                $view = new TemplateView("view/register.php");
                $view->usernameMsg = "Username already taken";
                $view->emailMsg = "Email already taken";
                echo $view->createView();
            }
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
           $view->msg = "Email not found";
           $view->iserror = "true";
           echo $view->createView();
       }
       else{
           if(EmailService::passwordReset($student)){
               $view = new TemplateView("view/passwordreset.php");
               $view->msg = "Request Sent";
               $view->iserror = "false";
               echo $view->createView();
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
            $studentService = StudentServiceImpl::getInstance();
            $student = $studentService->readStudent();
            $student->setPassword($_POST["password"]);
            $studentValidator->validate($student);
            if ($_POST["password"] == $_POST["repeatpassword"] && $studentValidator->getPasswordError() == null) {
                $studentService->resetPassword($student);
                Router::redirect("/login");
            } elseif ($_POST["password"] != $_POST["repeatpassword"]) {
                $view = new TemplateView("view/newpassword.php");
                $view->token =$_POST["token"];
                $view->errormsg = "The passwords do not match";
                echo $view->createView();
            } else {
                $view = new TemplateView("view/newpassword.php");
                $view->token =$_POST["token"];
                $view->errormsg = $studentValidator->getPasswordError();
                echo $view->createView();
            }
        }

    }
    public static function showMyProfile()
    {
        $view = new TemplateView("view/editProfile.php");
        $student =StudentServiceImpl::getInstance()->readStudent();
        $view->username = $student->getUsername();
        echo $view->createView();
    }
    public static function changePassword()
    {
        $studentValidator = new StudentValidator();
        $studentService = StudentServiceImpl::getInstance();
        $student = $studentService->readStudent();
        $student->setPassword($_POST["new_pw"]);
        $studentValidator->validate($student);
        if($_POST["new_pw"] == $_POST["rep_new_pw"]&& $studentValidator->getPasswordError() == null) {
            if (StudentServiceImpl::getInstance()->changePassword()) {
                $view = new TemplateView("view/editProfile.php");
                $student =StudentServiceImpl::getInstance()->readStudent();
                $view->username = $student->getUsername();
                $view->msg = "Change Successful";
                $view->iserror = false;
                echo $view->createView();
            } else {
                $view = new TemplateView("view/editProfile.php");
                $student =StudentServiceImpl::getInstance()->readStudent();
                $view->username = $student->getUsername();
                $view->msg = "Old password wrong";
                $view->iserror = true;
                echo $view->createView();
            }
        }
        else if ($_POST["new_pw"] != $_POST["rep_new_pw"]){
            $view = new TemplateView("view/editProfile.php");
            $student =StudentServiceImpl::getInstance()->readStudent();
            $view->username = $student->getUsername();
            $view->msg = "The two new passwords do not match";
            $view->iserror = true;
            echo $view->createView();
        }
        else {
            $view = new TemplateView("view/editProfile.php");
            $student =StudentServiceImpl::getInstance()->readStudent();
            $view->username = $student->getUsername();
            $view->msg = $studentValidator->getPasswordError();
            $view->iserror = true;
            echo $view->createView();
        }
    }
}