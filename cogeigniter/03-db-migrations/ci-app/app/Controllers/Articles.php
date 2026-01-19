<?php

namespace App\Controllers;

//Import the Article model
use App\Models\ArticleModel;

//Our own Articles controller
class Articles extends BaseController
{
    public function index()
    {
        /*Simulate fetching data from a model
        $data = [
            ["title" => "One", "content" => "The first"],
            ["title" => "Two", "content" => "Some content"]
        ];
        */

        $db = db_connect();

        /* Example:
        List all user created tables in the database (create some tables to see results)
        $tables = $db->listTables();
        foreach ($tables as $table) {
            echo "table: " . $table . "<br>";
        }
        */

        //Fetch all articles from the "articles" table
        // Debugging tip: In the Browser: use the CodeIgniter Debugging toolbar to inspect queries
        $model = new ArticleModel();
        $data = $model->findAll();

        //Pass data to the view as the "articles" variable, this is how MVC works
        return view("Articles/index", [
            "articles" => $data
        ]);
       
    }
}
