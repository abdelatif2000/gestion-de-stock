<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_command extends Model
{
    use HasFactory;
    protected $table="product_command";
    protected $fillable=["command_id","product_id","quantity","price"];

    public function command(){
        return $this->belongsTo(Command::class);
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
