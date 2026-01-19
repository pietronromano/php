<?php

namespace App\Controllers;

//Our own Articles controller
class Articles extends BaseController
{
    public function index()
    {
        /*
         Load the Articles/index.php view file
         NOTE: this will give a 404 until we add:
            1. The Articles controller (this file)
            2. The Views/Articles/index.php view file
            2. The route in Config/Routes.php: $routes->get('/articles', 'Articles::index');
        */

        // header is included in the  view: <?=  $this->include("header")
        // Pass title variable to view, otherwise get an error: "Undefined variable $title 
        return view('Articles/index', ['title' => 'Articles']);
    }
}
