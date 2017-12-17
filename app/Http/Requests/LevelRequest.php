<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Level;

class LevelRequest extends FormRequest
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

      $level = Level::find($this->level);

      if (isset($level)) {
        return [
            //
            'descripcion_nivel'=>'required|min:1|max:10|unique:levels,descripcion_nivel,'.$level->id,
        ];
      }
      else{
        return [
            //
            'descripcion_nivel'=>'required|unique:levels|min:1|max:10'
        ];
      }

    }
}
