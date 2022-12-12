<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Form Mahasiswa </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card1 {
            margin-top: 10px;
        }
        .card2 {
            margin-top: 10px;
            width: 800px;
            margin-left: 280px;
        }
    </style>
</head>

<body>
        
    <div class="mx-auto">
    <!-- untuk memasukkan data -->
    <div class="card1">
        <div class="card-header">
            Create / Edit Data
        </div>
    <form action="/insertdata" method="post">
        <?php echo csrf_field(); ?>
                <div class="mb-3 row">
                    <label for="Nim" class="col-sm-2 col-form-label">Nim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nim" name="Nim">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nama" name="Nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Alamat" name="Alamat">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="Fakultas" id="Fakultas">
                            <option value="">- Pilih Fakultas -</option>
                            <option value="Matematika dan Ilmu Pengetahuan Alam"> Mipa </option>
                            <option value="Teknik"> Teknik </option>
                            <option value="Kedokteran"> Kedokteran </option>
                            <option value="Keperawatan"> Keperawatan </option>
                            <option value="Ekonomi dan Bisnis" > Feb </option>
                            <option value="Ilmu Budaya"> Fib </option>
                            <option value="Hukum"> Hukum </option>
                        </select>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary"> Simpan Data </button>
    </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel1\resources\views/formmahasiswa.blade.php ENDPATH**/ ?>