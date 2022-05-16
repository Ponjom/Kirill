<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Event;
use App\Models\Track;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $events = Event::all();
        $albums = Album::all();
        $tracks = Track::with('album')->get();
        return view('admin',
        [
            'users' => $users,
            'events' => $events,
            'albums' => $albums,
            'tracks' => $tracks,
        ]);
    }

    public function adminToggle(User $user)
    {
        if ($user->isAdmin) {
            $user->isAdmin = 0;
            $user->save();
        } else {
            $user->isAdmin = 1;
            $user->save();
        }
        return redirect()->back();
    }
}
