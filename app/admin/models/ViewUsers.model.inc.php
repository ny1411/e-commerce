<?php

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
}