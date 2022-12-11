<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'description', 'status'];

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
