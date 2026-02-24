<?php

require_once __DIR__ . "/../core/ViewProducts.inc.php";

$product = $_SESSION['all_products'][0] ?? null;        // must change this

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manageproduct</title>
</head>

<body>
    <main class="products-container">
        <h1>Manage Products</h1>
        <table id="all-products">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Special Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($product['name']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($product['description']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($product['price']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($product['special_price']) ?>
                    </td>
                    <td>
                        <img src="data:image/jpeg;base64,<?= base64_encode($product['image_blob']) ?>" width="150">
                    </td>
                    <td>
                        <form action="../../../app/admin/core/EditProduct.inc.php" method="POST" style="display:inline">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button class="edit-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen">
                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path
                                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                </svg>
                            </button>
                        </form>

                        <form action="../../../app/admin/core/DeleteProduct.inc.php" method="POST"
                            style="display:inline">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button class="delete-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash">
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                    <path d="M3 6h18" />
                                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php ?>
            </tbody>
        </table>
    </main>
</body>

</html>