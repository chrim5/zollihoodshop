<?php
class Cart 
{
    public function index()
    {
        require APP . 'models/cart.php';
        
        $Product = new CartModel();
        $Product->addToCart("test");
        $cart = $Product->getCartProducts();

        require APP . 'views/_templates/header.php';
        require APP . 'views/cart/index.php';
        require APP . 'views/_templates/footer.php';
    }

    public function cartjson()
    {
        header('Content-Type: application/json');
        require APP . 'models/cart.php';
        
        $Product = new CartModel();

        $priceTotal = 111;
        $productsTotal = $Product->getCartItemsTotal();
        
        $data = ["price" => $priceTotal, "products" => $productsTotal];

        echo json_encode($data);
    }
}
