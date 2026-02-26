<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Create Product</title>
</head>

<body class="bg-body-secondary">
    <main class="container d-flex align-items-center justify-content-center py-5" style="min-height: 100vh;">
        <div class="card admin-card shadow-lg p-4 p-md-5">
            <div class="text-center mb-4">
                <div class="mb-3 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-package-plus">
                        <path d="M16 16h6" />
                        <path d="M19 13v6" />
                        <path
                            d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                        <path d="m7.5 4.27 9 5.15" />
                        <polyline points="3.29 7 12 12 20.71 7" />
                        <line x1="12" y1="22" x2="12" y2="12" />
                    </svg>
                </div>
                <h2 class="fw-bold">Create New Product</h2>
                <p class="text-muted">Fill in the details to add a new item to the shop</p>
            </div>

            <form action="../../../app/admin/core/CreateProduct.inc.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Product Name</label>
                    <input type="text" id="name" name="product_name" class="form-control"
                        placeholder="Enter product name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea id="description" name="product_description" class="form-control" rows="3"
                        placeholder="Tell customers about this product..." required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="category" class="form-label fw-semibold">Category</label>
                        <input type="text" id="category" name="product_category" class="form-control"
                            placeholder="e.g. Electronics, Clothing" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-semibold">Regular Price (₹)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">₹</span>
                            <input type="number" id="price" name="product_price" class="form-control" step="0.01"
                                placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="specialPrice" class="form-label fw-semibold">Special Price (₹)</label>
                        <div class="input-group border-primary">
                            <span class="input-group-text bg-primary text-white">₹</span>
                            <input type="number" id="specialPrice" name="product_special_price"
                                class="form-control border-primary" step="0.01" placeholder="0.00" required>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Product Image</label>
                    <input type="file" id="image" name="image_file" class="form-control" accept="image/*" required>
                    <div class="form-text">High-resolution JPG or PNG recommended.</div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning btn-lg rounded-pill py-3 fw-bold shadow-sm btn-cart">
                        Publish Product
                    </button>
                    <a href="../products" class="btn btn-link text-decoration-none text-muted">Cancel and Go
                        Back</a>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>