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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $rules = [
         
          'fname' => 'required',
          'lname' => 'required',
          'address'=>'nullable',
          'country_id' => 'required',
          'city_id' => 'required'
        ];
        if ($this->getMethod() == 'POST') {
          $rules += [ 'email' => 'unique:clients,email,NULL,id,user_id,' .  auth()->user()->id,
          'phone' => 'unique:clients,phone,NULL,id,user_id,' .  auth()->user()->id,
          'user_id' => 'unique:clients,user_id,NULL,id,email,' . $this->request->get('email'),
          'unique:clients,user_id,NULL,id,phone,' . $this->request->get('phone')];
        }elseif ($this->getMethod() == 'PUT') {
          $rules += [ 'email' => 'unique:clients,email,NULL,id,user_id,' .  $this->user,
          'phone' => 'unique:clients,phone,NULL,id,user_id,' .  $this->user,
          'user_id' => 'unique:clients,user_id,NULL,id,email,' . $this->email
          ,'unique:clients,user_id,NULL,id,phone,' . $this->phone
        ];
          
        }
        return $rules;
    }
}
