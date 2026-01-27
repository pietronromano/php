<?php

namespace App\Controllers;

class Articles extends BaseController
{
    public function index()
    {
        $data = [
            ["title" => "One", "content" => "The first"],
            ["title" => "Two", "content" => "Some content"]
        ];

        return view("Articles/index", [
            "articles" => $data
        ]);
    }
}