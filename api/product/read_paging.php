<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/product.php';

// utilities
$utilities = new Utilities();

// initialize object
$product = new Product();

// query products
$stmt = $product->readPaging($from_record_num, $records_per_page);
// check if more than 0 record found
if(!empty($stmt)){

    // include paging
    $total_rows=$product->count();
    $page_url="{$home_url}product/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $products_arr["paging"]=$paging;

    echo json_encode($stmt);
} else {
    echo json_encode(
        array("message" => "No products found.")
    );
}