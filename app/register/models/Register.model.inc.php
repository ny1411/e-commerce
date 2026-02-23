<?php

require_once '../../core/Dbh.inc.php';
require_once '../interfaces/RegisterInterface.inc.php';

class Register extends Dbh implements RegisterInterface
{
    public function get_id($username)
    {
        try {
            $query = "SELECT id from users WHERE username = :username";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();

            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function is_empty($username, $email, $pwd)
    {
        return empty($username) || empty($email) || empty($pwd);
    }
    public function does_user_exist($username, $email)
    {
        try {
            $query = "SELECT username, email FROM users WHERE username = :username OR email = :email";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result && ($result['username'] == $username || $result['email'] == $email);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function set_user($username, $email, $pwd, $isAdmin = false)
    {
        try {
            $query = "INSERT INTO users (username, pwd, email, user_role) VALUES (:username, :pwd, :email, :is_admin)";
            $stmt = $this->connect()->prepare($query);

            $options = ['cost' => 12];
            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pwd", $hashedPwd);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":is_admin", $isAdmin);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['username'] = $username;

            return $result;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function set_user_id($userId)
    {
        $_SESSION['user_id'] = $userId;
    }
}