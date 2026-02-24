<?php

require_once __DIR__ . "/../interfaces/ViewProductsInterface.inc.php";
class ViewProducts extends Dbh implements ViewProductsInterface
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
    public function getProductsByCategory($productCategory)
    {
        try {
            $query = "SELECT * FROM products WHERE category = :productCategory";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":productCategory", $productCategory);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function getProductsByPriceRange($minPrice, $maxPrice)
    {
        try {
            $query = "SELECT * FROM products WHERE price BETWEEN :minPrice AND :maxPrice";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":minPrice", $minPrice);
            $stmt->bindParam(":maxPrice", $maxPrice);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function getProductsByRating($minRating)
    {
        try {
            $query = "SELECT * FROM products WHERE rating >= :minRating";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":minRating", $minRating);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function searchProducts($searchTerm)
    {
        try {
            $query = "SELECT * FROM products WHERE name LIKE :searchTerm OR description LIKE :searchTerm";

            $stmt = $this->connect()->prepare($query);
            $searchTerm = "%" . $searchTerm . "%";
            $stmt->bindParam(":searchTerm", $searchTerm);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}