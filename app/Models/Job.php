<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Arr;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory; // Use the HasFactory trait to enable factory methods for this model.

    protected $table = 'job_listings'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = ['employer_id', 'title', 'salary']; // Specify the fillable attributes, that can be mass assigned, rest attributes will be guarded.

    //instead of specifying fillable, we can specify gaurded fields, so the rest are by default fillable.
    //protected $gaurded = [];
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}