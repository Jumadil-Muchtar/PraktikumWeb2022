<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function mahasiswa(Request $request)
    {
        // $data = Mahasiswa::all(); ini query builder
        
        // dd($data);
        // return view('datamahasiswa', [data : $data] ); 
        // menampilkan view disini
        return view('datamahasiswa',  [
            'data' => DB::table('mahasiswas')->paginate(25)
        ]);
        
        $page = $request->input('page');

    }
    public function tambahmahasiswa()
    {
        return view('formmahasiswa');
    }
    public function insertdata(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa')->with('success','Data berhasil disimpan');
    }
    public function tampilkandata($id)
    {
        $data = Mahasiswa::find($id);
        // dd($data);

        return view('editdata',compact('data'));
    }
    public function updatedata(Request $request, $id)
    {
        $data = Mahasiswa::find($id);
        $data->update($request->all());

        return redirect()->route('mahasiswa')->with('success','Data berhasil diupdate');
    }
    public function deletedata($id)
    {
        $data = Mahasiswa::find($id);
        $data->delete();

        return redirect()->route('mahasiswa')->with('success','Data berhasil dihapus');
    }
}
