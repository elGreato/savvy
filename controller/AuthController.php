<?php
namespace controller;
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 20.11.2017
 * Time: 13:33
 */
use services\StudentServiceImpl;
class AuthController
{
    public function login(){
        $authService = StudentServiceImpl::getInstance();
        if($authService->verifyStudent($_POST["username"],$_POST["password"]))
        {
            return true;
        }
        return false;
    }
}