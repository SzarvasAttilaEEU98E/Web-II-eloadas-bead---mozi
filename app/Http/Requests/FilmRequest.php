<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cim' => ['required', 'string', 'max:255'],
            'ev' => ['required', 'integer', 'between:1888,' . date('Y')],
            'hossz' => ['required', 'integer', 'between:1,600'],
        ];
    }

    public function messages(): array
    {
        return [
            'cim.required' => 'A film címének megadása kötelező.',
            'cim.max' => 'A film címe legfeljebb 255 karakter lehet.',

            'ev.required' => 'A megjelenési év megadása kötelező.',
            'ev.integer' => 'Az évszám csak egész szám lehet.',
            'ev.between' => 'Az évszám 1888 és az aktuális év között lehet.',

            'hossz.required' => 'A film hosszának megadása kötelező.',
            'hossz.integer' => 'A film hossza csak egész szám lehet.',
            'hossz.between' => 'A film hossza 1 és 600 perc között lehet.',
        ];
    }
}
