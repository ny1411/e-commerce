<?php

interface LoginInterface
{
    public function is_empty($usernameOrEmail, $pwd);
    public function does_user_exist($usernameOrEmail);
    public function verify_password($usernameOrEmail, $pwd);
}