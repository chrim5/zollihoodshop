<?php

class ProductObj
{
    public $id, $name, $details, $price, $reducedprice, $category;
    
    public function __toString() {
        return $this->name;
    }

}
