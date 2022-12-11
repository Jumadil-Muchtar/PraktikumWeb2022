<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Edit Data </title>
    <style>
        .container{
            width: 50%;
            padding-top: 10px;
        }
        .card {
            padding-top: 10px;
        }
    </style>
</head>
<body>
<form action="/updatedata/<?php echo e($data->id); ?>" method="post">
        <?php echo csrf_field(); ?>
    <div class="container">
        <div class="card-header text-white bg-secondary">
            Edit Data
        </div>
        <div class="mb-3 row">
            <label for="Nim" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Nim" value="<?php echo e($data->Nim); ?>" name="Nim">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Nama" value="<?php echo e($data->Nama); ?>" name="Nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Alamat" value="<?php echo e($data->Alamat); ?>" name="Alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Fakultas" class="col-sm-2 col-form-label">Fakultas</label>
            <div class="col-sm-10">
                <select class="form-control" name="Fakultas" id="Fakultas">
                    <option selected><?php echo e($data->Fakultas); ?></option>
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
    </div>
</form>
</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel1\resources\views/editdata.blade.php ENDPATH**/ ?>