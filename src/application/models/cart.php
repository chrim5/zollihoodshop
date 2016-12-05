<?php
require APP . 'core/model.php';
require APP . 'models/product.class.php';
class CartModel extends Model 
{

    private function getSessionCart()
    {
        session_start();
        if (!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"] = array();
        }
        return $_SESSION["cart"];
    }

    private function setSessionCart($cart)
    {
        session_start();
       $_SESSION["cart"] = $cart; 
    }

    public function getCartProducts(){
        $cart = $this->getSessionCart();
        return $cart;
    }

    public function getCartPriceTotal()
    {
        return 0;
    }

    public function addToCart($obj)
    {
        $cart = $this->getSessionCart();
        array_push($cart, $obj);
        $this->setSessionCart($cart);
    }
}
