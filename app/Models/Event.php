<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'place',
        'url',
        'date',
        'description',
        'image',
    ];

    public function getImageUrlAttribute($image)
    {
        return 'storage/' . $image;
    }
}
