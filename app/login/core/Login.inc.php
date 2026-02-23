<?php

require_once __DIR__ . "../../../config/session.config.inc.php";
require_once "../models/Login.model.inc.php";
require_once "../controllers/Login.controller.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new LoginController();

    $usernameOrEmail = $_POST['usernameOrEmail'];
    $pwd = $_POST['pwd'];

    $controller->login($usernameOrEmail, $pwd);
    exit();
}