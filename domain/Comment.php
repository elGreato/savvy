<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 17:48
 */

namespace domain;


class Comment
{
    private $id;
    private $comment;
    private $image;
    private $studentid;
    private $moduleid;
    private $vote;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

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
    public function getModuleid()
    {
        return $this->moduleid;
    }

    /**
     * @param mixed $moduleid
     */
    public function setModuleid($moduleid)
    {
        $this->moduleid = $moduleid;
    }

    /**
     * @return mixed
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * @param mixed $vote
     */
    public function setVote($vote)
    {
        $this->vote = $vote;
    }
    public function getVoteResult()
    {
        $result = 0;
        global $vote;
        foreach($vote as $singleVote)
        {
            if ($singleVote.getVote() ==0)
            {
                $result -=1;
            }
            else
            {
                $result +=1;
            }
        }
        return $result;
    }

}