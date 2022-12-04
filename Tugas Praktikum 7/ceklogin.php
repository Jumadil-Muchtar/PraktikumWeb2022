<?php

// Cek login
if(!isset($_SESSION["login"])){
    header("location:login.php?pesan=logindulu");
    exit;
}

?>