<?php

interface CartInterface
{
    public function getAllProductsInCart($userId);
    public function addProductToCart($userId, $productId, $quantity);
    public function removeProductFromCart($userId, $productId);
}