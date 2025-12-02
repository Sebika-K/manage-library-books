<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function() {
    return redirect()->to('/books');
});

$routes->group('books', function($routes) {
    $routes->get('/', 'BookController::index');
    $routes->get('create', 'BookController::create');
    $routes->post('store', 'BookController::store');
    $routes->get('edit/(:num)', 'BookController::edit/$1');
    $routes->post('update/(:num)', 'BookController::update/$1');
    $routes->get('delete/(:num)', 'BookController::delete/$1');
});

