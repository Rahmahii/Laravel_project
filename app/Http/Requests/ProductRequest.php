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
             'category_id'=> 'numeric|nullable ',
             'name'=>'required'
            //  'name' =>'required|unique:products,name,NULL,NULL,user_id,'.$this->request->get('user_id'),
            // 'user_id' => 'unique:products,user_id,NULL,NULL,name,'.$this->request->get('name')

        ];
        // if ($this->getMethod() == 'POST') {
        //     //  $rules += [ 'name' =>'required|unique:products,name,NULL,NULL,user_id,'.$this->request->get('user_id'),
        //     // 'user_id' => 'unique:products,user_id,NULL,NULL,name,'.$this->request->get('name')];

        // }
        // elseif ($this->getMethod() == 'PUT') {
        //    // $rules += [ 'name' => "required|max:255| unique:products,user_id,{$this->id}"];
        // }
    return $rules;
    }
}
