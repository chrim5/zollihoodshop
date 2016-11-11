<?php
require_once("db.php");

class Product
{
    private $id, $name, $details, $price, $reducedprice, $category;
    
    public function __toString() {
        return $this->name;
    }

    public static function getProducts(){
        $products = array();

        $db = DB::getInstance();
        $res = $db->getConnection()->query("SELECT * FROM products");
        if (!$res) return null;

        while($product = $res->fetch_object(get_class())){
            $products[] = $product;
        }
        return $products;
    }

    public static function getProductsByCategory($category_id){
        $products = array(); 

        $db = DB::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT * FROM products WHERE category = ?");
        $stmt->bind_param('i', $category_id);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) return null;

        while($product = $result->fetch_object(get_class())){
            $products[] = $product;
        }
        return $products;

    }
}
?>
