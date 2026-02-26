<?php

require_once __DIR__ . "/../core/ViewProducts.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>All Products</title>
</head>

<body class="bg-body-secondary">
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">All Products</h1>
            <div>
                <a href="../public/cart" type="submit"
                    class="btn btn-outline-warning btn-lg text-dark rounded-pill px-4">
                    Go to Cart
                </a>
                <a href="../app/core/Logout.inc.php" type="submit"
                    class="btn btn-outline-danger btn-lg text-dark rounded-pill px-4">
                    Logout
                </a>
            </div>
        </div>
        <div class="row g-4">
            <?php foreach ($products as $item): ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="card h-100 product-card shadow-sm">
                        <a href="../public/product/<?= $item['id'] ?>">
                            <img src="data:image/jpeg;base64,<?= base64_encode($item['image_blob']) ?>" class="card-img-top"
                                alt="<?= htmlspecialchars($item['name']) ?>" style="height: 200px; object-fit: cover;">
                        </a>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <a href="../public/product/<?= $item['id'] ?>" class="text-decoration-none text-dark">
                                    <?= htmlspecialchars($item['name']) ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted small flex-grow-1">
                                <?= htmlspecialchars(substr($item['description'], 0, 80)) ?>...
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="text-muted small text-decoration-line-through">₹
                                        <?= htmlspecialchars($item['price']) ?>
                                    </div>
                                    <div class="special-price h5 mb-0">₹
                                        <?= htmlspecialchars($item['special_price']) ?>
                                    </div>
                                </div>

                                <form action="../app/users/core/Cart.inc.php" method="post" class="m-0">
                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="action" value="increment">
                                    <button type="submit" class="btn btn-primary btn-cart rounded-circle p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="8" cy="21" r="1" />
                                            <circle cx="19" cy="21" r="1" />
                                            <path
                                                d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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