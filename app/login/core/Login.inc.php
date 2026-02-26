<?php
require_once __DIR__ . "../../../config/session.config.inc.php";

require_once "../models/Login.model.inc.php";
require_once "../controllers/Login.controller.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usernameOrEmail = $_POST['usernameOrEmail'] ?? '';
    $pwd = $_POST['pwd'] ?? '';

    $controller = new LoginController();
    $result = $controller->login($usernameOrEmail, $pwd);

    if (!$result['status']) {
        $_SESSION['errors_login']['login_error'] = $result['message'];
        header("Location: ../../../public");
        exit();
    }

    $controller->set_user_id($result['userId']);
    $controller->set_user($result['username']);

    if ($result['isAdmin']) {
        $controller->set_admin();
        header("Location: ../../../public/admin/products");
        exit();
    }

    header("Location: ../../../public/products");
    exit();
}