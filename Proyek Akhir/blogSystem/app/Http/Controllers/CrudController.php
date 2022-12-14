<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    // tampilkan data
    public function index(){
        return view('article');
    }

    // method untuk menampilkan tambah data
    public function create(){
        return view('layouts.cms.crudCreateData');
    }

    // method untuk insert data



    // method untuk edit data



    // method untuk dele data
}
