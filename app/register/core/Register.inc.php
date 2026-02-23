<?php

require_once __DIR__ . "../../../config/session.config.inc.php";
require_once "../models/Register.model.inc.php";
require_once "../controllers/Register.controller.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new RegisterController();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $adminRole = $_POST['role-admin'] === 'admin';

    $controller->register($username, $email, $pwd, $adminRole);
    exit();
}