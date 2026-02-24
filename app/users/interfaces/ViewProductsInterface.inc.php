<?php

interface ViewProductsInterface
{
    public function getAllProducts();
    public function getProductById($productId);
    public function getProductsByCategory($productCategory);
    public function getProductsByPriceRange($minPrice, $maxPrice);
    public function getProductsByRating($minRating);
    public function searchProducts($searchTerm);
}