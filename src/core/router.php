<?php

class Router
{

    protected array $routes = [];


    public function register(array $routes): void
    {
        $this->routes = $routes;
    }


    public function direct(string $uri, string $method): void
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            require_once $this->routes[$method][$uri];
        } else {
            echo '404';
        }
    }
}
