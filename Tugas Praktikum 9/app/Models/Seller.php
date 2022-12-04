<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
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
    public function permissionseller()
    {
        return $this->hasMany(PermissionSeller::class);
    }
    // public function permission()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}
