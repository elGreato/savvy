<?php
namespace controller;
use services\StudentServiceImpl;
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/12/2017
 * Time: 3:49 PM
 */

class StudentController
{
    public function register()
    {
        $studentService = StudentServiceImpl::getInstance();
        $workStatus = $studentService->addStudent($_POST["username"],$_POST["password"], $_POST["email"]);
        if($workStatus == "successful")
        {
            return true;

        }
        else if($workStatus == "usernameTaken")
        {
            return false;
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