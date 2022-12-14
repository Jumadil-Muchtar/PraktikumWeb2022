<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum_pemrograman_web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$data = [];
if (!empty($_POST)) {
  $order = $_POST["order"];
  $sql = "SELECT * FROM mahasiswa ORDER BY $order";
} else {
  $sql = "SELECT * FROM mahasiswa";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($data, $row);
  }
}
$dataJson = json_encode($data);
print_r($dataJson);

$conn->close();
?>