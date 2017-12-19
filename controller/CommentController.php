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

            // Get the module id
            $moduleId =(int) explode('=',$_SERVER['HTTP_REFERER'])[1];

            $newCom->setComment($_POST['content']);
            $newCom->setModuleid($moduleId);
            $newCom->setCreated($_POST['created']);
            // Tell Kev to turn off autoincrmenting comment ID
        if(!empty($_POST['parent'])) {
            $newCom->setParent($_POST['parent']);
        }
            $comSer = new CommentingServiceImpl();
            $comSer->addComment($newCom);
        // now reply to the ajax to set values not to fuck up parents

        $reply = new \StdClass();
        $reply->id = $comSer->getLastInsertId($newCom);


        $json = json_encode($reply);
        echo $json;

    }

    public static function editComment(){
        $commentDAO = new CommentDAO();
        $commentToEdit = $commentDAO->read($_POST['id']);
        $commentToEdit->setComment($_POST['content']);

       $comSer = new CommentingServiceImpl();
       $comSer->updateComment($commentToEdit);

        $reply = new \StdClass();
        //$reply->id = $comSer->getLastInsertId($commentToEdit);


        $json = json_encode($reply);
        echo $json;

    }
    public static function deleteComment(){
        $commentDAO = new CommentDAO();
        $commentDAO->delete($_GET['id']);
    }
    public static function upvote(){
        $upvoted = $_GET['user_has_upvoted'];
        $commentSer = new CommentingServiceImpl();
        echo "the comment that was voted is: "+$_GET['id']+" and its content is : "+$_GET['content'];
        $commentSer->voteOnComment($_GET['id'],$upvoted);
    }
}
?>
