<?php

use App\Controllers\Users;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Route Users
$routes->get('admin/users', [Users::class, 'index']);
$routes->post('admin/users', [Users::class, 'index']);
$routes->get('admin/activateUser/(:segment)', [Users::class, 'activateUser']);
$routes->get('admin/deleteUser/(:segment)', [Users::class, 'deleteUser']);


service('auth')->routes($routes);
