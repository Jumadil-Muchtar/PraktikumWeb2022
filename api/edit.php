<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prtk_06";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$name = $_POST["Name"];
$nim = $_POST["NIM"];
$address = $_POST["Address"];
$faculty = $_POST["Faculty"];
$activity = $_POST["Activity"];

$sql = "UPDATE Mahasiswa SET 'Name' = '$name', 'Address' = '$address', 'Faculty' = '$faculty', 'Activity' = '$activity' WHERE NIM = '$nim'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>