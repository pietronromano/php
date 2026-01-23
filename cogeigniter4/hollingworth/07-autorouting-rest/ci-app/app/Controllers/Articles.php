<?php

namespace App\Controllers;
 
//Import the Article model
use App\Models\ArticleModel;
//Import the Article entity
use App\Entities\Article;

//Import PageNotFoundException for handling not found errors
use CodeIgniter\Exceptions\PageNotFoundException;

//Our own Articles controller
class Articles extends BaseController
{
    //Use property promotion to define the model, so we can use it in all methods 
    //and don't have to keep creating new instances
    private ArticleModel $model;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }

    //Helper method to get an article or throw a 404 error if not found
    private function getArticleOr404($id): Article
    {
        $article = $this->model->find($id);

        if ($article === null) {

            throw new PageNotFoundException("Article with id $id not found");

        }

        return $article;
    }


    // Method to display a list of all articles
    public function index()
    {

        $db = db_connect();

        //Fetch all articles from the "articles" table
        // Debugging tip: In the Browser: use the CodeIgniter Debugging toolbar to inspect queries
        $data = $this->model->findAll();

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

        $article = $this->getArticleOr404($id);

        return view("Articles/show", [
            "article" => $article
        ]);

    }

    // Now we use the Article entity to create a new article
    public function new()
    {
        return view("Articles/new", [
            "article" => new Article
        ]);
    }


     public function create()
    {
        //Create a new Article entity and fill it with the POST data
        $article = new Article($this->request->getPost());
        //Send the entity to the model to insert it into the database
        $id = $this->model->insert($article);

        //If insertion failed, redirect back with errors
        if ($id === false) {

          return redirect()->back()
                             ->with("errors", $this->model->errors())
                             ->withInput(); // repopulate form fields

        }

        
        return redirect()->to("articles/$id")
                         ->with("message", "Article saved.");
    }

    public function edit($id)
    {
        
        $article = $this->model->find($id);

        return view("Articles/edit", [
            "article" => $article
        ]);
    }

    public function update($id)
    {
        
        $article = $this->getArticleOr404($id);

        //Fill the entity with the new data from the form, easier than setting each property manually
        $article->fill($this->request->getPost());

        //Remove the _method property added by method spoofing, as this is not part of the entity allowed fields
        $article->__unset("_method");

        //Check if the article has actually changed, if not, redirect back with a message
        if ( ! $article->hasChanged()) {

            return redirect()->back()
                             ->with("message", "Nothing to update.");

        }

        //save the updated article, sending the entity to the model
        if ($this->model->save($article)) {

            return redirect()->to("articles/$id")
                             ->with("message", "Article updated.");

        }
        //If update failed, redirect back with errors
        return redirect()->back()
                         ->with("errors", $this->model->errors())
                         ->withInput();
    }

    public function confirmDelete($id)
    {
        $article = $this->getArticleOr404($id);

        return view("Articles/delete", [
            "article" => $article
        ]);
    }

    public function delete($id)
    {
        $article = $this->getArticleOr404($id);

        $this->model->delete($id);

        return redirect()->to("articles")
                            ->with("message", "Article deleted.");

    }
}
