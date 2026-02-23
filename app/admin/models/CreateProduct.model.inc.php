<?php

class CreateProduct extends Dbh implements CreateProductInterface
{
    public function createProduct(
        $productName,
        $productCategory,
        $productDescription,
        $productPrice,
        $productSpecialPrice,
        $productImage
    ) {
        try {
            $query = "INSERT INTO products 
            (name, description, category, price, special_price, image_blob) 
            VALUES (:productName, :productDescription, :productCategory, :productPrice, :productSpecialPrice, :productImageBlob)";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':productName', $productName);
            $stmt->bindParam(':productDescription', $productDescription);
            $stmt->bindParam(':productCategory', $productCategory);
            $stmt->bindParam(':productPrice', $productPrice);
            $stmt->bindParam(':productSpecialPrice', $productSpecialPrice);
            $stmt->bindParam(':productImageBlob', $productImage);

            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}