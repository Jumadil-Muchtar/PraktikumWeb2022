<?php 
include 'functions.php';
$op = "";
if(!isset($_SESSION['users'])) { // kita lihat apakah nilai $_session['user'] ada kalau tidak ada maka kita redirect ke Location login (index.php)
  header("Location: login.php");
}
$crud = new crud();
if (isset($_GET['op'])) {
  $op = $_GET['op'];
  $id = $_GET['id'];
}

if (isset($op)) {
  if($op == 'delete') {
    $crud->deleteData($id, $conn);
  }
  if($op == 'edit') {
    $sql = "SELECT * FROM murid WHERE id = '$id'";
    $data = arrCon($sql, $conn);
    if (isset($_POST['submit-button'])) {
      $crud->submitButton($conn);
    }
  } else {
    if (isset($_POST['submit-button'])) {
      $crud->submitButton($conn);
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>TalkativeU. Data</title>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-warning" href="#">TALKATIVE.U</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Log out</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <br>
  <!-- FORM -->

  <form method="post" action="">
    <div class="mb-3 w-25 mx-auto">
      <label for="name1" class="form-label">Name</label>
      <input type="name" class="form-control" id="name1" name="nama" aria-describedby="nameHelp" Value="<?php echo $data[0]['nama'] ?? '' ?>">
      <div id="nametext" class="form-text">Please enter your name </div>
    </div>

    <div class="mb-3 w-25 mx-auto">
      <label for="class1" class="form-label">Class</label>
      <input type="class" class="form-control" id="class1" name="kelas" aria-describedby="classHelp" Value="<?php echo $data[0]['kelas'] ?? '' ?>">
      <div id="classtext" class="form-text">Please enter your class </div>
    </div>

    <div class="mb-3 w-25 mx-auto">
      <label for="address1" class="form-label">Address</label>
      <input type="address" class="form-control" id="address1" name="alamat" aria-describedby="addressHelp" Value="<?php echo $data[0]['alamat'] ?? '' ?>">
      <div id="addresstext" class="form-text">Please enter your address </div>
    </div>

    <select class="form-select mx-auto w-25" name="status" aria-label="Default select example" aria-placeholder="Status" Value="<?php echo $data[0]['status'] ?? '' ?>">
      <option value="Aktif">Active</option>
      <option value="Non-Aktif">Non-active</option>
    </select>
    <div id="addresstext" class="form-text mb-3 w-25 mx-auto">Please select Active or Non-Active </div>
    <br>
    <br>
    <div class="text-center">
      <button type="submit" class="btn btn-success w-25" name="submit-button">Submit</button>
    </div>
    <br>
    <br>
    <br>

  </form>

  <!-- Table -->

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Class</th>
        <th scope="col">Address</th>
        <th scope="col">Status</th>
        <th scope="col">Tools</th>
      </tr>
    </thead>
    <tbody>

    <?php 
    $crud->showData($conn);
    ?>

    </tbody>
  </table>

</body>

</html>