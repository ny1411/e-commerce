<?php

require_once __DIR__ . "/../core/ViewProducts.inc.php";

$products = $_SESSION['all_products'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Manage Products</title>
</head>

<body class="bg-body-secondary">
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold">Manage Products</h1>
                <p class="text-muted small">Update inventory, prices, and product details.</p>
            </div>
            <a href="../admin/product/create" class="btn btn-warning rounded-pill px-4 py-2 fw-bold shadow-sm btn-cart">
                + Add Product
            </a>
        </div>

        <div class="card manage-products-card shadow-sm overflow-hidden">
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0" id="all-products">
                    <thead class="py-4">
                        <tr>
                            <th class="ps-4 py-auto">Product</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Special</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $item): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/jpeg;base64,<?= base64_encode($item['image_blob']) ?>"
                                            class="product-img-mini me-3" width="50" height="50">
                                        <span class="fw-bold text-dark"><?= htmlspecialchars($item['name']) ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-muted small text-truncate" style="max-width: 200px;">
                                        <?= htmlspecialchars($item['description']) ?>
                                    </div>
                                </td>
                                <td class="fw-semibold">
                                    $<?= number_format($item['price'], 2) ?>
                                </td>
                                <td>
                                    <?php if ($item['special_price']): ?>
                                        <span class="badge bg-light text-success border border-success rounded-pill px-2">
                                            $<?= number_format($item['special_price'], 2) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="text-muted small">None</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="../admin/product/<?= $item['id'] ?>/edit" class="btn-action btn-edit"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path
                                                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                            </svg>
                                        </a>

                                        <form action="../../app/admin/core/DeleteProduct.inc.php" method="POST" class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <button type="submit" class="btn-action btn-delete" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                                    <path d="M3 6h18" />
                                                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>