<?php

interface EditProductInterface
{
    public function editProduct(
        $productId,
        $productName,
        $productDescription,
        $productPrice,
        $productSpecialPrice,
        $productImage,
        $productCategory
    );
}