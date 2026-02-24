<?php

require_once __DIR__ . '/../controllers/DeleteProduct.controller.inc.php';

// if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin' && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
$productId = $_POST['id'];

$deleteProductController = new DeleteProductController($productId);
$deleteProductController->handleDeleteProduct();

header("Location: ../../../public/admin/products");
// exit();
// }