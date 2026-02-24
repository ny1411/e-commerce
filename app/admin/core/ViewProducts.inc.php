<?php

require_once __DIR__ . '/../controllers/ViewProducts.controller.inc.php';

// if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin' && ($_SERVER['REQUEST_METHOD'] === 'POST')) {

// $productId = $_SESSION['product_id'];

$viewProductsController = new ViewProductsController();
$allProducts = $viewProductsController->displayAllProducts();

$product = isset($_GET['id'])
    ? $viewProductsController->displayProductById($_GET['id'])
    : null;

$_SESSION['all_products'] = $allProducts;
$_SESSION['product'] = $product;

// } else {
//     header("Location: ../../../public");
//     exit();
// }