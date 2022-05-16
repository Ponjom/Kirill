<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'image' => ['required', 'image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование ивента обязательно',
            'image.required' => 'Изображение является обязательным',
            'image.image' => 'Файл не является изображением',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
