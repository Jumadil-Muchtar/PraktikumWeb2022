<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Edit Data </title>
</head>
<body>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Edit Data Anda </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/insertdata" method="post">
                <?php echo csrf_field(); ?>
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
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\tugas-laravel1\resources\views/edit.blade.php ENDPATH**/ ?>