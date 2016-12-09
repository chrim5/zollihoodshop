<?php
require_once("application/db/db.php");

class UserObj
{
    private $id,$email,$firstname,$lastname,$admin,$password;

    public function __toString() {
        return $this->email;
    }


    public function getPassword(){
        return $this->password;
    }

    public function savePassword($stringPassword){
        $this->password = password_hash($stringPassword, PASSWORD_DEFAULT);
        $this->saveUser();
    }

    public function saveUser(){
        $db = DB::getInstance();
        $stmt = $db->getConnection()->prepare('UPDATE users
            set email=? , firstname=? , lastname=? , admin=? , password=?
            WHERE id=?');
        $stmt->execute();
        $stmt->bind_param('sssisi', $this->email, $this->firstname, 
            $this->lastname, $this->admin, $this->password, $this->id);
        $stmt->execute();
    }
}

