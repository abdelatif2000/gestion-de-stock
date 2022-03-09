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
        return [
            "firstName"=>['required',"max:60"],
            "lastName"=>['required',"max:60"],
            "email"=>["email","required" ,"max:200"],
            "address"=>["required" ,"max:250"],
            "tel"=>["required"],
        ];
    }
}
