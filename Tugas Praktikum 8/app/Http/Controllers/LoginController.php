<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->role == 'admin'){
                return redirect()->intended('/admin')->with('nama',$user->nama);
            } elseif($user->role == 'mahasiswa'){
                return redirect()->intended('/user')->with('nama',$user->nama);
            }
        }
        return view('/login')->with('error','Silakan login terlebih dahulu!');
    }

    public function insert(Request $request)
    {
        $cek = User::find($request->email);
        if($cek){  
            return redirect('/login')->with('error','Buat akun gagal!');;            
        } else {
            $new = new User;
            $new->nama = $request->nama;
            $new->email = $request->email;
            $new->username = $request->username;
            $new->password = bcrypt($request->password);
            $new->role = $request->role;
            $new->save();
            return redirect('/login')->with('success','Akun berhasil dibuat!');;
        }
    }

    public function cek(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'Username belum diisi!',
            'password.required' => 'Password belum diisi!',
        ]

        );
        $kredensial = $request->only('username','password');
        if(Auth::attempt($kredensial)){
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect()->intended('/admin')->with('nama',$user->nama);
            } elseif($user->role == 'mahasiswa'){
                return redirect()->intended('/user')->with('nama',$user->nama);
            }
            return redirect()->intended('/login');
        }
        return back()->withErrors([
            'password' => 'Username atau password salah!',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
