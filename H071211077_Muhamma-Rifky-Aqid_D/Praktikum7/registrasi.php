<?php
require 'functions.php';
session_start();


// cek data berhasil di regis atau tidak k,kalau ya makan ganti display
if (isset($_POST["register"])) {

  if (registrasi($_POST) > 0) {
    $regisberhasil = "none";
    $berhasil = "block";
    $berhasil1 = "flex";
  } else {
    echo mysqli_error($conn);
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Halaman Registrasi</title>
  <script src="https://kit.fontawesome.com/71f23b0b94.js" crossorigin="anonymous"></script>
</head>

<body>
  <p>Selamat anda telah terdaftar,silahkan melakukan Sign in.
  </p>
  <a href="login.php"><button class="button">Sign in</button></a>
  </div>
  </div>

  <div class="registrasi" style="display: <?= $regisberhasil ?> ;">
    <div class="log5">
      <div class="logo"></div>
      <div class="title">control</div>
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
        <li class="password2">
          <i class="fa-sharp fa-solid fa-key"></i>
          <input type="password" name="password2" id="password2" placeholder="confrim password" required>
        </li>
        <li>
          <button type="submit" class="button" name="register">Sign Up</button>
        </li>
        <div class="link">
          <a href="#">Not have an account?</a> or
          <a href="login.php">sign in</a>
        </div>
      </ul>

    </form>
  </div>
</body>

</html>