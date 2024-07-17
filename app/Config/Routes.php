<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->get('home/check_search_user/', 'Home::check_search_user');

$routes->get('/backend', 'backend::dashboard');

$routes->match(['get', 'post'], 'register', 'Profile_HomeController::register');
$routes->match(['get', 'post'], 'check_duplicate', 'Profile_HomeController::check_duplicate');
$routes->match(['get', 'post'], 'login', 'Profile_HomeController::login');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('profile', 'Profile_HomeController::index');
    $routes->get('profile/load_add_user/', 'Profile_HomeController::load_add_user');
    $routes->post('profile/user_search/', 'Profile_HomeController::user_search');
    $routes->post('profile/add_from_user/', 'Profile_HomeController::add_from_user');
    $routes->get('profile/load_edit_form_user/(:any)', 'Profile_HomeController::load_edit_form_user/$1');
    $routes->post('profile/edit_form_user/(:any)', 'Profile_HomeController::edit_form_user/$1');
    $routes->delete('profile/delete_form_user/(:any)', 'Profile_HomeController::delete_form_user/$1');
    
    $routes->get('profile/detail_all_user/(:any)', 'Profile_HomeController::detail_all_user/$1');
});

$routes->get('logout', 'Profile_HomeController::logout');




