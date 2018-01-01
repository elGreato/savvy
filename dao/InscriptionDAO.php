<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:45
 */

namespace dao;
use domain\Inscription;
class InscriptionDAO extends BasicDAO
{
    public function create(Inscription $inscription)
    {
        $stmt=$this->pdoInstance->prepare('INSERT INTO inscription 
          (studentid,moduleid) VALUES 
          (:studentid,:moduleid);');
        $stmt->bindValue(':studentid',$inscription->getStudentID());
        $stmt->bindValue(':moduleid',$inscription->getModuleid());
        $stmt->execute();
    }
    public function readInscriptionsOfStudent($studentID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM inscription WHERE studentid = :studentid;');
        $stmt->bindValue(':student',$studentID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Inscription");

    }
    public function readInscriptionsByModule($moduleID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM inscription WHERE moduleid = :moduleid;');
        $stmt->bindValue(':moduleid',$moduleID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Inscription");

    }
    public function delete($moduleID, $studentID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM "inscription" where moduleid = :moduleid AND studentid = :$studentID');
        $stmt->bindValue(':moduleid', $moduleID);
        $stmt->bindValue(':studentid', $studentID);
        $stmt->execute();
    }
}