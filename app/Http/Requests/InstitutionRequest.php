<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionRequest extends FormRequest
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
           'name' => 'required|string|min:5|max:120',
           'phone' => 'required|numeric|digits_between:7,30',
           'email' => 'required|email|max:200',
        ];

    }

    public function attributes(){
        return [
            'name' => 'nombre',
            'phone' => 'telefono',
            'email' => 'correo',
        ];
    }
}
