<?php

require_once '../core/request.php';
require_once '../core/router.php';
require_once '../core/routes.php';


$uri = Request::uri();
$method = Request::method();

$router = new Router();

$router->register($routes);

$router->direct($uri, $method);
