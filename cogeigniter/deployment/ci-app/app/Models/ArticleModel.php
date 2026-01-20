<?php

namespace App\Models;

use CodeIgniter\Model;

// Model for the "article" table, extending CodeIgniter's base Model class
class ArticleModel extends Model
{
    protected $table = "article";

    protected $allowedFields = ["title", "content"];

    // Specify the return type as the Article entity: note the full namespace, NOT surrounded by quotes
    protected $returnType = \App\Entities\Article::class;

    // Validation rules for the model
    protected $validationRules = [
        "title" => "required|max_length[128]",
        "content" => "required"
    ];

    // Custom validation messages
    protected $validationMessages = [
        "title" => [
            "required" => "Please enter a title",
            "max_length" => "{param} maximum characters for the {field}"
        ]
    ];
}