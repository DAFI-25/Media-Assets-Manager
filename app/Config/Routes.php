<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// ==========================
// Public Routes
// ==========================

$routes->get('/', 'Dashboard::index');

$routes->get('login', 'Auth::login');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');



// ==========================
// Protected Routes
// ==========================

$routes->group('', ['filter' => 'auth'], function ($routes) {


    // ==========================
    // Dashboard
    // ==========================

    $routes->get(
        'dashboard',
        'Dashboard::index'
    );



    // ==========================
    // Categories
    // ==========================

    $routes->get(
        'categories',
        'CategoryController::index'
    );

    $routes->post(
        'categories/create',
        'CategoryController::create'
    );

    $routes->post(
        'categories/edit/(:num)',
        'CategoryController::edit/$1'
    );

    $routes->get(
        'categories/delete/(:num)',
        'CategoryController::delete/$1'
    );



    // ==========================
    // Media Assets
    // ==========================

    $routes->get(
        'media-assets',
        'AssetController::index'
    );

    $routes->get(
        'media-assets/create',
        'AssetController::create'
    );

    $routes->post(
        'media-assets/store',
        'AssetController::store'
    );

    $routes->get(
        'media-assets/view/(:num)',
        'AssetController::view/$1'
    );

    $routes->get(
        'media-assets/download/(:num)',
        'AssetController::download/$1'
    );

    $routes->get(
        'media-assets/edit/(:num)',
        'AssetController::edit/$1'
    );

    $routes->post(
        'media-assets/update/(:num)',
        'AssetController::update/$1'
    );

    $routes->get(
        'media-assets/delete/(:num)',
        'AssetController::delete/$1'
    );



    // ==========================
    // User Management
    // ==========================

    $routes->get(
        'users',
        'Users::index'
    );

    $routes->get(
        'users/create',
        'Users::create'
    );

    $routes->post(
        'users/store',
        'Users::store'
    );

    $routes->get(
        'users/edit/(:num)',
        'Users::edit/$1'
    );

    $routes->post(
        'users/update/(:num)',
        'Users::update/$1'
    );

    $routes->get(
        'users/delete/(:num)',
        'Users::delete/$1'
    );



    // ==========================
    // Activity Log
    // ==========================

    $routes->get(
        'activity-log',
        'ActivityLogs::index'
    );

    // ==========================
// Settings
// ==========================

$routes->get(
    'settings',
    'Settings::index'
);


});