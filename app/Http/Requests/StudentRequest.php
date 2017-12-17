<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Student;

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

      $student = Student::find($this->student);

      if (isset($student)) {
        return [
            //
            'nombres'=>'required|string|min:3|max:20|',
            'apellidos'=>'required|string|min:3|max:20|',
            'numero_control'=>'required|digits:8|unique:students,numero_control,'.$student->id,
            'generacion_id'=>'required',
            'carrera_id'=>'required'
        ];
      }
      else{
        return [
            //
            'nombres'=>'required|string|min:3|max:20|',
            'apellidos'=>'required|string|min:3|max:20|',
//            'numero_control'=>'required|digits:8|unique:students,numero_control,'.$student->id,
        ];
      }


    }
}
