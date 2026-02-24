<?php

require_once __DIR__ . '/../models/DeleteProduct.model.inc.php';

class DeleteProductController extends DeleteProduct
{
    private $errors = [];
    private $productId;
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function handleDeleteProduct()
    {
        $productId = $this->productId;
        if (empty($productId) || !is_numeric($productId)) {
            $this->errors['empty_inputs'] = "Fill in all the inputs.";
            $_SESSION['errors_delete_product'] = $this->errors;
            throw new Exception("All fields are required.");
        }

        $this->deleteProduct($productId);
    }
}