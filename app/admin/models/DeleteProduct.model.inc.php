<?php

require_once __DIR__ . "/../../core/Dbh.inc.php";
require_once __DIR__ . "/../interfaces/DeleteProductInterface.inc.php";

class DeleteProduct extends Dbh implements DeleteProductInterface
{
    public function deleteProduct($productId)
    {
        try {
            $query = "DELETE FROM products WHERE id = :productId";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":productId", $productId);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}