<?php
require_once APP . 'core/model.php';
require_once APP . 'models/product.class.php';
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

    public function getCartItemsTotal()
    {
        $cart = $this->getSessionCart();
        return count($cart);
    }

    public function getCartPriceTotal()
    {
        $cart = $this->getSessionCart();
        $price = 0;

        foreach ($cart as $i) {
            $price += $i->price;
        }

        return $price;
    }

    public function addToCart($obj)
    {
        $cart = $this->getSessionCart();
        array_push($cart, $obj);
        $this->setSessionCart($cart);
    }

    public function clearAll()
    {
        $cart = $this->getSessionCart();
        $cart = array();
        $this->setSessionCart($cart);
    }
}
