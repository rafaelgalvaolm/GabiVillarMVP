<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/views/home/home.php';
        break;
    case '' :
        require __DIR__ . '/views/home/home.php';
        break;
    case '/login' :
        require __DIR__ . '/views/login/login.php';
        break;
    case '/login/autenticar':
        require __DIR__ . '/controllers/AuthController.php';
        $pdo = require __DIR__ . '/config/database.php';
        $controller = new AuthController($pdo);
        $controller->autenticar();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
