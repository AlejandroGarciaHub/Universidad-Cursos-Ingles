<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            //
            'nombres'=>'required|string|min:4|max:20|',
            'apellidos'=>'required|string|min:4|max:20|',
            'numero_control'=>'required|unique:students|digits:8',
            'generacion_id'=>'required',
            'carrera_id'=>'required'
        ];
    }
}
