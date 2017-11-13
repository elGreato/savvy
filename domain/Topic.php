<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:50
 */

namespace domain;


class Topic
{
    private $id;
    private $name;
    private $description;
    private $numcredits;

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
     * Topic constructor.
     * @param $name
     * @param $description
     * @param $numcredits
     */
    public function __construct($name, $description, $numcredits)
    {
        $this->name = $name;
        $this->description = $description;
        $this->numcredits = $numcredits;
    }

}