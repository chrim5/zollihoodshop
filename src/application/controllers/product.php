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

    public function search()
    {
        require APP . 'models/product.php';
        
        $product = new productmodel();
        $searchterm = $_POST["term"];
        $products = $product->getProductsBySearch($searchterm);

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

    public function addimage($productid)
    {
        require APP . 'views/_templates/header.php';
        require APP . 'views/product/addimage.php';
        require APP . 'views/_templates/footer.php';
    }

    public function image($productid)
    {
        require APP . 'models/product.php';

        $Product = new ProductModel();
        $image = $Product->getBinary($productid);
        header("Content-Type: image/png");
        echo $image;     
    }

    public function upload($productid)
    {
        require APP . 'models/product.php';

        $Product = new ProductModel();

        //var_dump($_FILES);
        $binary = file_get_contents($_FILES['fileToUpload']['tmp_name']);

        $Product->uploadBinary($productid, $binary);
        header('Location: /product' );
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
        header('Location: /product' );
    }
}
