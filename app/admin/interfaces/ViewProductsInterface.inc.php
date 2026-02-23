<?php

interface ViewProductsInterface
{
    public function getAllProducts();
    public function getProductById($productId);
}