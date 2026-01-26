<?php

namespace Config;


// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//Route for the Articles controller (can omit the leading slash)
$routes->get('/articles', 'Articles::index');
 
//Route with a parameter for showing a single article by its ID
$routes->get("articles/(:num)", "Articles::show/$1");

//Use named routes for easier URL generation
$routes->get("articles/new", "Articles::new", ["as" => "new_article"]);

//Use RESTful routes for create, edit, update, delete: remove the verbs from the URLs (articles/create, articles/edit, etc)
$routes->post("articles", "Articles::create");

//TO make this restful, id must come first, so change to articles/(:num)/edit from articles/edit/(:num)
$routes->get("articles/(:num)/edit", "Articles::edit/$1");
//Update uses PUT or PATCH methods, but since browsers don't support these in forms, we use POST with method spoofing
$routes->patch("articles/(:num)", "Articles::update/$1");

//Get for the first page, post for the form submission
//NOTE: browsers don't support DELETE method in forms, so we either we use POST or CodeIgniter's method spoofing
//NOW using REST
$routes->delete("articles/(:num)", "Articles::delete/$1");
$routes->get("articles/(:num)/delete", "Articles::confirmDelete/$1");

//Auth routes for shield
service('auth')->routes($routes);

/* Alternative route definitions using a resource route (see downloades/app 7)
$routes->resource('articles', ['controller' => 'Articles']);

service('auth')->routes($routes);
This single line replaces all the above route definitions for the Articles controller,
as it automatically sets up the standard RESTful routes for the resource.

Additionally: we need to:
Add this non-standard method to the Articles controller for confirmDelete:
    $routes->get("articles/(:num)/delete", "Articles::confirmDelete/$1");

In Articles/index.php view, change the links to NOT use the named route for new_article:
    <a href="<?= url_to("Articles::new") ?>">New</a>

*/


/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
