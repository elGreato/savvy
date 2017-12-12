<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 12/12/2017
 * Time: 10:23 AM
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
/*    $newCom = new Comment();

    $newCom->setId($_SESSION['id']);

    $comSer = new CommentingServiceImpl();

    $comSer->addComment($newCom);

    echo($newCom);
    return "google.com";*/

    $myObj->name = "John";
    $myObj->age = 30;
    $myObj->city = "New York";

    $myJSON = json_encode($myObj);

    echo $myJSON;

}

?>