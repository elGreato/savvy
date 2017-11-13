<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:45
 */

namespace dao;
use domain\Inscription;
class InscriptionDAO extends \BasicDAO
{
    public function create(Inscription $inscription)
    {
        $stmt=$this->pdoInstance->prepare('INSERT INTO inscription 
          (studentid,moduleid) VALUES 
          (:studentid,:moduleid);');
        $stmt->bindValue(':studentid',$inscription->getStudentID());
        $stmt->bindValue(':moduleid',$inscription->getSelector());
        $stmt->execute();
    }
    public function readInscriptions($studentid)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM inscription WHERE studentid = :studentid;');
        $stmt->bindValue(':student',$studentid);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Inscription");

    }

    public function delete($moduleid,$studentID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM "inscription" where moduleid = :moduleid AND $studentID = :$studentID');
        $stmt->bindValue(':moduleid', $moduleid);
        $stmt->bindValue(':studentid', $studentID);
        $stmt->execute();
    }
}