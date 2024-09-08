<?php

use App\Controllers\Users;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Route Users
$routes->get('admin/users', [Users::class, 'index']);
$routes->post('admin/addNewUserAction', [Users::class, 'addNewUser']);

service('auth')->routes($routes);
