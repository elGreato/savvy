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
          (:name,:description,:numcredits);');
        $stmt->bindValue(':name',$topic->getName());
        $stmt->bindValue(':description',$topic->getDescription());
        $stmt->bindValue(':numcredits',$topic->getNumcredits());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }
    public function read($topicID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM topic WHERE id = :id;');
        $stmt->bindValue(':id',$topicID);
        $topic = $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain/Topic");

    }
    public function readAll()
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM topic;');
        $stmt->execute();
        $topics = $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Topic");
        return $topics;

    }

    public function delete($topicID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM topic where id = :id');
        $stmt->bindValue(':id', $topicID);
    }
    public  function update($topic)
    {
        $stmt = $this->pdoInstance->prepare('UPDATE topic SET name = :name,description = :description, numcredits = :numcredits WHERE id=:id');
        $stmt->bindValue(':id',$topic->getID());
        $stmt->bindValue(':name',$topic->getName());
        $stmt->bindValue(':id',$topic->getDescription());
        $stmt->bindValue(':numcredits',$topic->getNumcredits());
    }
}