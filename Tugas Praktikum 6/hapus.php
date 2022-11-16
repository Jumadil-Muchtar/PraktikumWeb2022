<?php 
include 'connectdb.php';
$nim = $_GET['id'];
mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim'") or die(mysqli_error($conn));
header("location:index.php?pesan=hapus");
?>