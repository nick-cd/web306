<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Artsit;
use App\Models\Artwork;
use App\Models\Gallery;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get artists for the user.
     */
    public function artists()
    {
        return $this->hasMany(Artist::class);
    }

    /**
     * Get the artworks for the user.
     */
    public function artworks()
    {
        return $this->hasMany(Artworks::class);
    }

    /**
     * Get the galleries for the user.
     */
    public function galleries()
    {
        return $this->hasMany(Galleries::class);
    }
}
