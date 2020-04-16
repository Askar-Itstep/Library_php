<?php
session_start();

require './vendor/autoload.php';

if (!isset($_SESSION['auth']) && $_SERVER['REQUEST_URI'] !== '/login') {
    header('Location: /login');
    return;
}



$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    //--- Login
    $r->addRoute(['GET', 'POST'], '/login', function() {
        $controller = new \App\Controllers\LoginController();
        $controller->run();
    });
    $r->addRoute(['GET', 'POST'], '/logout', function() {
        $controller = new \App\Controllers\LoginController();
        $controller->runLogout();
    });

    // --- Main
    $r->addRoute('GET', '/', function() {
        $controller = new \App\Controllers\MainController();
        $controller->run();
    });

    // --- User
    $r->addRoute(['GET', 'POST'], '/users', function() {
        $controller = new \App\Controllers\UserController();
        $controller->run();
    });
    $r->addRoute(['GET', 'POST'], '/user/add', function() {
        $controller = new \App\Controllers\UserController();
        $controller->runAdd();
    });
    $r->addRoute(['GET', 'POST'], '/user/edit', function() {
        $controller = new \App\Controllers\UserController();
        $controller->runEdit();
    });
    $r->addRoute(['GET', 'POST'], '/user/delete', function() {
        $controller = new \App\Controllers\UserController();
        $controller->runDelete();
    });

    /*
     * // {id} must be a number (\d+)
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
    */
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler();
        break;
}
