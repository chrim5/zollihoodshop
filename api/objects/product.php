<?php
include_once("../config/database.php");
class Product{
    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;
 
    public function __toString() {
         return $this->name;
    }

    // read products
    public static function read(){
     
        // select all query
        $query = "SELECT
                    c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
                FROM
                    products p
                    LEFT JOIN
                        categories c
                            ON p.category_id = c.id
                ORDER BY
                    p.created DESC";
    
        $products = array();
 
        $db = Database::getInstance();
        $stmt = $db->getConnection()->query($query);
        if (!$stmt) return null;
 
        while($product = $stmt->fetch_object(get_class())){
         $products[] = $product;
        }

        return $products;

    }
}
