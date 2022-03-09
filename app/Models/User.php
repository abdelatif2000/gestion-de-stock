<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        "type_id",
        "isDeleted"
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function type(){
       return  $this->belongsTo(Type::class);
    }
    public function accesses(){
        return  $this->hasMany(Access::class);
     }
    

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
