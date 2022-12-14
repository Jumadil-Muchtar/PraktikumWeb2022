<?php
require 'functions.php';

session_start();
// cek ada session login 
if (isset($_SESSION["login"])) {
  header("Location:index.php");
  exit;
}


if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      //set session
      $_SESSION["login"] = true;
      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}



?>



<!DOCTYPE html>
<html>

<head>
  <title>Halaman Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/71f23b0b94.js" crossorigin="anonymous"></script>
</head>
<style>
body {
  height: 100vmin;
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}

.title {
  width: 100vmax;
  text-align: center;
}
</style>

<body class="align-items-center">
  <div class="title">
    <h1>Profil</h1>
  </div>
  <?php if (isset($error)) { ?>
  <p style="color:red; text-align: center; font-size: 10px; ">Password atau username anda salah!</p>
  <?php } ?>
  </div>
  <div class="container text-left ">
    <div class="row d-flex justify-content-center">
      <div class="col-md-5">
        <form action="" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="username" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="password" required>
          </div>
          <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
        <div class="link">
          <a href="#">Already have an account?</a> or
          <a href="registrasi.php">sign up</a>
        </div>
      </div>
    </div>
  </div>






  <!-- 

  <div class="login">
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <div class="title">control</div>
          <?php if (isset($error)) { ?>
          <p style="color:red; text-align: center; font-size: 10px; ">Password atau username anda salah!</p>
          <?php } ?>
        </div>
        <form action="" method="post">

          <ul>
            <li class="username">
              <i class="fa-solid fa-user"></i>
              <input type="text" name="username" id="username" placeholder="username" required>
            </li>
            <li class="password">
              <i class="fa-solid fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="password" required>
            </li>
            <li>
              <button type="submit" class="button" name="login">Login</button>
            </li>
            <div class="link">
              <a href="#">Already have an account?</a> or
              <a href="registrasi.php">sign up</a>
            </div>
          </ul>


        </form>
      </div>
    </div>
  </div>
  </div> -->

</body>

</html>