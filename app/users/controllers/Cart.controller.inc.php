<?php

require_once __DIR__ . "/../models/Cart.model.inc.php";

class CartController extends Cart
{
    public function getCartProducts($userId)
    {
        return $this->getAllProductsInCart($userId);
    }
    public function addToCart($userId, $productId, $quantity)
    {
        $this->addProductToCart($userId, $productId, $quantity);
    }
    public function removeFromCart($userId, $productId)
    {
        $this->removeProductFromCart($userId, $productId);
    }
}