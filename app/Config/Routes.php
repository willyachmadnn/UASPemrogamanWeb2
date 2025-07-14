<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('home', 'Home::index');
$routes->get('/', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->post('logout', 'Login::logout');
$routes->get('daftar', 'Daftar::index');
$routes->get('daftar/create', 'Daftar::create');
$routes->post('daftar/store', 'Daftar::store');
$routes->get('daftar/edit/(:num)', 'Daftar::edit/$1');
$routes->post('daftar/update/(:num)', 'Daftar::update/$1');
$routes->get('daftar/delete/(:num)', 'Daftar::delete/$1');
$routes->post('daftar/hapusKategori', 'Daftar::hapusKategori');
$routes->get('kategori', 'Kategori::index');
$routes->post('kategori/store', 'Kategori::store');
$routes->get('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('kategori/update/(:num)', 'Kategori::update/$1');
$routes->get('kategori/delete/(:num)', 'Kategori::delete/$1');
$routes->get('laporan', 'Laporan::index');
$routes->get('list', 'All::index');

$routes->set404Override();