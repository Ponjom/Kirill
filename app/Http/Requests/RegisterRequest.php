<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя обязательно',
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
