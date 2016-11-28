<?php
require_once("db.php");

class User
{
    private $id,$email,$firstname,$lastname,$admin,$password;

    public function __toString() {
        return $this->email;
    }

    public static function getUser($searchemail){
        $users = array(); 

        $db = DB::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('i', $searchemail);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) return null;

        while($product = $result->fetch_object(get_class())){
            $products[] = $product;
        }
        return $products[0];
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

    public static function createUser(){
        $db = DB::getInstance();
        $stmt = $db->getConnection()->prepare('INSERT INTO 
            users(email,firstname,lastname,admin,password) 
            VALUES ("blubb", "b", "b", 1, "s")');
        $stmt->execute();
    }
}

