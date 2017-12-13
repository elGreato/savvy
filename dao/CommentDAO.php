<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:46
 */

namespace dao;

use domain\comment;

class CommentDAO extends BasicDAO
{
    public function create(Comment $comment)
    {
        $stmt=$this->pdoInstance->prepare("INSERT INTO comment
          (comment, image, created, parent, moduleid,studentid) VALUES 
          (:comment, :image, :created, :parent :moduleid,:studentid);");
        $stmt->bindValue(':comment',$comment->getComment());
        $stmt->bindValue(':image',$comment->getImage());
        $stmt->bindValue(':created',$comment->getCreated());
        $stmt->bindValue(':parent',$comment->getParent());
        $stmt->bindValue(':moduleid',$comment->getModuleid());
        $stmt->bindValue(':studentid',$comment->getStudentid());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }
    public function read($commentID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM "comment" WHERE id = :id;');
        $stmt->bindValue(':id',$commentID);
        $stmt->execute();
        $comment = null;
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Comment");
        if(!empty($result)){
            $comment = $result[0];
        }
        return $comment;


    }
    public function readCommentsForModule($moduleID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM "comment" WHERE moduleid = :moduleId;');
        $stmt->bindValue(':moduleId',$moduleID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Comment");

    }
    public function delete($commentID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM "comment" where id = :id');
        $stmt->bindValue(':id', $commentID);
    }
    public  function update(Comment $comment)
    {
        $stmt = $this->pdoInstance->prepare('UPDATE "comment" SET comment = :comment, image = :image, moduleid = :moduleid, studentid = :studentid WHERE id=:id');
        $stmt->bindValue(':id',$comment->getID());
        $stmt->bindValue(':comment',$comment->getComment());
        $stmt->bindValue(':image',$comment->getImage());
        $stmt->bindValue(':moduleid',$comment->getModuleid());
        $stmt->bindValue(':studentid',$comment->getStudentid());
        $stmt->execute();
    }
}