<?php
/**
 * Created by PhpStorm.
 * User: Ali-Surface
 * Date: 12/5/2017
 * Time: 2:06 PM
 */

namespace controller;
use dao\CommentDAO;
use domain\Comment;
use services\CommentingServiceImpl;

//use view\TemplateView;


class CommentController
{


    public static function showComments()
    {

        $comentImp = new CommentingServiceImpl();

        $comments = $comentImp->readCommentsForModule($_GET["id"]);

        // echo var_dump($comments);
        return $comments;

    }

    public static function getAuthors($comment)
    {
        $commentImp = new CommentingServiceImpl();

        return $commentImp->readCommentAuthor($comment);
    }


//require __DIR__.'config/Autoloader.php';

    public static function saveComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $newCom = new Comment();

           // $newCom->setId($_POST['id']);
            $newCom->setComment($_POST['content']);
            $newCom->setModuleid('3');
            $newCom->setStudentid('7');
            $jsonTest = json_encode($newCom);
            echo $jsonTest;


            $comSer = new CommentingServiceImpl();

            $comSer->addComment($newCom);

            /*
                $myObj = new \stdClass();
                $myObj->id = $_POST['id'];
                $myObj->age = 30;
                $myObj->city = $_POST['content'];

                $myJSON = json_encode($myObj);

                echo $myJSON;*/

        }
    }
}
?>
