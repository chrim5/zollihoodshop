<?php
require APP . 'core/model.php';
require APP . 'models/user.class.php';
class UserModel extends Model 
{
    public function getUsers(){
        $users = array();
        $res = $this->db->query("SELECT * FROM users");
        if (!$res) return null;

        while($user = $res->fetch_object("UserObj")){
            $users[] = $user;
        }
        return $users;
    }
    
    public function getUser($searchemail){
        $users = array(); 

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $searchemail);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) return null;

        while($user = $result->fetch_object("UserObj")){
            $users[] = $user;
        }
        return $users[0];
    }

    public function createNew(){
        $db = DB::getInstance();
        $stmt = $db->getConnection()->prepare('INSERT INTO 
            users(email,firstname,lastname,admin,password) 
            VALUES ("blubb", "b", "b", 1, "s")');
        $stmt->execute();
    }
}
