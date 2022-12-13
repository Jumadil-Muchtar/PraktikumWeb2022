const xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", './api/database.php')
xmlhttp.send();
loadDoc('./api/api.php', myFunction1)


function refresh(url, cFunction){
    setTimeout(() => {
        var nim = document.getElementsByClassName("nim");
        var nimInput = document.getElementsByClassName("form-control")[0].value
        nimInput = nimInput.trim();
        var stop = true;
        for (let index = 0; index < nim.length; index++) {
            if(nim[index].innerHTML == nimInput || nimInput.length >= 11 || nimInput.length < 1) {
                stop = false;
                break;
            }
        }
        if (stop) {
            loadDoc(url, cFunction)
            document.getElementById("Alerts").innerHTML = `
            <div class="alert alert-success" role="alert">
            Success create a new data in database
            </div>`;
        } else {
            document.getElementById("Alerts").innerHTML = `
            <div class="alert alert-danger" role="alert">
            Failed to create new databases something wrong in the input
            </div>`;
        }
    }, 500);
}

function loadDoc(url, cFunction) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {cFunction(xhttp)}
    xhttp.open("GET", url);
    xhttp.send();    
}
function myFunction2(xhttp) {
    console.log(xhttp);
}

function urut(order) {
    // ---------------------------------------------------------------------------------- //
    var data = new FormData();
    data.append("order", order);
    // ---------------------------------------------------------------------------------- //
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {myFunction1(xhttp)}
    xhttp.open("POST", './api/api.php');
    xhttp.send(data); 
}

function myFunction1(xhttp) {
    if (xhttp.responseText == 'No Session') {
        window.location.replace('http://localhost/tugas_pemrograman_web/Praktikum7/login.html')
    }

  var myObj = JSON.parse(xhttp.responseText);
  data_mahasiswa = ``;
  
  for (let index = 0; index < myObj.length; index++) {
        data_mahasiswa = data_mahasiswa + `
      <tr>
        <td>${index+1}</td>
        <td class="nim">${myObj[index].nim}</td>
        <td>${myObj[index].nama}</td>
        <td>${myObj[index].alamat}</td>
        <td>${myObj[index].fakultas}</td>
        <td>
        <button type="button" class="btn btn-warning" onclick="edit(${index+1})">Edit</button>
        <button type="button" class="btn btn-danger" onclick="deleteData(${index+1})">Delete</button>
        </td>
      </tr>
      `; 
    }
    document.getElementById("mahasiswa").innerHTML = data_mahasiswa;
}

function edit(number) {
    number = (number*2) - 1
    for (let index = 0; index < 3; index++) {
        const element = document.getElementById("mahasiswa").childNodes[number].childNodes[(index*2)+3].innerHTML;
        document.getElementsByTagName("input")[index].value = element
    }
    var fakultas = document.getElementById("mahasiswa").childNodes[number].childNodes[9].innerHTML
    document.getElementsByTagName("select")[0].value = fakultas
    document.getElementsByTagName("input")[0].disabled = true;
    document.getElementById("addData").style.display = "none"
    document.getElementById("editData").style.display = 'inherit'
}

function editData() {
    var fc = document.getElementsByClassName("form-control");
    var nim = document.getElementsByClassName("form-control")[0].value
    var nama = document.getElementsByClassName("form-control")[1].value
    var alamat = document.getElementsByClassName("form-control")[2].value
    var fakultas = document.getElementsByTagName("select")[0].value
    // ---------------------------------------------------------------------------------- //
    var data = new FormData();
    data.append("nim", nim);
    data.append("nama", nama);
    data.append("alamat", alamat);
    data.append("fakultas", fakultas);
    // ---------------------------------------------------------------------------------- //
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        loadDoc('./api/api.php', myFunction1)
        document.getElementsByTagName("input")[0].disabled = false;
        document.getElementById("addData").style.display = "inherit"
        document.getElementById("editData").style.display = 'none'
        document.getElementById("Alerts").innerHTML = `
        <div class="alert alert-success" role="alert">
        Success edit data in database
        </div>`;
        
    }
    xhttp.open("POST", './api/edit.php');
    xhttp.send(data);
}

function deleteData(number) {
    if (confirm("Are you sure want to delete?")) {
        number = (number*2) - 1
        var nim = document.getElementById("mahasiswa").childNodes[number].childNodes[3].innerHTML
        var nama = document.getElementById("mahasiswa").childNodes[number].childNodes[5].innerHTML
        // ---------------------------------------------------------------------------------- //
        var data = new FormData();
        data.append("nim", nim);
        data.append("nama", nama);
        // ---------------------------------------------------------------------------------- //
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {loadDoc('./api/api.php', myFunction1)}
        xhttp.open("POST", './api/remove.php');
        xhttp.send(data);
    }
}

// Muflih Ahnaf