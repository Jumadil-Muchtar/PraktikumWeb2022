<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionSeller extends Model
{
    use HasFactory;

    protected $table = 'permissionseller';

    // Accessors
    protected function getCreatedAtAttribute()
    {
        return date('D/M/Y', $this->attributes['created_at']);
    }

    protected function getUpdatedAtAttribute()
    {
        return date('D/M/Y', $this->attributes['updated_at']);
    }

    // Relationship
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
