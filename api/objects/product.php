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

    // used when filling up the update product form
    function readOne(){

        // query to read single record
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                products p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";

        // prepare query statement
        $db = Database::getInstance();
        $stmt = $db->getConnection()->prepare($query);

        // bind id of product to be updated
        $stmt->bind_param('i', $this->id);

        // execute query
        $stmt->execute();

        // store
        //$stmt->store_result();

        if (!$stmt ) return false;

        $result = $stmt->get_result();
        //$data->fetch_assoc();

        $row = $result->fetch_array();
        /*
        while ($col = $result->fetch_array()) {
            $row[] = $col;
            error_log(implode($col));
        }
        */
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];

    }

    // create product
    function create(){
     
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->created=htmlspecialchars(strip_tags($this->created));

        $db = Database::getInstance();
        $stmt = $db->getConnection()->prepare('INSERT INTO
            products(name,description,price,category_id,created) 
            VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('siiis', $this->name, $this->price, $this->description,
            $this->category_id, $this->created);

        $stmt->execute();
        if (!$stmt) return false;
        return true;
         
    }
}
