<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Artist;
use App\Models\Gallery;

// One-to-many relationship

class Artwork extends Model
{
    protected $table = 'artworks';

    protected $fillable = ['title', 'image', 'statement'];

    /**
     * Get the artist that owns the artwork.
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Get the galleries that belong to the artwork.
     */
    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'artwork_gallery', 'artwork_id', 'gallery_id');
    }
}
