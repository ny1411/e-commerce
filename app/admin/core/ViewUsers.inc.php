<?php

require_once __DIR__ . '/../controllers/ViewUsers.controller.inc.php';

// if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin' && ($_SERVER['REQUEST_METHOD'] === 'POST')) {

$viewUsersController = new ViewUsersController();
$allUsers = $viewUsersController->displayAllUsers();

$_SESSION['all_users'] = $allUsers;

//     header("Location: ../../public/users");
//     exit();
// } else {
//     header("Location: ../../public");
//     exit();
// }