<?php


function myConnection()
{
    $servername = "localhost:8111";
    $database = "talkativeu_db";
    $username = "root";
    $password = "";

    //Create Connection
    global $conn;
    $conn = mysqli_connect($servername, $username, $password, $database);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

$conn;

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
        $nama = contentSet('nama');
        $kelas = contentSet('kelas');
        $alamat = contentSet('alamat');
        $status = contentSet('status');
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
