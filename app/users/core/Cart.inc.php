<?php

require_once __DIR__ . "/../controllers/Cart.controller.inc.php";

// if (isset($_SESSION['user_id'])) {
$cartController = new CartController();
// $cartProducts = $cartController->getCartProducts($_SESSION['user_id']);

// $_SESSION['cartProducts'] = $cartProducts;

// } else {
//     header("Location: ../public");
// }


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $userId = 3;            // replace with $_SESSION['user_id']
    $productId = $_POST['product_id'];
    $action = $_POST['action'];

    if ($action === "increment") {
        $cartController->addToCart($userId, $productId, 1);
    } elseif ($action === "decrement") {
        $cartProducts = $cartController->getCartProducts($userId);
        foreach ($cartProducts as $item) {
            if ($item['product_id'] == $productId) {
                if ($item['quantity'] > 1) {
                    $cartController->addToCart($userId, $productId, -1);
                } else {
                    $cartController->removeFromCart($userId, $productId);
                }
                break;
            }
        }
    }
}