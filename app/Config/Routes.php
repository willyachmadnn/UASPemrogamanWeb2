<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/*Dashboard*/
$routes->get('home', 'Home::index');

/*Login&Logout*/
$routes->get('/', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->post('logout', 'Login::logout');