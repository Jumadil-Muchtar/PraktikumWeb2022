<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ url('login/cek') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal"><b>Login</b></h1>
            <!-- Pesan -->
            <div>
                @include('message')
            </div>
            <!-- Pesan -->
            <div>
                <?php 
                    if(isset($_GET['pesan'])){
                        if ($_GET['pesan'] == 'logindulu') {
                            echo '<div class="alert alert-danger" role="alert">Silakan login terlebih dahulu</div>';
                        } elseif ($_GET['pesan'] == 'salah') {
                            echo '<div class="alert alert-danger" role="alert">Username atau password salah!</div>';
                        } elseif ($_GET['pesan'] == 'berhasilbuat') {
                            echo '<div class="alert alert-success" role="alert">Akun berhasil dibuat.</div>';
                        } elseif ($_GET['pesan'] == 'gagalbuat') {
                            echo '<div class="alert alert-danger" role="alert">Akun gagal dibuat.</div>';
                        } elseif ($_GET['pesan'] == 'bukanadmin') {
                            echo '<div class="alert alert-danger" role="alert">Tidak dapat membuat akun.</div>';
                        } 
                    } 
                ?>
            </div>
            <div class="form-floating">
                <input name="username" type="text" class="form-control
                @error('username')
                    is-invalid
                @enderror
                " id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control
                @error('password')
                    is-invalid
                @enderror" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Masuk</button>
            <p>Belum terdaftar? <a href="" data-bs-toggle="modal" data-bs-target="#modaldaftar">Daftar di sini!</a></p>
        </form>
    </main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>

<!-- Main Modal Register -->
<div class="modal fade" id="modaldaftar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('/login/add') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required minlength="8">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select id="role" name="role" class="form-select text-center" required>
                                <option selected disabled>- Pilih role -</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="register" class="btn btn-primary">Buat akun</button>
                </div>
            </form>
        </div>
    </div>
</div>