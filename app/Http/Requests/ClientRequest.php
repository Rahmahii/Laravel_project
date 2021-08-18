<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          // 'email' => 'unique:clients,email,NULL,id,user_id,' .  auth()->user()->id,
          // 'phone' => 'unique:clients,phone,NULL,id,user_id,' .  auth()->user()->id,
          // 'user_id' => 'unique:clients,user_id,NULL,id,email,' . $request->email,
          'fname' => 'required',
          'lname' => 'required',
          'address'=>'nullable',
          'country_id' => 'required',
          'city_id' => 'required'
        ];
    }
}
