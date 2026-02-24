<?php

require_once __DIR__ . '/../models/ViewUsers.model.inc.php';

class ViewUsersController extends ViewUsers
{
    public function displayAllUsers()
    {
        $users = $this->getAllUsers();
        return $users;
    }
    public function displayUserById($userId)
    {
        $user = $this->getUserById($userId);
        return $user;
    }
}