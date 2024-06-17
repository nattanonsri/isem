<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('member', 'Member::index');

$routes->match(['get', 'post'], 'member/create', 'Member::create');

$routes->match(['get', 'post'], 'member/edit/(:num)', 'Member::edit/$1');

$routes->match(['get'], 'member/delete/(:num)', 'Member::delete/$1');

$routes->match(['get', 'post'], 'register', 'Profile_HomeController::register');
$routes->match(['get', 'post'], 'check_duplicate', 'Profile_HomeController::check_duplicate');
$routes->match(['get', 'post'], 'login', 'Profile_HomeController::login');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('profile', 'Profile_HomeController::index');
    $routes->match(['get', 'post'], 'profile/create/', 'Profile_HomeController::create');
    $routes->match(['get', 'post'], 'profile/edit/(:num)', 'Profile_HomeController::edit/$1');
    $routes->delete('profile/delete/(:num)', 'Profile_HomeController::delete/$1');
});

$routes->get('logout', 'Profile_HomeController::logout');





