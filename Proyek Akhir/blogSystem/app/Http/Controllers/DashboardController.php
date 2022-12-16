<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // untuk mengecek apakah user sudah login atau belum
        if(!session()->has('user')){
            return redirect('/login');
        }

        return view('index');

    }
}
