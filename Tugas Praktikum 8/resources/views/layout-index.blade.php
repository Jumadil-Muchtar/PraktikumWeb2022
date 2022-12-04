<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Mahasiswa</title>
    <link rel="stylesheet" href="localstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Data Mahasiswa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @yield('tombol-daftar')
                    <li class="nav-item">
                        <form method="get" class="m-0" action="/logout">
                            <button type="submit" name="logout" class="nav-link btn btn-dark">Logout</button>
                        </form>
                    </li>
                </ul>
                </div>
                <div>
                    {{-- <a class="navbar-brand" href="#">Halo, Pengguna!</a> --}}
                    <a class="navbar-brand" href="#">Halo, {{Auth::user()->nama}}!</a>
                </div>
            </div>
        </nav>
    </div>
    @yield('container-input')
    <div class="container py-3">
        <div class="card">
            <div class="card-header text-center">
                <b>Data Mahasiswa</b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="mahasiswa" class="table table-bordered">
                        @yield('tabel')
                    </table>
                    {!! $mahasiswa->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>