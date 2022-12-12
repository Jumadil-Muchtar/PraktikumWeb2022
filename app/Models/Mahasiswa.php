<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    // ini tidak membatasi data apa saja bisa dimasukkan ke database
    // kalau fillable ditentukan memang data apa saja yang hanya bisa dimasukkan
    // jadi di isi satu2
}
