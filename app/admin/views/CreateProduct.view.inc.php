<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <h1>Create Product</h1>
    <form action="../../../app/admin/core/CreateProduct.inc.php" method="POST" enctype="multipart/form-data">
        <div class="input-container">
            <label for="name">Name:</label>
            <input type="text" id="name" name="product_name" required>
        </div>
        <div class="input-container">
            <label for="description">Description:</label>
            <textarea id="description" name="product_description" rows="4" cols="50" required></textarea>
        </div>
        <div class="input-container">
            <label for="category">Category:</label>
            <input type="text" id="category" name="product_category" required>
        </div>
        <div class="input-container">
            <label for="price">Price:</label>
            <input type="number" id="price" name="product_price" step="0.01" required>
        </div>
        <div class="input-container">
            <label for="specialPrice">Special Price:</label>
            <input type="number" id="specialPrice" name="product_special_price" step="0.01" required>
        </div>
        <div class="input-container">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image_file" accept="image/*" required>
        </div>

        <button type="submit">Create Product</button>
    </form>
</body>

</html>