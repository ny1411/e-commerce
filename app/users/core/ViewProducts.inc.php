<?php

require_once __DIR__ . "/../controllers/ViewProducts.controller.inc.php";

$productsController = new ViewProductsController();

if (isset($_SESSION['user_id'])) {
    $products = $productsController->fetchAllProducts();
} else {
    header("Location: ../../public");
    exit();
}