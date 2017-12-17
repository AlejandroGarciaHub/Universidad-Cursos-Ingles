<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserRequest extends FormRequest
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


      $user = User::find($this->user);

      if (isset($this->user)) {
        # code...
        return [
            //
            'username'=>[
              'min:4',
              'max:30',
              'required',
            ],
            'email'=>[
              'min:8',
              'max:30',
              'required',
              'unique:users,email,'.$user->id,
              ],
            'type'=>'required'
        ];
      }
      else{
        return [
            //
            'username'=>'min:4|max:30|required',
            'email'=>'min:8|max:30|required|unique:users',
            'password'=>'min:6|max:20|required',
            'type'=>'required',
        ];
      }



    }
}
