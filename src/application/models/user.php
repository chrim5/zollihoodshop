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

    public function createNew($user){
        $stmt = $this->db->prepare('INSERT INTO
            users(email,firstname,lastname,admin,password) 
            VALUES (?, ?, ?, 0, ?)');
        $stmt->bind_param('ssss', $user->email, $user->firstname, 
            $user->lastname, $user->getPassword() );
        $stmt->execute();
    }

    public function save($user){
        $stmt = $this->db->prepare('UPDATE users
            set email=? , firstname=? , lastname=? , admin=? , password=?
            WHERE id=?');
        //$stmt->execute();
        $stmt->bind_param('sssisi', $user->email, $user->firstname, 
            $user->lastname, $user->admin, $user->getPassword(), $user->id);
        $stmt->execute();
    }
}
