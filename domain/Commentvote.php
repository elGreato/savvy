<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 17:48
 */

namespace domain;


class Commentvote
{
    private $studentid;
    private $commentid;
    /**
     * @return mixed
     */
    public function getStudentid()
    {
        return $this->studentid;
    }

    /**
     * @param mixed $studentid
     */
    public function setStudentid($studentid)
    {
        $this->studentid = $studentid;
    }

    /**
     * @return mixed
     */
    public function getCommentid()
    {
        return $this->commentid;
    }

    /**
     * @param mixed $commentid
     */
    public function setCommentid($commentid)
    {
        $this->commentid = $commentid;
    }

}