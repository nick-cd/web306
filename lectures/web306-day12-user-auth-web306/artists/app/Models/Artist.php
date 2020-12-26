<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bio;
use App\Models\Artwork;
use App\Models\User;

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

    /**
     * Get the user that owns the artist.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
