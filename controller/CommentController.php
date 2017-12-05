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


class CommentController {



    public static function showComments(){

        $comentImp = new CommentingServiceImpl();

       $comments = $comentImp->readCommentsForModule($_GET["id"]) ;

     // echo var_dump($comments);
        return $comments;


}


}
?>