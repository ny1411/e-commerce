<?php

require_once __DIR__ . '/../models/EditProduct.model.inc.php';

class EditProductController extends EditProduct
{
    private $errors = [];
    private $productId;
    private $productCategory;
    private $productName;
    private $productDescription;
    private $productPrice;
    private $productSpecialPrice;
    private $productImage;
    public function __construct($productId, $productName, $productCategory, $productDescription, $productPrice, $productSpecialPrice, $productImage)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productCategory = $productCategory;
        $this->productDescription = $productDescription;
        $this->productPrice = $productPrice;
        $this->productSpecialPrice = $productSpecialPrice;
        $this->productImage = $productImage;
    }
    public function handleEditProduct(

    ) {
        $productId = $this->productId;
        $productName = $this->productName;
        $productCategory = $this->productCategory;
        $productDescription = $this->productDescription;
        $productPrice = $this->productPrice;
        $productSpecialPrice = $this->productSpecialPrice;
        $productImage = $this->productImage;

        if (
            empty($productId) ||
            empty($productName) ||
            empty($productDescription) ||
            empty($productPrice) ||
            empty($productSpecialPrice) ||
            empty($productImage) ||
            empty($productCategory)
        ) {
            $this->errors['empty_inputs'] = "All fields are required.";
            $_SESSION['errors_edit_product'] = $this->errors;
            throw new Exception("All fields are required.");
        }

        $this->editProduct(
            $productId,
            $productName,
            $productDescription,
            $productPrice,
            $productSpecialPrice,
            $productImage,
            $productCategory
        );
    }
}