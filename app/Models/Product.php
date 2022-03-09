<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","category_id",'price','size','alert','isDeleted',"QR"
    ];
    public function photos(){
        return $this->hasMany(Photo::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function providers(){
        return $this->belongsToMany(Provider::class);
    }
    public function productCommands(){
        return $this->hasMany(product_command::class);
    }

}
