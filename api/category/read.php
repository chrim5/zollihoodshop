<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/category.php';
 
// initialize object
$category = new Category();
 
// query categorys
$categories = $category->read();

// check if more than 0 record found
if(!empty($categories)){
    echo json_encode($categories);
} else {
    echo json_encode(
        array("message" => "No categories found.")
    );
}

