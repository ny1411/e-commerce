<?php


class Dbh
{
    private $host = "localhost";
    private $dbname = "ecommerce";
    private $username = "root";
    private $pwd = "";

    protected function connect()
    {
        try {
            $pdo = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;",
                $this->username,
                $this->pwd
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connectio failed " . $e->getMessage());
        }
    }
}