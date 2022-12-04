<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
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
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
