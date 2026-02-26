<?php

require_once __DIR__ . '/../login/controllers/Login.controller.inc.php';

class ApiLoginController extends LoginController
{
    public function login($usernameOrEmail = null, $pwd = null)
    {
        header('Content-Type: application/json');

        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $usernameOrEmail = $data['usernameOrEmail'] ?? '';
        $pwd = $data['pwd'] ?? '';

        $result = parent::login($usernameOrEmail, $pwd);

        http_response_code($result['code'] ?? 200);
        echo json_encode($result);
        exit();
    }
}