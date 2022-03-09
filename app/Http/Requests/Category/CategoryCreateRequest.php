<?php
namespace App\Http\Requests\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules( )
    {
             return [
                'name'=>['required','unique:categories']
              ]; 
    }
    public function attributes()
    {
        return [
          'name'=>__('category.category'),
        ];
    }
}
