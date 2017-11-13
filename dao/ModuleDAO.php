<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:45
 */

namespace dao;
use domain\Module;

class ModuleDAO extends \BasicDAO
{
    public function create(Module $module)
    {
        $stmt=$this->pdoInstance->prepare('INSERT INTO "module" 
          (name,description,numcredits) VALUES 
          (:name,:description,:numcredits);');
        $stmt->bindValue(':name',$module->getName());
        $stmt->bindValue(':description',$module->getDescription());
        $stmt->bindValue(':numcredits',$module->getNumcredits());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
    }
    public function read($moduleID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM "module" WHERE id = :id;');
        $stmt->bindValue(':id',$moduleID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Module");

    }
    public function readAll()
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM "module";');
        $stmt->execute();
        $modules = $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Module");
        return $modules;

    }

    public function delete($moduleID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM "module" where id = :id');
        $stmt->bindValue(':id', $moduleID);
    }
    public  function update($module)
    {
        $stmt = $this->pdoInstance->prepare('UPDATE "module" SET name = :name,description = :description, numcredits = :numcredits WHERE id=:id');
        $stmt->bindValue(':id',$module->getID());
        $stmt->bindValue(':name',$module->getName());
        $stmt->bindValue(':id',$module->getDescription());
        $stmt->bindValue(':numcredits',$module->getNumcredits());
        $stmt->execute();
    }
}