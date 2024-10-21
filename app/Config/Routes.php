<?php

use App\Controllers\Users;
use App\Controllers\Anggota;
use App\Controllers\Profil;
use App\Controllers\Verificator;
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
    $routes->get('jobdes', [Users::class, 'jobdesUser']);
    $routes->post('jobdes', [Users::class, 'jobdesUser']);
    $routes->get('edit-user/(:segment)', [Users::class, 'editUser']);
    $routes->post('simpan-akun/(:segment)', [Users::class, 'updateUserAction']);
    $routes->post('simpan-jobdes/(:segment)', [Users::class, 'updateJobdesAction']);
});

// Route Verificator, only user in group admin and verificator can access
$routes->group('verificator', ['filter' => 'group:verificator,admin'], function ($routes) {
    $routes->get('/', [Verificator::class, 'index']);
    $routes->get('periksa-catatan/(:segment)', [Verificator::class, 'periksaCatatan']);
    $routes->post('periksa-catatan', [Verificator::class, 'periksaCatatan']);
});

// Route Anggota, only user in group anggota can access
$routes->group('anggota', ['filter' => 'group:anggota'], function ($routes) {
    $routes->get('/', [Anggota::class, 'index']);
    $routes->post('upload-image-article', [Anggota::class, 'uploadImgArticle']);
    $routes->post('delete-image-article', [Anggota::class, 'deleteImgArticle']);
    $routes->get('tambah-catatan-baru', [Anggota::class, 'addNewCatatan']);
    $routes->post('tambah-catatan-baru', [Anggota::class, 'addNewCatatan']);
    $routes->get('detail-catatan/(:segment)', [Anggota::class, 'detailCatatan']);
    $routes->get('edit-catatan/(:segment)', [Anggota::class, 'editCatatan']);
    $routes->post('edit-catatan/(:segment)', [Anggota::class, 'editCatatan']);
});

// Route Profil Page, all gorup of user can access
$routes->group('profil', function ($routes) {
    $routes->get('/', [Profil::class, 'index']);
    $routes->get('edit-akun', [Profil::class, 'editAkun']);
    $routes->post('edit-akun', [Profil::class, 'editAkun']);
    $routes->get('edit-pribadi', [Profil::class, 'editDetailAkun']);
    $routes->post('edit-pribadi', [Profil::class, 'editDetailAkun']);
    $routes->get('tambah-informasi-pribadi', [Profil::class, 'addDetailAkun']);
    $routes->post('tambah-informasi-pribadi', [Profil::class, 'addDetailAkun']);
});

service('auth')->routes($routes);
