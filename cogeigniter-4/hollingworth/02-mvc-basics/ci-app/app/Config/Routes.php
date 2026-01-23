<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//New route for the Articles controller (can omit the leading slash)
$routes->get('/articles', 'Articles::index');
