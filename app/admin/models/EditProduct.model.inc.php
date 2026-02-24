<?php

require_once __DIR__ . "/../../core/Dbh.inc.php";
require_once __DIR__ . "/../interfaces/EditProductInterface.inc.php";

class EditProduct extends Dbh implements EditProductInterface
{
    public function editProduct(
        $productId,
        $productName = null,
        $productDescription = null,
        $productPrice = null,
        $productSpecialPrice = null,
        $productImageFile = null,
        $productCategory = null
    ) {
        try {
            $stmt = $this->connect()->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->execute([':id' => $productId]);
            $current = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$current) {
                throw new Exception("Product with ID $productId not found");
            }

            $productName = !empty($productName) ? $productName : $current['name'];
            $productDescription = !empty($productDescription) ? $productDescription : $current['description'];
            $productPrice = !empty($productPrice) ? $productPrice : $current['price'];
            $productSpecialPrice = !empty($productSpecialPrice) ? $productSpecialPrice : $current['special_price'];
            $productCategory = !empty($productCategory) ? $productCategory : $current['category'];

            if (
                isset($productImageFile) &&
                isset($productImageFile['tmp_name']) &&
                is_uploaded_file($productImageFile['tmp_name']) &&
                $productImageFile['size'] > 0
            ) {
                $productImage = file_get_contents($productImageFile['tmp_name']);
            } else {
                $productImage = $current['image_blob'];
            }

            $query = "UPDATE products 
                      SET name = :productName, 
                          description = :productDescription, 
                          category = :productCategory,
                          price = :productPrice, 
                          special_price = :productSpecialPrice, 
                          image_blob = :productImage
                      WHERE id = :productId";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":productName", $productName);
            $stmt->bindParam(":productDescription", $productDescription);
            $stmt->bindParam(":productPrice", $productPrice);
            $stmt->bindParam(":productSpecialPrice", $productSpecialPrice);
            $stmt->bindParam(":productImage", $productImage, PDO::PARAM_LOB);
            $stmt->bindParam(":productCategory", $productCategory);
            $stmt->bindParam(":productId", $productId);

            $stmt->execute();
        } catch (PDOException $e) {
            die("Database Error: " . $e->getMessage());
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}