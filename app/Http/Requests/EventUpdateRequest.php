<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'date' => ['required', 'date'],
            'place' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image'],
            'url' => ['required', 'url'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование ивента обязательно',
            'date.required' => 'Дата является обязательной',
            'date.date' => 'Поле не является датой',
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
