<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //the view() function from the CodeIgniter framework loads a file from the Views folder
        //return view('welcome_message');
        //We delete this file in the Views/welcome_message.php 
        //Replace this with our own Views/Home/index.php file:

        /* 1st version: Concatenate multiple views together. Send title variable to header view
        return  view('header', ['title' => 'Home'])
            . view('Home/index');
        */

        // 2nd version: Home view now extending the layout view, no longer need to concatenate views here
        return  view('Home/index');
    }
}
