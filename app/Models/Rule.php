<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $fillable=['total_payment',"command_id"];
    public  function command(){
        $this->belongsTo(Command::class);
    }
}
