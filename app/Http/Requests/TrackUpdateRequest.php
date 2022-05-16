<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author' => ['required', 'string'],
            'name' => ['required', 'string'],
            'path' => ['nullable', 'mimes:mp3'],
            'album_id' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Имя автора обязательно',
            'name.required' => 'Наименование трека обязательно',
            'path.required' => 'Чтобы создать трек, выберите файл',
            'path.mimes' => 'Файл трека может быть только mp3',
            'album_id.required' => 'Выберите альбом трека',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
