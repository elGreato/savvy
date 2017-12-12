<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 12/12/2017
 * Time: 10:23 AM
 */
//without this buffer im getting issues, discuss with Mr. Andreas
/*ob_start();*/


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

/*
    $newCom = new Comment();

    $newCom->setId($_POST['id']);
    $newCom = json_encode($newCom);*/

 /*   echo $newCom->getId();

    $comSer = new CommentingServiceImpl();

    $comSer->addComment($newCom);*/


        $myObj = new stdClass();
        $myObj->id = $_POST['id'];
        $myObj->age = 30;
        $myObj->city = $_POST['content'];

        $myJSON = json_encode($myObj);

        echo $myJSON;

}


/*echo json_decode(array("id" => "15", "un" => "Ali", "date" => ""));*/
?>