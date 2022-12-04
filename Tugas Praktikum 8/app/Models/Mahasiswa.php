<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Mahasiswa extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $timestamps = false;
    public $incrementing = false;
    public $sort = [
        'nim', 'nama', 'alamat', 'fakultas'
    ];
}
