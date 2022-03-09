<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        "firstName","lastName","address",'tel','fix',"email","isDeleted","ICE","fullName"
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
  
}
