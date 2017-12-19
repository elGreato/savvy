<?php
/**
 * Created by PhpStorm.
 * User: Ali / Kevin
 * Date: 13.11.2017
 * Time: 17:48
 */

namespace domain;


use services\StudentServiceImpl;

class Comment
{
    private $id;
    private $comment;
    private $image;
    private $studentid;
    private $studentname;
    private $moduleid;
    private $created;
    private $vote;
    private $parent;
    private $isFromUser;
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
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
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
        $votecalc = $this->vote;
        if(is_array($votecalc)) {
            $result = sizeof($votecalc);
        }
        elseif(isset($votecalc))
        {
            $result += 1;
        }
        else
        {
            $result = 0;
        }
        return $result;
    }
    /**
     * @return mixed
     */
    public function getStudentname()
    {
        return $this->studentname;
    }

    /**
     * @param mixed $studentname
     */
    public function setStudentname($studentname)
    {
        $this->studentname = $studentname;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getIsFromUser()
    {
        return $this->isFromUser;
    }

    /**
     * @param mixed $isFromUser
     */
    public function setIsFromUser($isFromUser)
    {
        $this->isFromUser = $isFromUser;
    }
    public function hasLiked(){
        if(is_array($this->vote))
        {
            foreach ($this->vote as $singlevote)
            {
                if($singlevote->getStudentid()==StudentServiceImpl::getInstance()->getCurrentStudentId())
                {
                    return true;
                }
            }

        }
        elseif(isset($this->vote))
        {
            if($this->vote->getStudentid()==StudentServiceImpl::getInstance()->getCurrentStudentId())
            {
                return true;
            }
        }
       return false;
    }
    public function isNew()
    {
        date_default_timezone_set('UTC');
       // echo date('d-m-Y');

        $today = date("Ymd");

        $cr = date("Ymd" , strtotime($this->created));
    //   var_dump($cr);
        $diff = $today - $cr;
      //  var_dump($dif);

        if($diff<=1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}