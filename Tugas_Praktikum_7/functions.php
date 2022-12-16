<?php
include 'database.php';
session_start();
function arrCon(string $sql, mysqli $conn) { // mysqli result too Array
    $arr = [];
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
    }
    return $arr;

}

class Authentication {
    public $email;
    public $pass;  
    function login(mysqli $conn) {
      $this->email = $_POST['email'];
      $this->pass = $_POST['password'];
      $sql = "SELECT email FROM users WHERE email LIKE '$this->email'";
      $data = arrCon($sql, $conn); // mengambil data untuk dijadikan patokan apakah email ini ada ?

      if(isset($data[0])) { 
        $sql = "SELECT pass FROM users WHERE email LIKE '$this->email'"; 
        $data = arrCon($sql, $conn); // Mengambil data untuk nanti di cek apakah untuk email ini passwordnya sudah benar ?
        if($data[0]['pass'] == $this->pass) { // mengecek passwordnya bagaimana
            session_start(); // memulai session agar bisa masuk nanti ke crudTable.php
            $_SESSION['users'] = $this->email;
            print_r($_SESSION);
            echo 'success';
            header("Location: index.php"); // pergi atau rediricet ke crudTable kalau berhasil login
        } else {
            print_r($_SESSION);
        }
      }
    }
    function register(mysqli $conn) {
        $this->email = $_POST['email'];
        $this->pass = $_POST['password'];
    
        $sql = "SELECT email FROM users WHERE email LIKE '$this->email'";
        $data = arrCon($sql, $conn); // mengambil data untuk nanti di test apakah email sudah terdaftar atau tidak
        if (!$data) { // mengcek apakah nilai data yang dikembalikan ada kalau tidak ada maka kita ubah nilainya jadi test
            $data[0]['email'] = 'test'; // karna akan menghasilkan error jika nilainya null jadi kita set jadi test
        }

        if ($data[0]['email'] == $this->email) { // pengecekan akan error jika nilainya null
            echo 'Email Sudah Terdaftar';
        } else {
            $sql = "INSERT INTO `users` (`email`, `pass`) VALUES ('$this->email','$this->pass')";
            $conn->query($sql); // kalau berhasil maka kita akan masukkan ke dalam data dan pergi ke login (index.php)
            header("Location: login.php");
        }
    }
}

$auth = new Authentication(); // membuat authentication

class crud{
    function showData($conn)
    {
        $sql = "SELECT * FROM murid";
        $data = mysqli_query($conn, $sql);
        $num = 1;
        while ($record = mysqli_fetch_array($data)) {
            $id = $record['id'];
            echo
            "<tr>
            <th scope='row'>" . $num . "</th>
            <td>" . $record['nama'] . "</td>
            <td>" . $record['kelas'] . "</td>
            <td>" . $record['alamat'] . "</td>
            <td>" . $record['status'] . "</td>
            <td><a href='index.php?id=". $id ."&op=edit'><button type='button' class='btn btn-warning' name = 'edit'>Edit</button></a>
                <a href='index.php?id=". $id ."&op=delete'><button type='button' class='btn btn-danger' name = 'delete'>Delete</button></a>
            </td>
            </tr>";
            $num++;
        }
    }
    
    function submitButton($conn)
    {
        if (isset($_GET['op'])) {
            $op = $_GET['op'];
            $id = $_GET['id'];
        }
        $nama = $this->contentSet('nama');
        $kelas = $this->contentSet('kelas');
        $alamat = $this->contentSet('alamat');
        $status = $this->contentSet('status');
        if (isset($op)) {
            $sql = "UPDATE `murid` SET `nama`='$nama',`kelas`='$kelas',`alamat`='$alamat',`status`='$status' WHERE id = '$id'";
            $conn->query($sql);
            header("Location: index.php");
        } else {
            $sql = "INSERT INTO murid (`nama`, `kelas`, `alamat`, `status`) VALUES ('$nama', '$kelas', '$alamat', '$status')";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>Sukses</div>";
                unset($_POST['nama'], $_POST['kelas'], $_POST['alamat'], $_POST['status'], $_POST['submit-button']);
                $_POST['nama'] = '';
                $_POST['kelas'] = '';
                $_POST['alamat'] = '';
                $_POST['status'] = '';
            }
        }
    }
    
    function contentSet($content){
        
        if (!empty($_POST[$content])) {
            return $_POST[$content];
        } else {
            echo "<script>alert('ISI DULU FORM NYA!')</script>";
            // header('refresh:0; url=index.php');
            die;
        }
    }
    
    function deleteData($id, $conn)
    {
        if (mysqli_query($conn, "DELETE FROM murid WHERE id = $id")) {
            echo "<script>
                document.getElementsByClassName('confirm-delete')[0].style.display = 'none';
                document.getElementsByClassName('overlay')[0].style.display = 'none';
            </script>";
            echo "<div class='alert alert-success m-3' role='alert'>Successfully Deleted Data</div>";
            unset($_POST['delete'], $_POST['confirm-delete']);
        }
    }
    
    
    function editData($id, $conn){
        if(mysqli_query($conn, "UPDATE murid SET ")){
            
        }
    }
}

?>