<?php

require_once __DIR__ . "/../../config/session.config.inc.php";
require_once __DIR__ . "/../controllers/Cart.controller.inc.php";

if (isset($_SESSION['user_id'])) {
    $cartController = new CartController();
    $cartProductsById = $cartController->getCartProducts($_SESSION['user_id']);

    $productIds = array_column($cartProductsById, 'product_id');
    $cartProducts = $cartController->getAllProducts($productIds);

    $_SESSION['cartProductsById'] = $cartProductsById ?? [];
    $_SESSION['cartProducts'] = $cartProducts ?? [];
} else {
    header("Location: ../../../public");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_SESSION['user_id'];
    $productId = $_POST['product_id'];
    $action = $_POST['action'];

    if ($action === "increment") {
        $cartController->addToCart($userId, $productId, 1);

        header("Location: ../../../public/cart");
        exit();
    }
    if ($action === "decrement") {
        $cartController->removeFromCart($userId, $productId);
        header("Location: ../../../public/cart");
        exit();
    }
}