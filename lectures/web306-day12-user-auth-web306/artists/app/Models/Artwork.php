<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Artist;
use App\Models\Gallery;
use App\Models\User;

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
     * The galleries that belong to the artwork.
     */
    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'artwork_gallery', 'artwork_id', 'gallery_id');
    }

    /**
     * Get the user that owns the artwork.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
