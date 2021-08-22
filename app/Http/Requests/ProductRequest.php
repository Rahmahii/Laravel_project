<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class   ProductRequest extends FormRequest
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
      'height' => 'required|numeric',
      'width' => 'required|numeric',
      'weight' => 'required|numeric',
      'depth' => 'required|numeric',
      'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
      'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
      'description' => 'nullable',
      'quantity' => 'numeric',
      'SKU' => 'regex:/^[A-Za-z]{2}\-\d{2}\-[A-Za-z]\d$/|nullable',
      'currency_id' => 'numeric|nullable ',
      'mass_id' => 'numeric ',
      'distance_id' => 'numeric ',
      'category_id' => 'numeric|nullable ',
      'name' => 'required'
    ];
    if ($this->getMethod() == 'POST') {
      $rules += [ 'name' => 'unique:products,name,NULL,id,user_id,' .  auth()->user()->id,
      'user_id' => 'unique:products,user_id,NULL,id,name,' . $this->request->get('name'),
      ];
    } elseif ($this->getMethod() == 'PUT') {
      $rules += [
        'name' => 'unique:clients,name,NULL,id,user_id,' .  $this->user,
        'user_id' => 'unique:clients,user_id,NULL,id,name,' . $this->name
      ];
    }
    return $rules;
  }
}
