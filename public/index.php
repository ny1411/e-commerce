<?php

use App\Core\Router;
require_once '../app/core/Router.inc.php';
require_once '../app/controllers/Front.controller.inc.php';
require_once '../app/config/session.config.inc.php';
require_once '../app/core/Dbh.inc.php';

$router = new Router();
$frontController = new FrontController();
header("Content-Type: text/html; charset=UTF-8");

$router->add('GET', '/', [$frontController, 'login']);
$router->add('GET', '/register', [$frontController, 'register']);
$router->add('GET', '/admin/users', [$frontController, 'users']);
$router->add('GET', '/admin/user/(\d+)', [$frontController, 'user']);
$router->add('GET', '/admin/products', [$frontController, 'adminProducts']);
$router->add('GET', '/admin/product/(\d+)', [$frontController, 'adminProduct']);
$router->add('GET', '/admin/product/create', [$frontController, 'adminCreateProduct']);
$router->add('GET', '/admin/product/(\d+)/delete', [$frontController, 'adminDeleteProduct']);
$router->add('GET', '/admin/product/(\d+)/edit', [$frontController, 'adminEditProduct']);
$router->add('GET', '/products', [$frontController, 'products']);
$router->add('GET', '/product/(\d+)', [$frontController, 'product']);
$router->add('GET', '/cart', [$frontController, 'cart']);
$router->add('GET', '/.*', [$frontController, 'error404']);


// Get request URI
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = urldecode($request);

$basePath = dirname($_SERVER['SCRIPT_NAME']);

$request = str_replace($basePath, '', $request);
$request = rtrim($request, '/');

if ($request === '')
    $request = '/';

// Dispatch
$router->dispatch($request, $_SERVER['REQUEST_METHOD']);