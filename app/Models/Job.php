<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Arr;

class Job extends Model
{
    protected $table = 'job_listings'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = ['title', 'salary']; // Specify the fillable attributes, that can be mass assigned, rest attributes will be guarded.

    //since we extended the Model class, we can use the Eloquent ORM to interact with the database. so no need to have static methods.1
}