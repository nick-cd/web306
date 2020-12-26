<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'planet_type', 'distance_from_sun', 'avg_temp', 'image', 'img_type'];
}
