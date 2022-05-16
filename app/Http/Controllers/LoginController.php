<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('index');
        }
        session()->flash('email', 'Неправильный логин или пароль');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
