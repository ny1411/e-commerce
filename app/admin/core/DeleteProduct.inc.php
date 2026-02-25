<?php

require_once __DIR__ . '/../controllers/DeleteProduct.controller.inc.php';
require_once __DIR__ . "../../../config/session.config.inc.php";

if (isset($_SESSION['user_id']) && $_SESSION['is_admin'] && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $productId = $_POST['id'];

    $deleteProductController = new DeleteProductController($productId);
    $deleteProductController->handleDeleteProduct();

    header("Location: ../../../public/admin/products");
    exit();
}