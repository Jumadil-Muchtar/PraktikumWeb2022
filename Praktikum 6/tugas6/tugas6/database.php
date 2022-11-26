<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konek database</title>
</head>
<body>
<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "dblab", 3308);
    $database = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

    $arrDatabase= [];
    while($simpanData= mysqli_fetch_assoc($database)) $arrDatabase[]= $simpanData;


</body>
</html>