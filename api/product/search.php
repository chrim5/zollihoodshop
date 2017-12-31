<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';

// initialize object
$product = new Product();

// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";

// query products
$products = $product->search($keywords);
// check if more than 0 record found
if(!empty($products)){
    echo json_encode($products);
} else {
    echo json_encode(
        array("message" => "No products found.")
    );
}