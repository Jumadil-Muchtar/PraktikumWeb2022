<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
<?php
         if ($_POST) {
            echo "NIM :", $_POST['NIM'],
            "<br/>";
            echo "Nama :", $_POST['Nama'];
            "<br/>";
            echo "Alamat :", $_POST['Alamat'];
            "<br/>";
            echo "Fakultas :", $_POST['fakultas'];   
        }
    ?>
</body>
</html>