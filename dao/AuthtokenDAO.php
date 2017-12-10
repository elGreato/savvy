<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:42
 */

namespace dao;
use domain\Authtoken;

class AuthtokenDAO extends BasicDAO
{
    public function create(Authtoken $authtoken)
    {
        $stmt=$this->pdoInstance->prepare('INSERT INTO authtoken 
          (studentid,selector,validator,expiration,type) VALUES 
          (:studentid,:selector,:validator,:expiration, :type);');
        $stmt->bindValue(':studentid',$authtoken->getStudentID());
        $stmt->bindValue(':selector',$authtoken->getSelector());
        $stmt->bindValue(':validator',$authtoken->getValidator());
        $stmt->bindValue(':expiration',$authtoken->getExpiration());
        $stmt->bindValue(':type',$authtoken->getType());
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
    public function  findBySelector($selector)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM authtoken WHERE selector= :selector;');
        $stmt->bindValue(':selector',$selector);
        $stmt->execute();
        $result =  $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Authtoken");
        $authtoken = null;
        if(!empty($result)){
            $authtoken = $result[0];
        }
        return $authtoken;
    }
    public function delete($authtokenID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM "authtoken" where id = :id');
        $stmt->bindValue(':id', $authtokenID);
    }
    public  function update($authtoken)
    {
        $stmt = $this->pdoInstance->prepare('UPDATE "authtoken" SET studentid = :id,selector = :selector, validator = :validator, expiration = :expiration type = :type WHERE id=:id');
        $stmt->bindValue(':id',$authtoken->getID());
        $stmt->bindValue(':studentid',$authtoken->getStudentID());
        $stmt->bindValue(':selector',$authtoken->getSelector());
        $stmt->bindValue(':validator',$authtoken->getValidator());
        $stmt->bindValue(':expiration',$authtoken->getExpiration());
        $stmt->bindValue(':type',$authtoken->getType());
        $stmt->execute();
    }
}