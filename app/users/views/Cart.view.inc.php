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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .cart-table thead {
            background-color: #f8f9fa;
        }

        .cart-row {
            transition: background-color 0.2s ease;
        }

        .cart-row:hover {
            background-color: #fcfcfc;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .btn-qty {
            width: 32px;
            height: 32px;
            padding: 0;
            line-height: 1;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .summary-card {
            border: none;
            border-radius: 15px;
            background: #f8f9fa;
        }
    </style>
    <title>
        <?php echo "Cart: " . $totalQuantity . " products"; ?>
    </title>
</head>

<body class="bg-body-secondary">
    <main class="container py-5">
        <div class="mb-4">
            <h1 class="fw-bold">Your Shopping Cart</h1>
            <p class="text-muted">Review your items before proceeding to checkout.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="table-responsive shadow-sm rounded-4 bg-white p-3">
                    <table class="table align-middle cart-table">
                        <thead class="text-muted small text-uppercase">
                            <tr>
                                <th class="border-0 px-4">Product</th>
                                <th class="border-0 text-center">Price</th>
                                <th class="border-0 text-center">Quantity</th>
                                <th class="border-0 text-end px-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalPrice = 0;
                            foreach ($cartProducts as $cartItem):
                                $productId = $cartItem['id'];
                                $product = $productsIndexed[$productId];
                                ?>
                                <tr class="cart-row">
                                    <td class="px-4 py-3">
                                        <span class="fw-bold text-dark"><?= htmlspecialchars($product['name']) ?></span>
                                    </td>
                                    <td class="text-center">
                                        ₹<?= number_format($product['price'], 2) ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="quantity-control">
                                            <form action="../app/users/core/Cart.inc.php" method="post" class="m-0">
                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                <input type="hidden" name="action" value="decrement">
                                                <button class="btn btn-outline-secondary btn-qty">-</button>
                                            </form>

                                            <span class="fw-bold px-2"><?= $product['quantity'] ?></span>

                                            <form action="../app/users/core/Cart.inc.php" method="post" class="m-0">
                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                <input type="hidden" name="action" value="increment">
                                                <button class="btn btn-outline-secondary btn-qty">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="text-end px-4">
                                        <?php
                                        $subtotal = $product['price'] * $product['quantity'];
                                        $totalAfterDiscount = $subtotal;
                                        if ($subtotal > 2000) {
                                            $totalAfterDiscount = $subtotal * 0.90;
                                        }
                                        $taxAmount = $totalAfterDiscount * 0.18;
                                        $grandTotal = $totalAfterDiscount + $taxAmount;
                                        ?>
                                        <span class="fw-bold text-primary">₹<?= number_format($subtotal, 2) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="products" class="text-decoration-none text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg> Continue Shopping
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card summary-card p-4 shadow-sm">
                    <h4 class="fw-bold mb-4">Order Summary</h4>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>₹
                            <?= number_format($subtotal, 2) ?>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Discount</span>
                        <span>₹<?= number_format($subtotal * 0.10, 2) ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Estimated Tax (18%)</span>
                        <span>₹<?= number_format($taxAmount, 2) ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="h5 fw-bold">Grand Total</span>
                        <span class="h5 fw-bold text-primary">₹<?= number_format($grandTotal, 2) ?></span>
                    </div>
                    <button class="btn btn-warning btn-lg w-100 rounded-pill py-3 fw-bold btn-cart">
                        Proceed to Buy
                    </button>
                    <div class="mt-3 text-center">
                        <small class="text-muted">Secure Checkout Guaranteed</small>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>