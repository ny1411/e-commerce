<?php

require_once __DIR__ . "/../../core/Dbh.inc.php";
require_once __DIR__ . "/../interfaces/ViewUsersInterface.inc.php";

class ViewUsers extends Dbh implements ViewUsersInterface
{
    public function getAllUsers()
    {
        try {
            $query = "SELECT * FROM users";

            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function getUserById($userId)
    {
        try {
            $query = "SELECT * FROM users WHERE id = :userId";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}