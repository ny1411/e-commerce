<?php

require_once __DIR__ . "/../core/ViewProducts.inc.php";

$product = $_SESSION['all_products'][0];        // must change this

if (!$product) {
    echo "No product selected for editing.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Product</title>
</head>

<body class="bg-body-secondary">
    <main class="container d-flex align-items-center justify-content-center py-5" style="min-height: 100vh;">
        <div class="card admin-card shadow-lg p-4 p-md-5">
            <div class="text-center mb-4">
                <div class="mb-3 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>
                </div>
                <h2 class="fw-bold">Edit Product</h2>
                <p class="text-muted small">Updating: <span
                        class="text-dark fw-semibold"><?= htmlspecialchars($product['name']) ?></span></p>
            </div>

            <form action="../../../../app/admin/core/EditProduct.inc.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Product Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="<?= htmlspecialchars($product['name']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="3"
                        required><?= htmlspecialchars($product['description']) ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="category" class="form-label fw-semibold">Category</label>
                        <input type="text" id="category" name="category" class="form-control"
                            value="<?= htmlspecialchars($product['category']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-semibold">Regular Price ($)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">$</span>
                            <input type="number" id="price" name="price" class="form-control" step="0.01"
                                value="<?= $product['price'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="special_price" class="form-label fw-semibold">Special Price ($)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white">$</span>
                            <input type="number" id="special_price" name="special_price" class="form-control"
                                step="0.01" value="<?= $product['special_price'] ?>">
                        </div>
                    </div>
                </div>

                <div class="mb-4 p-3 bg-light rounded-3 border">
                    <label class="form-label fw-semibold d-block">Current Product Image</label>
                    <?php if (!empty($product['image_blob'])): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($product['image_blob']) ?>"
                            class="edit-thumb shadow-sm mb-3" width="120">
                    <?php else: ?>
                        <p class="text-muted small">No image currently set.</p>
                    <?php endif; ?>

                    <label for="image" class="form-label fw-semibold d-block mt-2">Replace Image (Optional)</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning btn-lg rounded-pill py-3 fw-bold shadow-sm btn-cart">
                        Save Changes
                    </button>
                    <a href="../<?= $product['id'] ?>" class="btn btn-link text-decoration-none text-muted">Discard
                        Changes</a>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>