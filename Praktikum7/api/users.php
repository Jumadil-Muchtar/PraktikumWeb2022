<?php 

class Authentication {
  public $email;
  public $pass;

  function arrCon(string $sql, mysqli $conn) {
    $arr = [];
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
    }
    return $arr;
  }

  function login(mysqli $conn) {
    $this->email = $_POST['email'];
    $this->pass = $_POST['password'];
    $sql = "SELECT email FROM users WHERE email LIKE '$this->email'";
    $data = $this->arrCon($sql, $conn);

    $sql = "SELECT `rank` FROM users WHERE email LIKE '$this->email'";
    $ranks = $this->arrCon($sql, $conn);
    if($data[0]['email'] == $this->email) {
      $sql = "SELECT pass FROM users WHERE email LIKE '$this->email'";
      // $result = $conn->query($sql);
      $data = $this->arrCon($sql, $conn);
      if($data[0]['pass'] == $this->pass) {
          session_start();
          $_SESSION['users'] = $ranks[0]['rank'];
          echo 'success';
      }
    }
  }
  function register(mysqli $conn) {
    $this->email = $_POST['email'];
    $this->pass = $_POST['password'];

    $sql = "SELECT email FROM users WHERE email LIKE '$this->email'";
    $data = $this->arrCon($sql, $conn);
    if (!isset($data[0]['email'])) {
      $data[0]['email'] = 'anti error';
    }
    if ($data[0]['email'] == $this->email) {
      echo 'Email Sudah Terdaftar';
    } else {
      $sql = "INSERT INTO `users`(`id`, `email`, `pass`) VALUES ('','$this->email','$this->pass')";
      $data = $this->arrCon($sql, $conn);
    }

  }
}
$auth = new Authentication();
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


?>