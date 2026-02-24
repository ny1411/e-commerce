<?php

require_once __DIR__ . '/../controllers/EditProduct.controller.inc.php';

// if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin' && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
$productId = $_POST['id'];
$productName = $_POST['name'];
$productDescription = $_POST['description'];
$productCategory = $_POST['category'];
$productPrice = $_POST['price'];
$productSpecialPrice = $_POST['special_price'];
$productImage = $_FILES['image'];

$editProductController = new EditProductController(
    $productId,
    $productName,
    $productCategory,
    $productDescription,
    $productPrice,
    $productSpecialPrice,
    $productImage
);

$editProductController->handleEditProduct();

header("Location: ../../../public/admin/products");
exit();
// } else {
//     header("Location: ../../../public");
//     exit();
// }