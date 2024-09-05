<?php

use App\Controllers\Users;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Route Users
$routes->get('users', [Users::class, 'index']);

service('auth')->routes($routes);
