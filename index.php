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
    // --------------------------- Book -----------------------------------
    $r->addRoute(['GET', 'POST'], '/books', function() {
        $controller = new \App\Controllers\BooksController();
        $controller->run();
    });
    $r->addRoute(['GET', 'POST'], '/books/add', function() {
        $controller = new \App\Controllers\BooksController();
        $controller->runAdd();
    });
    $r->addRoute(['GET', 'POST'], '/books/edit', function() {
        $controller = new \App\Controllers\BooksController();
        $controller->runEdit();
    });
    $r->addRoute(['GET', 'POST'], '/books/delete', function() {
        $controller = new \App\Controllers\BooksController();
        $controller->runDelete();
    });
    $r->addRoute(['GET', 'POST'], '/books/show', function() {
        $controller = new \App\Controllers\BooksController();
        $controller->runShow();
    });
    $r->addRoute(['GET', 'POST'], '/books/status', function() {
        $controller = new \App\Controllers\BooksController();
        $controller->runStatus();
    });
    // --------------------------- Orders -----------------------------------
    $r->addRoute(['GET', 'POST'], '/orders', function() {
        $controller = new \App\Controllers\OrdersController();
        $controller->run();
    });
    // $r->addRoute(['GET', 'POST'], '/orders/add', function() {
    //     $controller = new \App\Controllers\OrdersController();
    //     $controller->runAdd();
    // });
    // $r->addRoute(['GET', 'POST'], '/orders/edit', function() {
    //     $controller = new \App\Controllers\OrdersController();
    //     $controller->runEdit();
    // });
    // $r->addRoute(['GET', 'POST'], '/orders/delete', function() {
    //     $controller = new \App\Controllers\OrdersController();
    //     $controller->runDelete();
    // });
    // --------------------------- Authorss -----------------------------------
    $r->addRoute(['GET', 'POST'], '/authors', function() {
        $controller = new \App\Controllers\AuthorController();
        $controller->run();
    });
    $r->addRoute(['GET', 'POST'], '/authors/add', function() {
        $controller = new \App\Controllers\AuthorController();
        $controller->runAdd();
    });
    $r->addRoute(['GET', 'POST'], '/authors/edit', function() {
        $controller = new \App\Controllers\AuthorController();
        $controller->runEdit();
    });
    $r->addRoute(['GET', 'POST'], '/authors/delete', function() {
        $controller = new \App\Controllers\AuthorController();
        $controller->runDelete();
    });
    $r->addRoute(['GET'], '/authors/edit?id=', function() {
        $controller = new \App\Controllers\AuthorController();
        $controller->runEdit();
    });
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
