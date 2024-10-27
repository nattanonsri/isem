<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);


$routes->get('/', 'Home::index');
$routes->get('coord', 'Home::index');
$routes->post('check_search_user/', 'Home::check_search_user');

$routes->get('register', 'Profile_HomeController::register');
// $routes->post('register/add_user_admin/(:any)', 'Profile_HomeController::add_user_admin/$1');
$routes->match(['get', 'post'], 'check_duplicate', 'Profile_HomeController::check_duplicate');
$routes->match(['get', 'post'], 'login', 'Profile_HomeController::login');
$routes->get('logout', 'Profile_HomeController::logout');

$routes->group('profile', ['filter' => 'UserAuth'] , function ($routes) {
    $routes->get('/', 'Profile_HomeController::index');
    $routes->get('load_add_user/', 'Profile_HomeController::load_add_user');
    $routes->post('user_search/', 'Profile_HomeController::user_search');
    $routes->post('add_from_user/', 'Profile_HomeController::add_from_user');
    $routes->get('load_edit_form_user/(:any)', 'Profile_HomeController::load_edit_form_user/$1');
    $routes->post('edit_form_user/(:any)', 'Profile_HomeController::edit_form_user/$1');
    $routes->delete('delete_form_user/(:any)', 'Profile_HomeController::delete_form_user/$1');

    $routes->get('detail_all_user/(:any)', 'Profile_HomeController::detail_all_user/$1');
    $routes->get('profile_details/(:any)', 'Profile_HomeController::profile_details/$1');
    $routes->post('update_admin_profile/(:any)', 'Profile_HomeController::update_admin_profile/$1');
});

$routes->get('backend/login', 'BackendController::load_login');
$routes->get('backend/register', 'BackendController::load_register');
$routes->post('backend/add_admin/(:any)', 'BackendController/add_admin/$1');
$routes->post('backend/login_admin', 'BackendController::login_admin');
$routes->post('backend/checked_admin/(:any)', 'BackendController/checked_login/$1');
$routes->get('backend/logout', 'BackendController::logout');

$routes->group('backend', ['filter' => 'AdminAuth'], function ($routes) {
    $routes->get('/', 'BackendController::index');
    $routes->post('load_content_dash/', 'BackendController::load_content_dash');
    $routes->post('load_content_officer/', 'BackendController::load_content_officer');
    $routes->post('load_content_users/', 'BackendController::load_content_users');
    $routes->post('load_content_administrator/', 'BackendController::load_content_administrator');
    $routes->post('load_content_maps/', 'BackendController::load_content_maps');
    $routes->post('add_user_admin/(:any)', 'BackendController::add_user_admin/$1');
    $routes->post('openEditOfficerModal/', 'BackendController::openEditOfficerModal');
    $routes->post('openEditUsersModal/', 'BackendController::openEditUsersModal');
    
    $routes->delete('delete_profile_admin/(:any)', 'BackendController::delete_profile_admin/$1');
});