<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable =[
          "product_id",
           "provider_id",
           "quantity",
           "isReturned", 
           "sold"
    ];
    public function product(){
      return  $this->belongsTo(Product::class);
    }
    public function provider(){
        return  $this->belongsTo(Provider::class,"provider_id",'id');
    }
}
