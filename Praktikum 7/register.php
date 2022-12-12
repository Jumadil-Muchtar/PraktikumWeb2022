<?php
session_start();
if (isset($_SESSION['email'])){
	header('Location: http://localhost/Praktikum7/index.php');
}
$host="localhost";
$user  ="root";
$pass  ="";
$db    ="db6";

$koneksi =mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die ("Tidak bisa terkoneksi ke database");
}

if($_POST){
    $nama = $_POST["nama"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
    $q1   = mysqli_query($koneksi,"insert into user (nama,email,password) values('$nama', '$email', '$pass')");
    // var_dump($q1);
    if (!$q1) {
        echo "gagal masukkan data";
    } else {
        header('Location: http://localhost/Praktikum7/login.php');
    }
    // try {
    // } catch (\Throwable $th) {
    // }
	// $data = $q1->fetch_assoc();

	// if($data["email"]) {
	// 	if($data["password"]==$pass){
	// 		$_SESSION["email"]=$data["email"];
	// 		header('Location: http://localhost/tugas7/index.php');
	// 	}
	// }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Document</title>
</head>
<body>
	<div class="limiter text-center">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
					</div>
	
					<form class="login100-form validate-form" action="" method="POST">
						<span class="login100-form-title">
							Member register
						</span>
	
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="email" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="text" name="nama" placeholder="Name">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

	
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit">
								Register
							</button>
						</div>
	
						<div class="text-center p-t-136">
							<a class="txt2" href="http://localhost/Praktikum7/login.php">
								Login
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	
</body>
</html>