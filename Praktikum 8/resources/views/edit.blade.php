<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .mx-auto{
            margin-top:30px;
            width:800px;
        }
        .card {
            margin-top:10px;
        }
    </style>
</head>
<body>
<div class="mx-auto">
<div class="card">
  <div class="card-header bg-warning text-light" >
    Created / Edit Data
  </div>
  <div class="card-body">
    
    <form action="/edit/{{ $data->id }}" method="POST">  

    @csrf

    <div class="mb-3 row">
    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nim" name="nim" value="{{ $data->Nim }}">
      </div>
  </div>
      
    <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->Nama }}" >
      </div>
  </div>

      <div class="mb-3 row">
      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->Alamat }}" >
        </div>
  </div>

        <div class="mb-3 row">
        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
        <div class="col-sm-10">
            <select class="form-control" id="fakultas" name="fakultas">
                <option value="{{ $data->Fakultas }}"> {{ $data->Fakultas }} </option>
                <option value="saintek" >Saintek</option>
                <option value="Soshum" >Soshum</option>
            </select>
        </div>
  </div>
        <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-success">

        </div>
</form>
  </div>
</div>