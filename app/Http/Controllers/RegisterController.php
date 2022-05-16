<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('login.index');
    }
}
