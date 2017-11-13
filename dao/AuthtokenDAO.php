<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:42
 */

namespace dao;
use domain\Authtoken;

class AuthtokenDAO extends \BasicDAO
{
    public function create(Authtoken $authtoken)
    {
        $stmt=$this->pdoInstance->prepare('INSERT INTO authtoken 
          (studentid,selector,validator,expiration) VALUES 
          (:studentid,:selector,:validator,:expiration);');
        $stmt->bindValue(':studentid',$authtoken->getStudentID());
        $stmt->bindValue(':selector',$authtoken->getSelector());
        $stmt->bindValue(':validator',$authtoken->getValidator());
        $stmt->bindValue(':expiration',$authtoken->getExpiration());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }
    public function read($authtokenID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM authtoken WHERE id = :id;');
        $stmt->bindValue(':id',$authtokenID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Authtoken");

    }

    public function delete($authtokenID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM "authtoken" where id = :id');
        $stmt->bindValue(':id', $authtokenID);
    }
    public  function update($authtoken)
    {
        $stmt = $this->pdoInstance->prepare('UPDATE "authtoken" SET studentid = :id,selector = :selector, validator = :validator, expiration = :expiration WHERE id=:id');
        $stmt->bindValue(':id',$authtoken->getID());
        $stmt->bindValue(':studentid',$authtoken->getStudentID());
        $stmt->bindValue(':selector',$authtoken->getSelector());
        $stmt->bindValue(':validator',$authtoken->getValidator());
        $stmt->bindValue(':expiration',$authtoken->getExpiration());
        $stmt->execute();
    }
}