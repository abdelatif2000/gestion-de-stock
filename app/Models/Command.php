<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    protected $fillable = ["client_id", "ref",'isDeleted'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function products()
    {
        return $this->hasMany(product_command::class);
    }
    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}
