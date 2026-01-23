<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Route for the Articles controller (can omit the leading slash)
$routes->get('/articles', 'Articles::index');

//Route with a parameter for showing a single article by its ID
$routes->get("articles/(:num)", "Articles::show/$1");

//Route for displaying the form to create a new article
$routes->get("articles/new", "Articles::new");

$routes->post("articles/create", "Articles::create");
