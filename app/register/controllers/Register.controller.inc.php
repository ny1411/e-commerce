<?php

require_once '../models/Register.model.inc.php';

class RegisterController extends Register
{
    private $errors = [];

    public function register($username, $email, $pwd, $isAdmin = false)
    {
        echo $username . " " . $email . " " . $pwd;
        if ($this->is_empty($username, $email, $pwd)) {
            $this->errors['empty_inputs'] = "Fill in all the inputs.";
            $_SESSION['errors_login'] = $this->errors;
            header("Location: ../../../public");
            exit();
        }

        if ($this->does_user_exist($username, $email)) {
            $this->errors['user_exist'] = "User already exists.";
            $_SESSION['errors_login'] = $this->errors;
            header("Location: ../../../public");
            exit();
        }

        $this->set_user($username, $email, $pwd, $isAdmin);
        $userId = $this->get_id($username);
        $this->set_user_id($userId);

        header("Location: ../../../public/products");
    }
}