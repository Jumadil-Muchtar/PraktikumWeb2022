<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Data Mahasiswa </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container{
            width: 100%;
        }
        .button{
           margin-left: 127px;
           padding-top: 10px;
           padding-bottom: 10px;
        }
        .card {
            padding-top: 10px;
        }
        .page{
            text-align: center;
        }
    </style>
</head>
<body>
    
    <div class="button">
        <a href="/tambahmahasiswa"> <button type="button" class="btn-success"> Tambah Data + </button> </a>
    </div>
    <div class="container">
        <div class="card-header text-white bg-secondary">
            Data Mahasiswa
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $id = 1;
                @endphp
                @foreach ($data as $row)
                <tr>
                    <th scope="row">{{ $id++ }}</th>
                    <td> {{ $row->Nim }} </td>
                    <td> {{ $row->Nama }} </td>
                    <td> {{ $row->Alamat }} </td>
                    <td> {{ $row->Fakultas }} </td>
                    <td>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->Nama }}"> Delete </button>
                        <a href="/tampilkandata/{{ $row->id }}"> <button type="button" class="btn-warning"> Edit </button> </a>
                    </td>
                </tr> 
                @endforeach
                   
                </tbody>
            </table>
        </div>
</div> 

  {{ $data->links() }}

<script>
    $('.delete').click(function () 
    {
        var mahasiswaid = $(this).attr('data-id');
        var Namaid = $(this).attr('data-nama');
        swal({
            title: "Apakah Kamu Yakin?",
            text: "Kamu akan menghapus data mahasiwa dengan Nama "+Namaid+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletedata/"+mahasiswaid+""
                    swal("Data berhasil dihapus", {
                    icon: "success",
                    });
                } else {
                    swal("Data tidak akan dihapus?");
                }
            });
    });
    
</script>

<script>
    toastr.success('Have fun storming the castle!', 'Miracle Max Says')
</script>

</body>
</html>