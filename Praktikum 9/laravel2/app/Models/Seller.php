<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'sellers';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'address', 'gender', 'no_hp', 'status'];

    public function products()
    { 
        return $this->hasMany(Product::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
}
