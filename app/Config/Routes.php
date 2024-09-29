<?php

use App\Controllers\Users;
use App\Controllers\Anggota;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');


// Route Users, only admin can access
$routes->group('admin', ['filter' => 'group:admin'], function ($routes) {
    $routes->get('users', [Users::class, 'index']);
    $routes->post('users', [Users::class, 'index']);
    $routes->get('activateUser/(:segment)', [Users::class, 'activateUser']);
    $routes->get('deleteUser/(:segment)', [Users::class, 'deleteUser']);
});

// Route Anggota, only user in group anggota can access
$routes->group('anggota', ['filter' => 'group:anggota'], function ($routes) {
    $routes->get('/', [Anggota::class, 'index']);
    $routes->post('upload-image-article', [Anggota::class, 'uploadImgArticle']);
    $routes->post('delete-image-article', [Anggota::class, 'deleteImgArticle']);
    $routes->get('tambah-catatan-baru', [Anggota::class, 'addNewCatatan']);
    $routes->post('tambah-catatan-baru', [Anggota::class, 'addNewCatatan']);
});

service('auth')->routes($routes);
