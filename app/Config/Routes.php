<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User\\HomeController::index');
$routes->get('/about', 'User\\HomeController::aboutMe');
// $routes->get('/', 'Home::index');
$routes->get('product', 'ProductController::index');
$routes->get('/cart', 'CartController::index');
$routes->post('/order/confirmation', 'PenjualanController::index');
$routes->post('/order/save', 'PenjualanController::saving_order');
$routes->get('/cart/form', 'CartController::show_form_checkout');
$routes->get('/cart/beli/(:num)', 'CartController::beli/$1');
$routes->get('/cart/remove/(:num)', 'CartController::remove/$1');
$routes->post('/cart/update', 'CartController::update');

$routes->get('/admin', 'Admin\\AdminAuthController::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
