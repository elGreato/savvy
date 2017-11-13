<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 17:48
 */

namespace domain;


class Inscription
{
    private $studentid;
    private $moduleid;

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

}