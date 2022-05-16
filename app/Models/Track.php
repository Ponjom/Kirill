<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'name',
        'author',
        'path',
        'album_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function isLiked()
    {
        if (auth()->user()->tracks->where('id', $this->id)->first()) {
            return true;
        }
        return false;
    }
}
