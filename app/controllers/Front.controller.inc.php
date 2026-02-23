<?php

class FrontController
{
    public static function login()
    {
        require_once __DIR__ . "/../login/views/Login.view.inc.php";
    }
    public static function register()
    {
        require_once __DIR__ . "/../register/views/Register.view.inc.php";
    }
    public static function products()
    {
        require_once __DIR__ . "/../users/views/ViewProducts.view.inc.php";
    }
    public static function product($productId)
    {
        require_once __DIR__ . "/../users/views/ViewProduct.view.inc.php";
    }
    public static function cart()
    {
        require_once __DIR__ . "/../users/views/Cart.view.inc.php";
    }
    public static function error404()
    {
        http_response_code(404);
        echo "404 Page Not Found";
    }
}
