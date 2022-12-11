<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data = Student::all();
        return view('datamahasiswa', ["data" => $data]);
    }

    public function store(request $request) {
        $nim = $request->nim;
        $nama= $request->nama;
        $alamat= $request->alamat;
        $fakultas= $request->fakultas;

        Student::create(["Nim"=> $nim, "Nama"=> $nama, "Alamat"=> $alamat, "Fakultas"=> $fakultas]);
        return redirect("/");

    }

    public function edit($id){
        $data = Student::where("id", $id)->get();
        $data = $data[0];

        return view("edit", ["data" => $data]);
    }

    public function update(Request $request, $id) {

        $nim = $request->nim;
        $nama= $request->nama;
        $alamat= $request->alamat;
        $fakultas= $request->fakultas;

        Student::where("id", $id)->update(["Nim" => $nim, "Nama" => $nama, "Alamat" => $alamat, "Fakultas" => $fakultas]);

        $data = Student::all();
        return redirect("/");

    }

    public function delete($id){
        Student::destroy($id);
        return redirect("/");
    }
}



