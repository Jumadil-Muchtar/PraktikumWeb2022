<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
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
    // public function permissionseller()
    // {
    //     return $this->hasMany(PermissionSeller::class);
    // }
    // public function seller()
    // {
    //     return $this->belongsToMany(Seller::class);
    // }
}
