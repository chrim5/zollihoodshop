<?php
require_once("application/db/db.php");

class Category
{
    private $id, $name;
    
    public function __toString() {
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }

    public static function getCategories(){
        $categories = array();

        $db = DB::getInstance();
        $res = $db->getConnection()->query("SELECT * FROM categories");
        if (!$res) return null;

        while($category = $res->fetch_object(get_class())){
            $categories[] = $category;
        }
        return $categories;

    }
}
?>
