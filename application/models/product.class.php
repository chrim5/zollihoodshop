<?php
require_once("application/db/db.php");

class ProductObj
{
    public $id, $name, $details, $price, $reducedprice, $category;
    
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

}
