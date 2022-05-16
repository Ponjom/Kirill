<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;

class HomeController extends Controller
{
    public function __invoke()
    {
        $albums = Album::all();
        $tracks = Track::all();
        $randomTrack = empty($tracks) ? $tracks->random() : null;
        return view('index',
        [
            'albums' => $albums,
            'randomTrack' => $randomTrack,
        ]);
    }
}
