<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view("header", ["title" => "Home"])
             . view("Home/index");
    }
}
