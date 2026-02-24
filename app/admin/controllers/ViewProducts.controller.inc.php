<?php

require_once __DIR__ . "/../models/ViewProducts.model.inc.php";

class ViewProductsController extends ViewProduct
{
    public function displayAllProducts()
    {
        $products = $this->getAllProducts();
        return $products;
    }
    public function displayProductById($productId)
    {
        $product = $this->getProductById($productId);
        return $product;
    }
}