<?php

require_once __DIR__ . '/../models/CreateProduct.model.inc.php';

class CreateProductController extends CreateProduct
{
    private $errors = [];

    private $productName;
    private $productCategory;
    private $productDescription;
    private $productPrice;
    private $productSpecialPrice;
    private $productImage;

    public function __construct(
        $productName,
        $productCategory,
        $productDescription,
        $productPrice,
        $productSpecialPrice,
        $productImage
    ) {
        $this->productName = $productName;
        $this->productCategory = $productCategory;
        $this->productDescription = $productDescription;
        $this->productPrice = $productPrice;
        $this->productSpecialPrice = $productSpecialPrice;
        $this->productImage = $productImage;
    }

    public function handleCreateProduct(

    ) {

        $productName = $this->productName;
        $productCategory = $this->productCategory;
        $productDescription = $this->productDescription;
        $productPrice = $this->productPrice;
        $productSpecialPrice = $this->productSpecialPrice;
        $productImage = $this->productImage;

        if (
            empty($productName) ||
            empty($productDescription) ||
            empty($productPrice) ||
            empty($productCategory) ||
            empty($productSpecialPrice) ||
            empty($productImage)
        ) {
            $this->errors['empty_inputs'] = "Fill in all the inputs.";
            $_SESSION['errors_create_product'] = $this->errors;
            throw new Exception("All fields are required.");
        }

        if (!is_numeric($productPrice) || $productPrice <= 0) {
            $this->errors['invalid_price'] = "Price must be a positive number.";
            $_SESSION['errors_create_product'] = $this->errors;
            throw new Exception("Price must be a positive number.");
        }

        if (
            !empty($productSpecialPrice) &&
            (!is_numeric($productSpecialPrice) || $productSpecialPrice <= 0) &&
            ($productSpecialPrice <= $productPrice)
        ) {
            $this->errors['invalid_special_price'] = "Special price must be a positive number and less than the regular price.";
            $_SESSION['errors_create_product'] = $this->errors;
            throw new Exception("Special price must be a positive number and less than the regular price.");
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($_FILES['image_file']['type'], $allowedTypes)) {
            $this->errors['invalid_image_type'] = "Invalid image type.";
            $_SESSION['errors_create_product'] = $this->errors;
            throw new Exception("Invalid image type.");
        }

        $this->createProduct(
            $productName,
            $productCategory,
            $productDescription,
            $productPrice,
            $productSpecialPrice,
            $productImage
        );
    }
}