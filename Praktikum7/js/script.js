function createForm() {
    var email = document.getElementById("inputEmail").value
    var password = document.getElementById("inputPassword").value
    // ----------------------------------------------------------------- //  
    var form = new FormData();
    form.append("email", email)
    form.append("password", password)
    // ----------------------------------------------------------------- //
    return form
}

function login() {
    var form = createForm();
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var response = xhttp.responseText;
        if (response == 'success') {
            window.location.replace('http://localhost/tugas_pemrograman_web/Praktikum7/login/')
        } else {
            document.getElementById("Alert").innerHTML = 'Email atau Password salah';
        }
    }
    xhttp.open("POST", "./api/login.php");
    xhttp.send(form);
}
function register() {
    var form = createForm();
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var response = xhttp.responseText;
        if (response == 'Email Sudah Terdaftar') {
            document.getElementById("Alert").innerHTML = response;
        } else {
            document.getElementById("Alert").innerHTML = response;
            setTimeout(() => {
                window.location.replace('http://localhost/tugas_pemrograman_web/Praktikum7/login.html')
            }, 3000);
        }
    }
    xhttp.open("POST", "./api/register.php");
    xhttp.send(form);
}

function showPassword() {
    var x = document.getElementById("inputPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }