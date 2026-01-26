<?php

namespace App\Controllers;
 
//Import the Article model
use App\Models\ArticleModel;

//Our own Articles controller
class Articles extends BaseController
{
    // Method to display a list of all articles
    public function index()
    {

        $db = db_connect();

        //Fetch all articles from the "articles" table
        // Debugging tip: In the Browser: use the CodeIgniter Debugging toolbar to inspect queries
        $model = new ArticleModel();
        $data = $model->findAll();

        //Pass data to the view as the "articles" variable, this is how MVC works
        return view("Articles/index", [
            "articles" => $data
        ]);
       
    }
 
    // Method to display a single article by its ID
    public function show($id)
    {
        //For now, just dump the ID to verify routing works
        //dd($id);

        $model = new ArticleModel;

        $article = $model->find($id);

        return view("Articles/show", [
            "article" => $article
        ]);

    }

    // Method to show the form for creating a new article
    public function new()
    {
        return view("Articles/new");
    }

     public function create()
    {
        $model = new ArticleModel;
        
        $model->insert($this->request->getPost());

        dd($model->insertID);
    }
}
