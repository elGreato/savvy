<?php
namespace controller;
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 20.11.2017
 * Time: 13:33
 */
use services\StudentServiceImpl;
use router\Router;
use view\TemplateView;
class AuthController
{
    public static function authenticate()
    {
        $authService = StudentServiceImpl::getInstance();
        if(isset($_SESSION["loginData"])&&
            $authService->validateToken($_SESSION["loginData"]["token"]))
        {
            return true;
        }
        else{
            return false;
        }
    }
    public static  function login(){
        $authService = StudentServiceImpl::getInstance();
        if($authService->verifyStudent($_POST["username"],$_POST["password"]))
        {
            $authService->issueToken();
            Router::redirect("/main");
            return true;
        }
        $view = new TemplateView("view/login.php");
        $view->reply = "Wrong username or password";
        echo $view->createView();
        return false;
    }
}