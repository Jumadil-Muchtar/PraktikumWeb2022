<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function insert(Request $request)
    {
        $cek = User::find($request->email);
        if($cek){  
            return redirect('/admin')->with('error','Buat akun gagal!');;            
        } else {
            $new = new User;
            $new->nama = $request->nama;
            $new->email = $request->email;
            $new->username = $request->username;
            $new->password = bcrypt($request->password);
            $new->role = $request->role;
            $new->save();
            return redirect('/admin')->with('success','Akun berhasil dibuat!');;
        }
    }
}
