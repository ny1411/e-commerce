<?php

require_once __DIR__ . "/../controllers/ViewProducts.controller.inc.php";

// if (isset($_SESSION['user_id'])) {
$productsController = new ViewProductsController();
$products = $productsController->fetchAllProducts();
// } else {
//     header("Location: ../../public");
//     exit();
// }