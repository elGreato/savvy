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
            echo"verification successful";
            Router::redirect("/");
            return true;
        }
        echo "verification failed";
        return false;
    }
}