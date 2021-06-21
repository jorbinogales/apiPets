<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'species_id' => 'required|exists:species,id',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'species_id' => 'especie',
        ];
    }
}
