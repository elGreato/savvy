<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:50
 */

namespace domain;


use services\StudentServiceImpl;

class Module
{
    private $id;
    private $name;
    private $description;
    private $numcredits;
    private $inscriptions;
    private $editorid;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getNumcredits()
    {
        return $this->numcredits;
    }

    /**
     * @param mixed $numcredits
     */
    public function setNumcredits($numcredits)
    {
        $this->numcredits = $numcredits;
    }

    /**
     * @return mixed
     */
    public function getInscriptions()
    {
        return $this->inscriptions;
    }

    /**
     * @param mixed $inscriptions
     */
    public function setInscriptions($inscriptions)
    {
        $this->inscriptions = $inscriptions;
    }

    /**
     * @return mixed
     */
    public function getEditorid()
    {
        return $this->editorid;
    }

    /**
     * @param mixed $editorid
     */
    public function setEditorid($editorid)
    {
        $this->editorid = $editorid;
    }
    public function isInscribed()
    {
        if(is_array($this->inscriptions))
        {
            foreach ($this->inscriptions as $inscription) {
                if ($inscription->getStudentid() == StudentServiceImpl::getInstance()->getCurrentStudentId()) {
                    return true;
                }
            }
        }
        elseif (isset($this->inscriptions))
        {
            if ($this->inscriptions->getStudentid() == StudentServiceImpl::getInstance()->getCurrentStudentId()) {
                return true;
            }
        }
        return false;
    }
    public function countInscriptions()
    {
        return sizeof($this->inscriptions);
    }

}