<?php
require_once("application/db/db.php");

class UserObj
{
    public $id,$email,$username,$firstname,$lastname,$admin;
    private $password;

    public function __toString()
    {
        return $this->email;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function isAdmin()
    {
        return $this->admin;
    }

    public function savePassword($stringPassword){
        $this->password = password_hash($stringPassword, PASSWORD_DEFAULT);
    }

}

