<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function addUser(Request $request){
        $datas = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:register|email',
            'password' => 'required'

        ]);

        DB::table('register')->insert([
            'first_name' => $datas['first_name'],
            'last_name' => $datas['last_name'],
            'email' => $datas['email'],
            'password' => Crypt::encryptString ($datas['password'])
        ]);
        return view('layouts.cms.login');
    }
    public function loginUser(Request $request){
        $datas = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = DB::table('register')->where('email', $datas['email'])->first();
        if($user){
            if(Crypt::decryptString($user->password) == $datas['password']){
                $request->session()->put('user', $user);
                return redirect('/');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }else{
            return back()->with('fail', 'No account found for this email');
        }


    }
}

