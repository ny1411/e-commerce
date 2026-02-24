<?php

require_once __DIR__ . "/../../core/Dbh.inc.php";
require_once __DIR__ . "/../interfaces/ViewProductsInterface.inc.php";

class ViewProduct extends Dbh implements ViewProductsAdminInterface
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