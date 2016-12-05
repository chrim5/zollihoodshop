<?php
class Cart 
{
    public function index()
    {
        require APP . 'models/cart.php';
        
        $Product = new CartModel();
        $cart = $Product->getCartProducts();

        require APP . 'views/_templates/header.php';
        require APP . 'views/cart/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function add($productId)
    {
        require APP . 'models/product.php';
        require APP . 'models/cart.php';
        
        $Product = new ProductModel();
        $p = $Product->getProductById($productId);

        $Cart = new CartModel();
        $Cart->addToCart($p);
    }

    public function clear()
    {
        require APP . 'models/cart.php';
        $Cart = new CartModel();
        $Cart->clearAll();
    }

    public function cartjson()
    {
        header('Content-Type: application/json');
        require APP . 'models/cart.php';
        
        $Product = new CartModel();

        $productsTotal = $Product->getCartItemsTotal();
        $priceTotal = $Product->getCartPriceTotal();
        
        $data = ["price" => $priceTotal, "products" => $productsTotal];

        echo json_encode($data);
    }
}
