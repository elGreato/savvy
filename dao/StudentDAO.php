<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 13.11.2017
 * Time: 12:44
 */

namespace dao;
use domain\Student;

class StudentDAO extends BasicDAO
{
    public function create(Student $student)
    {
        $stmt=$this->pdoInstance->prepare('INSERT INTO student 
          (username,password,email) VALUES 
          (:username,:password,:email);');
        $stmt->bindValue(':username',$student->getUsername());
        $stmt->bindValue(':password',$student->getPassword());
        $stmt->bindValue(':email',$student->getEmail());
        $stmt->execute();

        return $this->read($this->pdoInstance->lastInsertId());
    }
    public function read($studentID)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM student WHERE id = :id;');
        $stmt->bindValue(':id',$studentID);
        $stmt->execute();
        $result =$stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Student");
        $student = null;
        if(!empty($result)){
            $student = $result[0];
        }
        return $student;

    }
    public function findByUsername($username)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM student WHERE username = :username;');
        $stmt->bindValue(':username',$username);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Student");
        $student = null;
        if(!empty($result)){
            $student = $result[0];
        }
        return $student;
    }
    public function findByEmail($email)
    {
        $stmt=$this->pdoInstance->prepare('SELECT * FROM student WHERE email = :email;');
        $stmt->bindValue(':email',$email);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS,"domain\\Student");
        $student = null;
        if(!empty($result)){
            $student = $result[0];
        }
        return $student;
    }
    public function delete($studentID)
    {
        $stmt=$this->pdoInstance->prepare('DELETE FROM "student" where id = :id');
        $stmt->bindValue(':id', $studentID);
    }
    public  function update(Student $student)
    {
        $stmt = $this->pdoInstance->prepare('UPDATE "student" SET username = :username, password = :password, email = :email WHERE id=:id');
        $stmt->bindValue(':id',$student->getId());
        $stmt->bindValue(':username',$student->getUsername());
        $stmt->bindValue(':password',$student->getPassword());
        $stmt->bindValue(':email',$student->getEmail());
        $stmt->execute();
    }
}