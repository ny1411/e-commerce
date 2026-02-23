<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function add($method, $pattern, $callback)
    {
        $this->routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'callback' => $callback
        ];
    }

    public function dispatch($uri, $method)
    {
        foreach ($this->routes as $route) {
            $pattern = "#^" . $route['pattern'] . "$#";

            if ($route['method'] === $method && preg_match($pattern, $uri, $matches)) {
                return call_user_func_array($route['callback'], array_slice($matches, 1));
            }
        }

        http_response_code(404);
        echo json_encode(["error" => "Route not found"]);
    }
}
