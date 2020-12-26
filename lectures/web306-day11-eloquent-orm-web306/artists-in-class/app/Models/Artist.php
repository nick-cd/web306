<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bio;

/**
 * Unless you are working with relational data, models in Laravel are fairly simple.
 * 
 * They would have a property called $table to define the database table which is associated with the model and an array called $fillable which would define which columns of the database table can be filled out by the user.
 */

class Artist extends Model
{
    protected $table = 'artists';

    protected $fillable = ['name', 'image', 'styles'];

    /**
     * Get the bio associated with the artist.
     */
    public function bio()
    {
        return $this->hasOne(Bio::class);
    }

    /**
     * Get the artworks for the artist.
     */
    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }
}
