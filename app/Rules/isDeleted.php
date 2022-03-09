<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class isDeleted implements Rule
{
    public function passes($attribute, $value)
    {
        $find=false;
        $categories=Category::where('isDeleted',1);
        foreach($categories as $category){
            if($categories->name==$value){
                $find=true;
            }
        }
        return $find==true ? true :false;
    }
    public function message()
    {
        return 'The validation error message.';
    }
}
