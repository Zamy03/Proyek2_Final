<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\ProfileController;

/**
 * @var RouteCollection $routes
 * 
 */



// app/Config/Routes.php


// $routes->get('register', 'Home::register');
// $routes->setDefaultController('Home');

$routes->get('/', 'Home::index');
$routes->get('katalog', 'Katalog::index');
$routes->get('about', 'Home::about');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('profile', 'Profile::index');
$routes->get('signup', 'Home::register');
$routes->get('beli/(:num)', 'Beli_katalog::index/$1');
$routes->get('transaksi', 'Transaksi_katalog::index');
$routes->get('barang_keluar', 'Keluar::index');
$routes->get('barang_masuk', 'Masuk::index');


$routes->group(
    'profile',
    ['filter' => 'auth'],
    function ($routes) {
        $routes->get('/', 'ProfileController::index', ['as' => 'profile']);
    }
);

$routes->group('beli_katalog', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('/orderPakaian', 'Beli_katalog::orderPakaian');
});

$routes->group('inventory', function ($routes) {
    $routes->get('/', 'Inventory::index'); // Menggunakan 'Masuk' bukan 'stok_in'
    $routes->get('index', 'Inventory::index'); // Menggunakan 'Masuk' bukan 'stok_in'

    $routes->get('insert', 'Inventory::insert'); // Menggunakan 'Masuk' bukan 'stok_in'
    $routes->post('insert', 'Inventory::insert'); // Menggunakan 'Masuk' bukan 'stok_in'

    // Update
    $routes->get('update/(:num)', 'Inventory::update/$1'); // Menggunakan 'Masuk' bukan 'stok_in'
    $routes->post('update/(:num)', 'Inventory::update/$1'); // Menggunakan 'Masuk' bukan 'stok_in'

    // Delete
    $routes->get('delete/(:num)', 'Inventory::delete/$1');
});

$routes->get('update-status', 'Keluar::updateStatus');
$routes->post('update-status', 'Keluar::updateStatus');

// $routes->group('pesanan', function ($routes) {
//     $routes->get('/pesanan', 'Pesanan::index');
// });
// $routes->group('beli', function ($routes) {
//     $routes->get('/', 'Beli_katalog::index');
//     $routes->get('index/(:num)', 'Beli_katalog::index/$1'); // Menangani parameter ID pakaian
// });

$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->get('profile', 'ProfileController::index', ['as' => 'profile']);
    $routes->get('settings', 'UserController::settings');
    $routes->get('activity-log', 'UserController::activityLog');
    $routes->get('logout', 'UserController::logout');
});


// $routes->add('Admin', 'Admin::index', ['filter' => 'role:admin']);
