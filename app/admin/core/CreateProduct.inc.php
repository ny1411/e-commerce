<?php

require_once __DIR__ . '/../controllers/CreateProduct.controller.inc.php';

// if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin' && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
$productName = $_POST['product_name'];
$productDescription = $_POST['product_description'];
$productCategory = $_POST['product_category'];
$productPrice = $_POST['product_price'];
$productSpecialPrice = $_POST['product_special_price'];
$productImage = $_FILES['image_file']['tmp_name'];

$productImageBlob = file_get_contents($productImage);

$createProductController = new CreateProductController(
    $productName,
    $productCategory,
    $productDescription,
    $productPrice,
    $productSpecialPrice,
    $productImageBlob
);

$createProductController->handleCreateProduct();

header("Location: ../../../public/admin/products");
exit();
// } else {
//     header("Location: ../../../public");
//     exit();
// }