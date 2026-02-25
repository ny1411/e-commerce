<?php

require_once __DIR__ . "/../controllers/ViewProducts.controller.inc.php";

$productsController = new ViewProductsController();

$product = $productsController->fetchProduct($productId);
$product = $product[0];
