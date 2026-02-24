<?php

require_once __DIR__ . "/../../core/Dbh.inc.php";
require_once __DIR__ . "/../interfaces/CartInterface.inc.php";

class Cart extends Dbh implements CartInterface
{
    public function getAllProductsInCart($userId)
    {
        try {
            $query = "SELECT * FROM cart WHERE user_id = :userId";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function addProductToCart($userId, $productId, $quantity)
    {
        try {
            $query = "INSERT INTO cart (user_id, product_id, quantity)
            VALUES (:userId, :productId, :quantity) ON DUPLICATE KEY UPDATE
            quantity = quantity + VALUES(quantity)";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":userId", $userId);
            $stmt->bindParam(":productId", $productId);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->execute();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function removeProductFromCart($userId, $productId)
    {
        try {
            $query = "UPDATE cart 
                  SET quantity = quantity - 1 
                  WHERE user_id = :userId 
                  AND product_id = :productId 
                  AND quantity > 0";

            $stmt = $this->connect()->prepare($query);
            $stmt->execute([
                ':userId' => $userId,
                ':productId' => $productId
            ]);

            $deleteQuery = "DELETE FROM cart WHERE user_id = :userId AND product_id = :productId AND quantity <= 0";

            $deleteStmt = $this->connect()->prepare($deleteQuery);
            $deleteStmt->execute([
                ':userId' => $userId,
                ':productId' => $productId
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }
}