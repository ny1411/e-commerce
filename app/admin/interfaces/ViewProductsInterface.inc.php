<?php

interface ViewProductsAdminInterface
{
    public function getAllProducts();
    public function getProductById($productId);
}