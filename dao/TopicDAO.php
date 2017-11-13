<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:45
 */

namespace dao;
use domain\Topic;

class TopicDAO extends \BasicDAO
{
    public function create(Topic $topic)
    {

        $stmt=$this->pdoInstance->prepare('INSERT INTO topic 
          (name,description,numcredits) VALUES 
          (:name,:description,:numcredits)');
        $stmt->bindValue(':name',$topic->getName());
        $stmt->bindValue(':description',$topic->getDescription());
        $stmt->bindValue(':numcredits',$topic->getNumcredits());
        $stmt->execute();
        return 0; //$this->read($this->pdoInstance->lastInsertId());
    }
}