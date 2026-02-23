<?php

require_once '../models/Login.model.inc.php';

class LoginController extends Login
{
    private $errors = [];

    public function login($usernameOrEmail, $pwd)
    {
        if ($this->is_empty($usernameOrEmail, $pwd)) {
            $this->errors['empty_inputs'] = "Fill in all the inputs.";
            $_SESSION['errors_login'] = $this->errors;
            header("Location: ../../../public");
            die();
        }

        if (!$this->does_user_exist($usernameOrEmail)) {
            $this->errors['user_not_exist'] = "User does not exist.";
            $_SESSION['errors_login'] = $this->errors;
            header("Location: ../../../public");
        }

        if (!$this->verify_password($usernameOrEmail, $pwd)) {
            $this->errors['incorrect_details'] = "Enter a valid username or password.";
            $_SESSION['errors_login'] = $this->errors;
            header("Location: ../../../public");
        }

        $userId = $this->get_id($usernameOrEmail);
        $this->set_user_id($userId);
        $this->set_user($usernameOrEmail);

        header("Location: ../../../public/products");
    }
}