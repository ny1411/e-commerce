<?php

require_once __DIR__ . "/../../config/session.config.inc.php";
require_once __DIR__ . "/../controllers/Cart.controller.inc.php";

if (isset($_SESSION['user_id'])) {
    $cartController = new CartController();
    $cartProducts = $cartController->getCartProducts($_SESSION['user_id']);

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
        header("Location: ../../../public/products");
        exit();
    }
}