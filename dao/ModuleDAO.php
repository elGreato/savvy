<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:45
 */

namespace dao;
use domain\Module;

class ModuleDAO extends BasicDAO
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
        $stmt=$this->pdoInstance->prepare('SELECT module.*, COUNT(inscription.studentid) as inscriptions FROM module left outer join inscription on inscription.moduleid = module.id WHERE module.id = :id GROUP BY module.id ORDER BY module.id;');
        $stmt->bindValue(':id',$moduleID);
        $stmt->execute();
        $modules= $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Module");
        return $modules[0];
    }
    public function readAll()
    {
        $stmt=$this->pdoInstance->prepare('SELECT module.*, COUNT(inscription.studentid) as inscriptions FROM module left outer join inscription on inscription.moduleid = module.id GROUP BY module.id ORDER BY module.id');
        $stmt->execute();
        $modules = $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Module");
        return $modules;

    }
    public function readInscribedModules($studentid)
    {
        $stmt=$this->pdoInstance->prepare('SELECT module.* FROM inscription JOIN module on inscription.moduleid = module.id WHERE studentid = :studentid;');
        $stmt->bindValue(':student',$studentid);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Inscription");
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