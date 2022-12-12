<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prtk_06";
$port = 3307;

$conn = new mysqli ($servername, $username, $password, $dbname);

if( ! $conn){
	echo " <script> alert('Koneksi Gagal');</script> ";
}else{
  echo  " <script> alert('Koneksi Berhasil');</script> ";
}
$name = $_POST["name"];
$nim = $_POST["nim"];
$address = $_POST["address"];
$faculty = $_POST["faculty"];
$activity = $_POST["activity"];

$sql = "INSERT INTO `Mahasiswa`(`Name`, `NIM`, `Address`, `Faculty`, `Activity`) VALUES ('$name','$nim','$address','$faculty','$activity')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>