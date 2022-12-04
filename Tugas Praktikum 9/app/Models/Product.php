<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // Accessors
    protected function getCreatedAtAttribute()
    {
        return date('D/M/Y', $this->attributes['created_at']);
    }

    protected function getUpdatedAtAttribute()
    {
        return date('D/M/Y', $this->attributes['updated_at']);
    }

    // Mutator
    protected function setNameAttribbute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    
    // Relationship
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
