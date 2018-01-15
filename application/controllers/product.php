<?php
class Product {
    public function index() {
        require APP . 'models/product.php';
        
        $Product = new ProductModel();
        $products = $Product->getProducts();

        require APP . 'views/_templates/header.php';
        require APP . 'views/product/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function category($categoryid) {
        require APP . 'models/product.php';
        
        $product = new productmodel();
        $products = $product->getproductsbycategory($categoryid);

        require APP . 'views/_templates/header.php';
        require APP . 'views/product/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function search() {
        require APP . 'models/product.php';
        
        $product = new productmodel();
        $searchterm = $_POST["term"];
        $products = $product->getProductsBySearch($searchterm);

        require APP . 'views/_templates/header.php';
        require APP . 'views/product/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function additem() {
        Application::needsAdmin();
        require APP . 'models/product.php';
        $Product = new ProductModel();
        $categories = $Product->getCategories();
        require APP . 'views/_templates/header.php';
        require APP . 'views/product/new.php';
        require APP . 'views/_templates/footer.php';
    }

    public function addimage($productid) {
        Application::needsAdmin();
        require APP . 'views/_templates/header.php';
        require APP . 'views/product/addimage.php';
        require APP . 'views/_templates/footer.php';
    }

    public function image($productid) {
        require APP . 'models/product.php';

        $Product = new ProductModel();
        $image = $Product->getBinary($productid);
        header("Content-Type: image/png");
        echo $image;     
    }

    public function upload($productid) {
        Application::needsAdmin();
        require APP . 'models/product.php';

        $Product = new ProductModel();

        //var_dump($_FILES);
        $binary = file_get_contents($_FILES['fileToUpload']['tmp_name']);

        $Product->uploadBinary($productid, $binary);
        header('Location: /product' );
    }

    public function create() {
        Application::needsAdmin();
        require APP . 'utilities/sanitize.php';
        require APP . 'models/product.php';
        require_once APP . 'models/product.class.php';
        
        $u = new ProductObj();
        $u->name = sanitize_html_string($_POST["name"]);
        $u->details = sanitize_html_string($_POST["details"]);
        $u->price = sanitize_int($_POST["price"]);
        $u->reducedprice = sanitize_int($_POST["reducedprice"]);
        $u->category = sanitize_int($_POST["category"]);
    
        $Product = new ProductModel();
        $Product->createNew($u);
        header('Location: /product' );
    }

    public function update($productid) {
        Application::needsAdmin();
        require APP . 'models/product.php';
        $Product = new ProductModel();
        $item = $Product->getProductById($productid);
        $categories = $Product->getCategories();
        require_once APP . 'models/product.class.php';
        require APP . 'views/_templates/header.php';
        require APP . 'views/product/update.php';
        require APP . 'views/_templates/footer.php';
    }

    public function updateItem() {
        Application::needsAdmin();
        require APP . 'utilities/sanitize.php';
        require APP . 'models/product.php';
        require_once APP . 'models/product.class.php';

        $u = new ProductObj();
        $u->id = $_POST["id"];
        $u->name = sanitize_html_string($_POST["name"]);
        $u->details = sanitize_html_string($_POST["details"]);
        $u->price = sanitize_int($_POST["price"]);
        $u->reducedprice = sanitize_int($_POST["reducedprice"]);
        $u->category = sanitize_int($_POST["category"]);

        $Product = new ProductModel();
        $Product->updateProduct($u);
        header('Location: /product' );
    }
}
