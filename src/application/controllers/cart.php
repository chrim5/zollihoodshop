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
}
