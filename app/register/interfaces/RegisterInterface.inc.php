<?php

interface RegisterInterface
{
    public function is_empty($username, $email, $pwd);
    public function does_user_exist($username, $email);
}