<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'image' => ['nullable', 'image'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
