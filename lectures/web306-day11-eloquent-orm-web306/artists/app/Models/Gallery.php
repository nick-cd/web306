<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Artwork;

// Many-to-many relationship

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = ['title'];

    /**
     * The artworks that belong to the gallery.
     */
    public function artworks()
    {
        return $this->belongsToMany(Artwork::class, 'artwork_gallery', 'gallery_id', 'artwork_id');
    }
}
