<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Unless you are working with relational data, models in Laravel are fairly simple.
 * 
 * They would have a property called $table to define the database table which is associated with the model and an array called $fillable which would define which columns of the database table can be filled out by the user.
 */

class Artist extends Model
{
    protected $table = 'artists';

    protected $fillable = ['name', 'image', 'styles'];
}
