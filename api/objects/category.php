<?php
include_once("../config/database.php");
class Category{
    // object properties
    public $id;
    public $name;
    public $description;
    public $created;
 
    public function __toString() {
         return $this->name;
    }

    // read categories
    public static function readAll(){
     
        //select all data
        $query = "SELECT
                    id, name, description, created
                FROM
                    categories
                ORDER BY
                    name";
    
        $categories = array();
 
        $db = Database::getInstance();
        $stmt = $db->getConnection()->query($query);
        if (!$stmt) return null;
 
        while($category = $stmt->fetch_object(get_class())){
         $categories[] = $category;
        }

        return $categories;

    }

    // used by select drop-down list
    public function read(){
     
        //select all data
        $query = "SELECT
                    id, name, description, created
                FROM
                    categories
                ORDER BY
                    name";
     
        $categories = array();
 
        $db = Database::getInstance();
        $stmt = $db->getConnection()->query($query);
        if (!$stmt) return null;
 
        while($category = $stmt->fetch_object(get_class())){
         $categories[] = $category;
        }

        return $categories;
    }

    // create category
    function create(){
     
        // query to insert record
        $query = "INSERT INTO
                    categories
                SET
                    name=:name, description=:description, created=:created";

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->created=htmlspecialchars(strip_tags($this->created));
     
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":created", $this->created);
     
        $db = Database::getInstance();
        $stmt = $db->getConnection()->query($query);
        if (!$stmt) return false;
        return true;
     
         
    }
}
