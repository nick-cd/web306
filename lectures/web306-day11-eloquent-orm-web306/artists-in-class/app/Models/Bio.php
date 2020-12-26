<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Artist;

// One-to-one relationship

class Bio extends Model
{
    protected $table = 'bios';

    protected $fillable = ['title', 'text'];

    /**
     * Get the artist that owns the bio.
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
