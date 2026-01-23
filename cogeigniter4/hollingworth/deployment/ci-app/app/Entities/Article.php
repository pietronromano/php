<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/*
    NOTE: orginally got this error:
    TypeError
    mysqli_result::fetch_object(): Argument #1 ($class) must be a valid class name, App\Entities\Article given

    -> this file was called Articles.php (plural) instead of Article.php (singular)

*/

// Article entity class extending CodeIgniter's base Entity class, creates attributes dynamically
// Entites are used in the Repository pattern to represent a single record from a database table
// They have no knowledge of the database itself, just the data they hold - the Model handles database interactions
class Article extends Entity
{
 
}