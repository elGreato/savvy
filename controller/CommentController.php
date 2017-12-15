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
            $newCom = new Comment();

            // instead of a fucking GET request
            $moduleId =(int) explode('=',$_SERVER['HTTP_REFERER'])[1];

            $newCom->setComment($_POST['content']);
            $newCom->setModuleid($moduleId);
            $newCom->setCreated($_POST['created']);
            // Tell Kev to turn off autoincrmenting comment ID
         //   $newCom->setParent($_POST['parent']);

            $comSer = new CommentingServiceImpl();
            $comSer->addComment($newCom);
        // now reply to the ajax to set values not to fuck up parents

        $reply = new \StdClass();
        $reply->id = $comSer->getLastInsertId($newCom);
       // $reply->parent = "baz";

        $json = json_encode($reply);
        echo $json;

    }
}
?>
