<?php

require_once __DIR__ . "/../core/ViewProducts.inc.php";

$product = $_SESSION['all_products'][0] ?? null;        // must change this

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Manage Product</title>
</head>

<body class="bg-body-secondary">
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold mb-0">Manage Products</h1>
                <p class="text-muted">Edit, delete, or review your current inventory.</p>
            </div>
        </div>

        <div class="table-container shadow-sm p-3">
            <div class="table-responsive">
                <table class="table align-middle manage-table table-hover" id="all-products">
                    <thead class="text-muted small text-uppercase">
                        <tr>
                            <th class="border-0 ps-4">Image</th>
                            <th class="border-0">Product Details</th>
                            <th class="border-0">Price</th>
                            <th class="border-0">Special</th>
                            <th class="border-0 text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4">
                                <img src="data:image/jpeg;base64,<?= base64_encode($product['image_blob']) ?>"
                                    width="60" height="60" alt="Product">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($product['name']) ?></div>
                                <div class="text-muted small text-truncate" style="max-width: 250px;">
                                    <?= htmlspecialchars($product['description']) ?>
                                </div>
                            </td>
                            <td>$<?= number_format($product['price'], 2) ?></td>
                            <td>
                                <?php if ($product['special_price']): ?>
                                    <span class="badge bg-light text-danger border border-danger rounded-pill">
                                        $<?= number_format($product['special_price'], 2) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-muted">—</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <form action="../../../app/admin/core/EditProduct.inc.php" method="POST"
                                        class="m-0">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                        <button type="submit" class="btn-action edit-btn" title="Edit Product">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path
                                                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                            </svg>
                                        </button>
                                    </form>

                                    <form action="../../../app/admin/core/DeleteProduct.inc.php" method="POST"
                                        class="m-0"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                        <button type="submit" class="btn-action delete-btn" title="Delete Product">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18" />
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
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