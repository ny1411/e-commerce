<?php

require_once __DIR__ . "/../core/Cart.inc.php";

$cartProductsById = $_SESSION['cartProductsById'];
$cartProducts = $_SESSION['cartProducts'];

$productsIndexed = [];

foreach ($cartProducts as $product) {
    $productsIndexed[$product['id']] = $product;
}

foreach ($cartProductsById as $cartItem) {
    $productId = $cartItem['product_id'];

    if (isset($productsIndexed[$productId])) {
        $productsIndexed[$productId]['quantity'] = $cartItem['quantity'];
    }
}

$totalQuantity = 0;
$totalPrice = 0;

foreach ($productsIndexed as $product) {
    $totalQuantity += $product['quantity'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo "Cart: " . $totalQuantity . " products"; ?>
    </title>
</head>

<body>
    <main class="cart-container">
        <h1>Your Cart</h1>

        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cartProducts as $cartItem):

                    $productId = $cartItem['id'];
                    $product = $productsIndexed[$productId];

                    ?>
                    <tr>
                        <td>
                            <?= htmlspecialchars($product['name']) ?>
                        </td>
                        <td>
                            <?= number_format($product['price'], 2) ?>
                        </td>
                        <td>
                            <form action="../app/users/core/Cart.inc.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="action" value="decrement">
                                <button class="remove-btn" data-product-id="<?= $product['id'] ?>">-</button>
                            </form>
                            <?= $product['quantity'] ?>
                            <form action="../app/users/core/Cart.inc.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="action" value="increment">
                                <button class="add-btn" data-product-id="<?= $product['id'] ?>">+</button>
                            </form>
                        </td>
                        <td>

                            <?php
                            $total = number_format($product['price'] * $product['quantity'], 2);
                            if ($total > 2000) {
                                $total = $total * 0.90;
                            }
                            $total += $total * 0.18;
                            $totalPrice += $total;
                            ?>
                            <?= $total ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <p>
                Total Price:
                <?= $totalPrice ?>
            </p>
            <button>Proceed to Buy</button>
        </div>
    </main>
</body>

</html>