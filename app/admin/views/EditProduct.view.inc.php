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
    <title>Edit Product</title>
</head>

<body>
    <main class="edit-product-container">
        <h1>Edit Product:
            <?= htmlspecialchars($product['name']) ?>
        </h1>

        <form action="../../../../app/admin/core/EditProduct.inc.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description"
                required><?= htmlspecialchars($product['description']) ?></textarea><br><br>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?= htmlspecialchars($product['category']) ?>"
                required><br><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="<?= $product['price'] ?>" required><br><br>

            <label for="special_price">Special Price:</label>
            <input type="number" id="special_price" name="special_price" step="0.01"
                value="<?= $product['special_price'] ?>"><br><br>

            <label>Current Image:</label><br>
            <?php if (!empty($product['image_blob'])): ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($product['image_blob']) ?>" width="150"><br><br>
            <?php else: ?>
                No image uploaded<br><br>
            <?php endif; ?>

            <label for="image">Change Image:</label>
            <input type="file" id="image" name="image"><br><br>

            <button type="submit">Update Product</button>
        </form>
    </main>
</body>

</html>