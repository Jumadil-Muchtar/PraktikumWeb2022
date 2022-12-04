<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    public function index_user()
    {   
        $mahasiswa = Mahasiswa::sortable()->paginate(25)->onEachSide(2);
        return view('index-user', compact(['mahasiswa']));
    }
    public function index_admin()
    {
        $mahasiswa = Mahasiswa::sortable()->paginate(25)->onEachSide(2);
        return view('index-admin', compact(['mahasiswa']));
    }

    public function insert(Request $request)
    {
        $cek = Mahasiswa::find($request->nim);
        if($cek){  
            return redirect('/admin')->with('error','Data duplikat, silahkan mengisi data dengan benar!');;            
        } else {
            $new = new Mahasiswa;
            $new->nim = $request->nim;
            $new->nama = $request->nama;
            $new->alamat = $request->alamat;
            $new->fakultas = $request->fakultas;
            $new->save();
            return redirect('/admin')->with('success','Data berhasil di-input!');;
        }
    }

    public function update(Request $request, $nim)
    {
        $update = Mahasiswa::find($nim);
        $update->nama = $request->namabaru;
        $update->alamat = $request->alamatbaru;
        $update->fakultas = $request->fakultasbaru;
        $update->save();
        return redirect('/admin')->with('success','Data berhasil di-update!');;
    }

    public function delete($nim)
    {
        Mahasiswa::find($nim)->delete();
        return redirect('/admin')->with('success','Data berhasil dihapus!');
    }
}
