const xmlhttp = new XMLHttpRequest();
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
            document.getElementById("failed").style.display = 'none';
            document.getElementById("success").style.display = 'inherit';
        } else {
            document.getElementById("success").style.display = 'none';
            document.getElementById("failed").style.display = 'inherit';
        }
    }, 500);
}
function urut(order) {
    $.ajax({
        type : "POST",  
        url  : "./api/api.php",  
        data : { order : order },
        success: function(res){  
                    var myObj = JSON.parse(res);
                    data_mahasiswa = ``;
                    for (let index = 0; index < myObj.length; index++) {
                            data_mahasiswa = data_mahasiswa + `
                        <tr>
                            <td>${index+1}</td>
                            <td class="nim">${myObj[index].nim}</td>
                            <td>${myObj[index].nim}</td>
                            <td>${myObj[index].alamat}</td>
                            <td>${myObj[index].fakultas}</td>
                            <td>
                            <button type="button" class="btn btn-warning" onclick="edit(${index+1})">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deleteData(${index+1})">Delete</button>
                            </td>
                        </tr>
                        `; 
                    }
                    document.getElementById("Mahasiswa").innerHTML = data_mahasiswa;
                }
    });         
}

function loadDoc(url, cFunction) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {cFunction(xhttp)}
    xhttp.open("GET", url);
    xhttp.send();    
}

function myFunction1(xhttp) {
  var myObj = JSON.parse(xhttp.responseText);
  console.log(myObj)
  data_mahasiswa = ``;
  for (let index = 0; index < myObj.length; index++) {
        data_mahasiswa = data_mahasiswa + `
      <tr>
        <td>${index+1}</td>
        <td>${myObj[index].Name}</td>
        <td class="nim">${myObj[index].NIM}</td>
        <td>${myObj[index].Address}</td>
        <td>${myObj[index].Faculty}</td>
        <td>${myObj[index].Activity}</td>
        <td>
        <button type="button" class="btn btn-warning" onclick="edit(${index+1})">Edit</button>
        <button type="button" class="btn btn-danger" onclick="deleteData(${index+1})">Delete</button>
        </td>
      </tr>
      `; 
  }
  document.getElementById("Mahasiswa").innerHTML = data_mahasiswa;
}
function edit(number) {
    number = (number*2) - 1
    for (let index = 0; index < 3; index++) {
        const element = document.getElementById("Mahasiswa").childNodes[number].childNodes[(index*2)+3].innerHTML;
        document.getElementsByTagName("input")[index].value = element
    }
    var fakultas = document.getElementById("Mahasiswa").childNodes[number].childNodes[9].innerHTML
    document.getElementsByTagName("select")[0].value = fakultas
    document.getElementsByTagName("input")[0].disabled = true;
    document.getElementById("addData").style.display = "none"
    document.getElementById("editData").style.display = 'inherit'
}
function editData() {
    var nim = document.getElementsByClassName("form-control")[0].value
    var nama = document.getElementsByClassName("form-control")[1].value
    var alamat = document.getElementsByClassName("form-control")[2].value
    var fakultas = document.getElementsByTagName("select")[0].value
    $.ajax({
        type : "POST",  
        url  : "./api/edit.php",  
        data : { nim : nim, nama : nama, alamat : alamat, fakultas : fakultas},
        success: function(res){  
                    loadDoc('./api/api.php', myFunction1)
                    document.getElementsByTagName("input")[0].disabled = false;
                    document.getElementById("addData").style.display = "inherit"
                    document.getElementById("editData").style.display = 'none'
                }
    });
}
function deleteData(number) {
    number = (number*2) - 1
    var nim = document.getElementById("Mahasiswa").childNodes[number].childNodes[3].innerHTML
    var nama = document.getElementById("Mahasiswa").childNodes[number].childNodes[5].innerHTML
    $.ajax({
        type : "POST",  
        url  : "./api/remove.php",  
        data : { nim : nim, nama : nama},
        success: function(res){  
                    loadDoc('./api/api.php', myFunction1)
                }
    });
}