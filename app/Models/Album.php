<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'name',
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return 'storage/' . $this->image;
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
}
