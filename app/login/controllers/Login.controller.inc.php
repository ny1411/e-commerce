<?php

require_once __DIR__ . '/../models/Login.model.inc.php';

class LoginController extends Login
{
    private $errors = [];

    public function login($usernameOrEmail, $pwd)
    {
        if ($this->is_empty($usernameOrEmail, $pwd)) {
            return [
                'status' => false,
                'code' => 400,
                'message' => 'Fill in all the inputs.'
            ];
        }

        if (!$this->does_user_exist($usernameOrEmail)) {
            return [
                'status' => false,
                'code' => 404,
                'message' => 'User does not exist.'
            ];
        }

        if (!$this->verify_password($usernameOrEmail, $pwd)) {
            return [
                'status' => false,
                'code' => 401,
                'message' => 'Enter a valid username or password.'
            ];
        }

        $userId = $this->get_id($usernameOrEmail);
        $this->set_user_id($userId);

        $isAdmin = $this->is_admin($usernameOrEmail);
        if ($isAdmin) {
            $this->set_admin();
        }

        return [
            'status' => true,
            'code' => 200,
            'userId' => $userId,
            'username' => $usernameOrEmail,
            'isAdmin' => $isAdmin
        ];
    }
}