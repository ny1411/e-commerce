<?php

require_once __DIR__ . "/../core/ViewProducts.inc.php";
require_once __DIR__ . "/../core/Cart.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
</head>

<body>
    <main>
        <h1>All Products</h1>
        <table id="all-products">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Special Price</th>
                    <th>Add to Cart</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $item): ?>
                    <tr>
                        <td>
                            <?= htmlspecialchars($item['name']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($item['description']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($item['price']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($item['special_price']) ?>
                        </td>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($item['image_blob']) ?>" width="150">
                        </td>
                        <td>
                            <form action="../app/users/core/Cart.inc.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <input type="hidden" name="action" value="increment">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                                        <circle cx="8" cy="21" r="1" />
                                        <circle cx="19" cy="21" r="1" />
                                        <path
                                            d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>