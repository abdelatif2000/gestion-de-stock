<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class categoryUpdateRequest extends FormRequest
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
    public function rules()
    {      
      // Rule::unique('users')->ignore($user->id),
              return [
                'name'=>['required',Rule::unique('categories','name')->ignore($this->id)]
              ]; 
      
    }
    public function attributes()
    {
        return [
          'name'=>__('public.product_name'),
        ];
    }
}
