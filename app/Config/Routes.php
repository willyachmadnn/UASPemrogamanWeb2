<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('home', 'Home::index');
$routes->get('daftar', 'Daftar::index');
$routes->get('list', 'all::index');
$routes->get('riwayat', 'Riwayat::index');
$routes->get('laporan', 'Laporan::index');
/* Login & Logout */
$routes->get('/', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->post('logout', 'Login::logout');

// Jika ada fitur CRUD (Create, Edit, Delete) bisa tambahkan seperti ini:
// $routes->get('daftar/create', 'Daftar::create');
// $routes->post('daftar/store', 'Daftar::store');
// $routes->get('daftar/edit/(:num)', 'Daftar::edit/$1');
// $routes->post('daftar/update/(:num)', 'Daftar::update/$1');
// $routes->get('daftar/delete/(:num)', 'Daftar::delete/$1');