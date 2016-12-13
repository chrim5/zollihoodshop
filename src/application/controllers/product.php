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

    public function category($categoryid)
    {
        require APP . 'models/product.php';
        
        $product = new productmodel();
        $products = $product->getproductsbycategory($categoryid);

        require APP . 'views/_templates/header.php';
        require APP . 'views/product/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function additem()
    {
        require APP . 'models/product.php';
        $Product = new ProductModel();
        $categories = $Product->getCategories();
        require APP . 'views/_templates/header.php';
        require APP . 'views/product/new.php';
        require APP . 'views/_templates/footer.php';
    }

    public function create()
    {
        require APP . 'models/product.php';
        require_once APP . 'models/product.class.php';
        
        $u = new ProductObj();
        $u->name = $_POST["name"];
        $u->details = $_POST["details"];
        $u->price = $_POST["price"];
        $u->reducedprice = ($_POST["reducedprice"]);
        $u->category = ($_POST["category"]);
    
        $Product = new ProductModel();
        $Product->createNew($u);
        header('Location: /' );
    }
}
