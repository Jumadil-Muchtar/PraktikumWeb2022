<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            margin : 0;
            padding: 0;
        }
        .container-fluid{
            font-size: 15px;
            size: 20px;
            font-family: monospace;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <title> STORE </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> STORE RANDOM  </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="/products">Products</a>
              <a class="nav-link" href="/categories">Categories</a>
              <a class="nav-link" href="/permissions">Permissions</a>
              <a class="nav-link" href="/sellers">Sellers</a>
              <a class="nav-link" href="/seller-permissions">Seller-Permissions</a>
            </div>
          </div>
        </div>
      </nav>
    <div class="container-fluid bg-dark">
        <?php echo $__env->yieldContent('container-content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/layouts/main.blade.php ENDPATH**/ ?>