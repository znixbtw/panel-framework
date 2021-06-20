<?php

require_once '../app/require.php';

use app\Helpers\Session;
use app\Core\Application;
use app\Libraries\Routing\Routes;

Session::init();

$app = new Application();

// Main routes
$app->router->get('/', [Routes::class, 'index']);
$app->router->get('/tos', [Routes::class, 'tos']);
$app->router->get('/privacy', [Routes::class, 'privacy']);
// Panel routes
$app->router->get('/panel', [Routes::class, 'panel']);
$app->router->get('/panel/profile', [Routes::class, 'profile']);
// Admin routes
// Auth routes
$app->router->get('/auth/login', [Routes::class, 'login']);
$app->router->get('/auth/register', [Routes::class, 'register']);
$app->router->post('/auth/login', [Routes::class, 'login']);
$app->router->post('/auth/register', [Routes::class, 'register']);
$app->router->post('/auth/logout', [Routes::class, 'logout']);
//

$app->run();