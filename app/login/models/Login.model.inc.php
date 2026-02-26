<?php

require_once __DIR__ . '/../../core/Dbh.inc.php';
require_once __DIR__ . '/../interfaces/LoginInterface.inc.php';

class Login extends Dbh implements LoginInterface
{

    public function get_id($usernameOrEmail)
    {
        try {
            $query = "SELECT id from users WHERE username = :usernameOrEmail OR email = :usernameOrEmail";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usernameOrEmail", $usernameOrEmail);
            $stmt->execute();

            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function is_empty($usernameOrEmail, $pwd)
    {
        return empty($usernameOrEmail) || empty(($pwd));
    }

    public function does_user_exist($usernameOrEmail)
    {
        try {
            $query = "SELECT username, email FROM users WHERE username = :usernameOrEmail OR email = :usernameOrEmail";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':usernameOrEmail', $usernameOrEmail);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result && ($result['username'] == $usernameOrEmail || $result['email'] == $usernameOrEmail);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function verify_password($usernameOrEmail, $pwd)
    {
        try {
            $query = "SELECT pwd from users WHERE username = :usernameOrEmail OR email = :usernameOrEmail";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(':usernameOrEmail', $usernameOrEmail);
            $stmt->execute();

            $storedPwd = $stmt->fetchColumn();
            return password_verify($pwd, $storedPwd);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function is_admin($usernameOrEmail)
    {
        try {
            $query = "SELECT user_role from users WHERE username = :usernameOrEmail OR email = :usernameOrEmail";

            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usernameOrEmail", $usernameOrEmail);
            $stmt->execute();

            $result = $stmt->fetchColumn();
            return ($result == 'admin') ? true : false;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function set_user($username)
    {
        $_SESSION['username'] = $username;
    }

    public function set_user_id($userId)
    {
        $_SESSION['user_id'] = $userId;
    }
    public function set_admin()
    {
        $_SESSION['is_admin'] = true;
    }
}