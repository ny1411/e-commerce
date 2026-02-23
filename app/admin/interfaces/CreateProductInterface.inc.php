<?php

interface CreateProductInterface
{
    public function createProduct(
        $productName,
        $productDescription,
        $productPrice,
        $productSpecialPrice,
        $productImage,
        $productCategory
    );
}