<?php

class ViewProduct extends Dbh implements ViewProductsInterface
{
    public function getAllProducts()
    {
        try {
            $query = "SELECT * FROM products";

            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function getProductById($productId)
    {
        try {
            $query = "SELECT * FROM products WHERE id = :productId";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":productId", $productId);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}