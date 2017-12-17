<?php

namespace App\Http\Requests;

use App\Generation;

use Illuminate\Foundation\Http\FormRequest;

class GenerationRequest extends FormRequest
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

      $generation = Generation::find($this->generation);

      if (isset($generation)) {
        # code...
        return [
            //
            'year'=>[
              'required',
              'digits:4',
              'unique:generations,year,'.$generation->id,
            ],
          ];
      }
      else{
        return [
            //
            'year'=>[
              'required',
              'digits:4',
              'unique:generations,year',
            ],
          ];
      }


    }
}
