<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'image' => ['required', 'image'],
            'date' => ['required', 'date'],
            'place' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'url' => ['required', 'url'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование ивента обязательно',
            'date.required' => 'Дата является обязательной',
            'date.date' => 'Поле не является датой',
            'image.required' => 'Изображение является обязательным',
            'image.image' => 'Файл не является изображением',
            'place.required' => 'Место проведения обязательно',
            'url.required' => 'Как же у вас купят билеты на мероприятие, если нет ссылки?',
            'url.url' => 'Введенный текст не является ссылкой',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
