<?php

session_start();

include 'ceklogin.php';

$_SESSION = [];
session_unset();
session_destroy();
header("location:login.php");

?>