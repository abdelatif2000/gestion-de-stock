<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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
  
    public function rules(Request $request)
    {
            return [
                "name"=>['required',"unqiue:products"],
                "price"=>['nullable','numeric'],
                "category"=>["required"],
                "alert"=>["required"],
                "images.*"=>["mimes:jpg,png","max:2048"],
            ];
       
    }
}
