<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Seller;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'seller_id', 'category_id', 'price', 'status']; 

    public function category()
    {
        $this->hasOne(Category::class);
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
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

