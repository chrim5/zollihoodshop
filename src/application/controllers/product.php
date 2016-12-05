<?php
class Product 
{
    public function index()
    {
        require APP . 'models/product.php';
        
        $Product = new ProductModel();
        $products = $Product->getProducts();




        require APP . 'views/_templates/header.php';
        require APP . 'views/product/index.php';
        require APP . 'views/_templates/footer.php';
    }
}
