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
        if((isset($_SESSION["loginData"])&&
            $authService->validateToken($_SESSION["loginData"]["token"]))||(isset($_COOKIE["token"])&&$authService->validateToken($_COOKIE["token"])))
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
            $_SESSION["loginData"]["token"]=  $authService->issueToken();
            Router::redirect("/main");
            if(isset($_POST["rememberme"]))
            {
                setcookie("token",$_SESSION["loginData"]["token"], (new \DateTime('now'))->modify('+7 days')->getTimestamp());
            }

            return true;
        }
        $view = new TemplateView("view/login.php");
        $view->reply = "Wrong username or password";
        echo $view->createView();
        return false;
    }
    public static function logout()
    {
        session_destroy();
    }
}