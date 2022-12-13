<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class hapusDataMahasiswaController extends Controller
{
    public function hapusDataMahasiswa($NIM){
        $deleted = DB::table('mahasiswas')->where('NIM','=', $NIM)->delete();
        return redirect('index')->with('success', 'Data berhasil di hapus!');
    }
}
