
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
    
    <form action="index.php" method="POST">  

    @csrf

    <div class="mb-3 row">
    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nim" name="nim" >
      </div>
  </div>
      
    <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" >
      </div>
  </div>

      <div class="mb-3 row">
      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="alamat" name="alamat" >
        </div>
  </div>

        <div class="mb-3 row">
        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
        <div class="col-sm-10">
            <select class="form-control" id="fakultas" name="fakultas">
                <option value=""> - Pilih Fakultas - </option>
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

<div class="card">
  <div class="card-header text-white bg-warning">
    Data Mahasiswa
  </div>
  <div class="card-body">
    <table class="table">
        <thead>
             <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Aksi</th>
             </tr>
             </thead>
             <tbody>

              @foreach($data as $item)
              <tr>
              <td></td>
              <td>{{ $item->Nim }}</td>
              <td>{{ $item->Nama }}</td>
              <td>{{ $item->Alamat }}</td>
              <td>{{ $item->Fakultas }}</td>
              <td>{{ $item->Aksi}}</td>
              <td>
              <a href="/edit/{{ $item->id }}" type="button" class="btn btn-outline-primary">Edit</a>
              <a href="/delete/{{$item->id }}" type="button" class="btn btn-outline-danger">Delete</a>
              </td>
              </tr>
              @endforeach
             </tbody>
    </table>

</div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>