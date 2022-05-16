<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $tracks = $user->tracks;
        return view('profile',
            [
                'user' => $user,
                'tracks' => $tracks,
            ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
