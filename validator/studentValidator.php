<?php
/**
 * Created by PhpStorm.
 * User: Area-51
 * Date: 11/12/2017
 * Time: 3:48 PM
 */
namespace validator;
use domain\Student;
class StudentValidator
{
    private $valid = true;
    private $nameError = null;
    private $emailError = null;
    private $passwordError = null;
    public function __construct(Student $student = null)
    {
        if (!is_null($student)) {
            $this->validate($student);
        }
    }
    public function validate(Student $student)
    {
        echo strlen($student->getEmail());
        if (!is_null($student)) {
            if (empty($student->getUsername())) {
                $this->nameError = 'Oops! you didnt Enter a name';
                $this->valid = false;
            }
            else if (!ctype_alnum($student->getUsername()))
            {
                $this->nameError = 'Only numbers and letters are allowed in the username';
                $this->valid = false;
            }
            if (strlen($student->getUsername()) > 15)
            {
                $this->nameError = 'The username cannot have more than 15 characters';
                $this->valid = false;
            }

            if (empty($student->getEmail())) {
                $this->emailError = 'You have forgot to enter an email address';
                $this->valid = false;
            } else if (strlen($student->getEmail())>254||!filter_var($student->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Please enter a valid email address';
                $this->valid = false;
            }
            if (empty($student->getPassword())) {
                $this->passwordError = 'Please enter a password';
                $this->valid = false;
            }
            if (strlen($student->getPassword()) < 5 || strlen($student->getPassword()) > 255)
            {
                $this->passwordError = 'The password should have between 5 and 255 letters';
                $this->valid = false;
            }
        } else {
            $this->valid = false;
        }
        return $this->valid;
    }
    public function isValid()
    {
        return $this->valid;
    }
    public function isNameError()
    {
        return isset($this->nameError);
    }
    public function getNameError()
    {
        return $this->nameError;
    }
    public function isEmailError()
    {
        return isset($this->emailError);
    }
    public function getEmailError()
    {
        return $this->emailError;
    }
    public function setEmailError($emailError)
    {
        $this->emailError = $emailError;
        $this->valid = false;
    }
    public function isPasswordError()
    {
        return isset($this->passwordError);
    }
    public function getPasswordError()
    {
        return $this->passwordError;
    }
}
