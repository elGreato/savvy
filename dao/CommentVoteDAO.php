<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:46
 */

namespace dao;
use domain\Commentvote;
use \PDO;
class CommentVoteDAO extends BasicDAO
{
    public function create(Commentvote $commentlike)
    {
        $stmt=$this->pdoInstance->prepare('INSERT INTO commentlike 
          (studentid,commentid) VALUES 
          (:studentid,:commentid);');
        $stmt->bindValue(':studentid',$commentlike->getStudentID());
        $stmt->bindValue(':commentid',$commentlike->getSelector());
        $stmt->execute();
    }
    public function readCommentLikes($commentID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM commentlike WHERE commentid = :commentid;');
        $stmt->bindValue(':commentid',$commentID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Commentvote");

    }

    public function delete($commentID,$studentID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM "commentlike" where commentid = :commentid AND $studentID = :$studentID');
        $stmt->bindValue(':commentid', $commentID);
        $stmt->bindValue(':studentid', $studentID);
        $stmt->execute();
    }
}