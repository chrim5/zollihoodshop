<?php
require APP . 'core/model.php';
require APP . 'models/product.class.php';
class ProductModel extends Model 
{
    public function getProducts(){
        $products = array();
        $res = $this->db->query("SELECT * FROM products");
        if (!$res) return null;

        while($product = $res->fetch_object("ProductObj")){
            $products[] = $product;
        }
        return $products;
    }

    public function getCategories(){
        $products = array();
        $res = $this->db->query("SELECT * FROM categories");
        if (!$res) return null;

        while($cat = $res->fetch_object()){
            $categories[] = $cat;
        }
        return $categories;
    }

    public function getProductsByCategory($category_id){
        $products = array(); 

        $stmt = $this->db->prepare("SELECT * FROM products WHERE category = ?");
        $stmt->bind_param('i', $category_id);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) return null;

        while($product = $result->fetch_object("ProductObj")){
            $products[] = $product;
        }
        return $products;
    }

    public function getProductById($product_id)
    {
        $products = array(); 

        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param('i', $product_id);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) return null;

        while($product = $result->fetch_object("ProductObj")){
            $products[] = $product;
        }
        return $products[0];
    }

    public function createNew($product){
        $stmt = $this->db->prepare('INSERT INTO
            products(name,details,price,reducedprice,category) 
            VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('ssiii', $product->name, $product->details, $product->price, 
            $product->reducedprice, $product->category);
        $stmt->execute();
    }
}
