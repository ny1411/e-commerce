<?php

class EditProduct extends Dbh implements EditProductInterface
{
    public function editProduct(
        $productId,
        $productName,
        $productDescription,
        $productPrice,
        $productSpecialPrice,
        $productImage,
        $productCategory
    ) {
        try {
            $query = "UPDATE products 
            SET name = :productName, description = :productDescription, 
            category = :productCategory,
            price = :productPrice, special_price = :productSpecialPrice, 
            image_blob = :productImage
            WHERE id = :productId";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":productName", $productName);
            $stmt->bindParam(":productDescription", $productDescription);
            $stmt->bindParam(":productPrice", $productPrice);
            $stmt->bindParam(":productSpecialPrice", $productSpecialPrice);
            $stmt->bindParam(":productImage", $productImage);
            $stmt->bindParam(":productCategory", $productCategory);
            $stmt->bindParam(":productId", $productId);

            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}