<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'institution_id' => 'required|exists:institutions,id',
            'name' => 'required|string|min:3|max:100',
            'race_id' => 'required|exists:races,id',
            'birth'  => 'nullable|required|date_format:m/Y',
            'picture' => 'nullable|file|image|max:10240',
        ];
    
    }

    public function attributes(){
        return [
            'name' => 'nombre',
            'race' => 'raza',
            'birth' => 'fecha de nacimiento',
            'picture' => 'foto',
        ];
    }
}
