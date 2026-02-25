<?php

require_once __DIR__ . "/../controllers/ViewProducts.controller.inc.php";

$productsController = new ViewProductsController();

$product = $productsController->fetchProduct($productId);
$product = $product[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Product <?= $productId ?></title>
</head>

<body>
    <main class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../products" class="text-decoration-none">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($product['name']) ?></li>
            </ol>
        </nav>

        <div class="card product-detail-card shadow-lg p-4">
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="img-zoom-container shadow-sm p-3">
                        <img src="data:image/jpeg;base64,<?= base64_encode($product['image_blob']) ?>"
                            alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid">
                    </div>
                </div>

                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h1 class="display-5 fw-bold mb-3"><?= htmlspecialchars($product['name']) ?></h1>

                    <div class="mb-4">
                        <span
                            class="h3 fw-bold text-primary me-2">₹<?= htmlspecialchars($product['special_price']) ?></span>
                        <span
                            class="h5 text-muted text-decoration-line-through">₹<?= htmlspecialchars($product['price']) ?></span>
                        <span class="badge badge-special ms-2 rounded-pill px-3 py-2">Special Offer</span>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold">Description</h5>
                        <p class="text-muted lh-base">
                            <?= htmlspecialchars($product['description']) ?>
                        </p>
                    </div>

                    <div class="d-grid gap-2 d-md-flex mt-auto">
                        <form action="../../app/users/core/Cart.inc.php" method="post" class="w-100">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="action" value="increment">
                            <button type="submit"
                                class="btn btn-warning btn-lg w-100 rounded-pill py-3 fw-bold btn-cart d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="me-2">
                                    <circle cx="8" cy="21" r="1" />
                                    <circle cx="19" cy="21" r="1" />
                                    <path
                                        d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                </svg>
                                Add to Shopping Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once __DIR__ . "/../core/Cart.inc.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>