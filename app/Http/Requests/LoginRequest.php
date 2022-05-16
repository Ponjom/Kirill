<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле почта обязательно',
            'email.email' => 'Это не является почтой',
            'password.required' => 'Поле пароль обязательно',
            'password.confirmed' => 'Повторный пароль не совпадает',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
