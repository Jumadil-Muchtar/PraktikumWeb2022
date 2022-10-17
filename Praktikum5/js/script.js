var images = ["../img/2_of_clubs.png","../img/3_of_clubs.png","../img/4_of_clubs.png","../img/5_of_clubs.png","../img/6_of_clubs.png","../img/7_of_clubs.png","../img/8_of_clubs.png","../img/9_of_clubs.png","../img/10_of_clubs.png","../img/jack_of_clubs.png","../img/queen_of_clubs.png","../img/king_of_clubs.png","../img/ace_of_clubs.png","../img/2_of_diamonds.png","../img/3_of_diamonds.png","../img/4_of_diamonds.png","../img/5_of_diamonds.png","../img/6_of_diamonds.png","../img/7_of_diamonds.png","../img/8_of_diamonds.png","../img/9_of_diamonds.png","../img/10_of_diamonds.png","../img/jack_of_diamonds.png","../img/queen_of_diamonds.png","../img/king_of_diamonds.png","../img/ace_of_diamonds.png","../img/2_of_hearts.png","../img/3_of_hearts.png","../img/4_of_hearts.png","../img/5_of_hearts.png","../img/6_of_hearts.png","../img/7_of_hearts.png","../img/8_of_hearts.png","../img/9_of_hearts.png","../img/10_of_hearts.png","../img/jack_of_hearts.png","../img/queen_of_hearts.png","../img/king_of_hearts.png","../img/ace_of_hearts.png","../img/2_of_spades.png","../img/3_of_spades.png","../img/4_of_spades.png","../img/5_of_spades.png","../img/6_of_spades.png","../img/7_of_spades.png","../img/8_of_spades.png","../img/9_of_spades.png","../img/10_of_spades.png","../img/jack_of_spades.png","../img/queen_of_spades.png","../img/king_of_spades.png","../img/ace_of_spades.png",];

function StartGame(id) {
    if (parseInt(document.getElementById("taruhan").value) <= 0 || document.getElementById("taruhan").value == '') {
        alert("Nilai tidak boleh kosong atau kurang dari 0")
    } else if (parseInt(document.getElementById("Money").innerHTML) >= document.getElementById("taruhan").value) {
        document.getElementById("Nilai").innerHTML = 0;
        document.getElementById("AiNilai").innerHTML = 0;

        for (let index = 0; index < document.getElementById("yourcard").childNodes.length;) {
            document.getElementById("yourcard").removeChild(document.getElementById("yourcard").firstChild)
        }
        for (let index = 0; index < document.getElementById("aicard").childNodes.length;) {
            document.getElementById("aicard").removeChild(document.getElementById("aicard").firstChild)
        }

        document.getElementById("getCard").disabled = false;
        document.getElementById("stopCard").disabled = false;
        document.getElementById("taruhan").disabled = true;
        document.getElementById("StartGame").disabled = true;
        getCard(id);
        getCard(id);

    } else {
        alert("Uang anda tidak cukup")
    }
}
function getCard(id){
    var number1 = RandomNumber(0, 12);
    var number2 = RandomNumber(0, 3);
    var number3 = number1 + (13 * number2);
    var img = document.createElement('img');
    img.width = "100";
    img.src = images[number3];
    document.getElementById(id).appendChild(img);
    if (id == "yourcard") {
        nilaiAkhir(number1, "Nilai");
    } else {
        nilaiAkhir(number1, "AiNilai");
    }
}

function RandomNumber(min, max) {
    return Math.round(Math.random() * (max - min) + min);
}

function nilaiAkhir(tambah, id) {
    var Nilai = document.getElementById(id);
    if (tambah == 12) {
        if(document.getElementById(id).innerHTML < 11) {
            tambah = 9;
        } else {
            tambah = -1;
        }
    } else if (tambah >= 9) {
        tambah = 8;
    }
    var nilaiStatic = Nilai.innerHTML;
    nilaiStatic = parseInt(nilaiStatic);
    Nilai.innerHTML = (tambah + 2) + nilaiStatic;

    if(parseInt(document.getElementById("Nilai").innerHTML) > 21) {
        Lose();
    } else if (parseInt(document.getElementById("Nilai").innerHTML) == 21) {
        Win();
    }
}

function holdCard() {
    setTimeout(() => {
        var nilaiAI = parseInt(document.getElementById("AiNilai").innerHTML);
        if (nilaiAI < 21 && nilaiAI <= parseInt(document.getElementById("Nilai").innerHTML)) {
            getCard("aicard");
            holdCard();
        } else if (nilaiAI > parseInt(document.getElementById("Nilai").innerHTML) && nilaiAI <= 21) {
            Lose();
        } else {
            Win();
        }
    }, 1000);
}

function resetMoney() {
        document.getElementById("reset").style.display = 'none';
        document.getElementById("Money").innerHTML = "5000";
}

function gameOver() {
    document.getElementById("getCard").disabled = "disable";
    document.getElementById("StartGame").disabled = false;
    document.getElementById("StartGame").innerHTML = "TRY AGAIN?";
    document.getElementById("taruhan").disabled = false;
    document.getElementById("stopCard").disabled = true;
}

function Lose() {
    gameOver();
    document.getElementById("Money").innerHTML = document.getElementById("Money").innerHTML - document.getElementById("taruhan").value;
    document.getElementById("winCondition").innerHTML = "You Lose, The game is over you can't take a new card";
    if(parseInt(document.getElementById("Money").innerHTML) == 0) {
        document.getElementById("reset").style.display = 'initial';
    } else {
        document.getElementById("reset").style.display = 'none';
    }
}

function Win() {
    gameOver();
    document.getElementById("Money").innerHTML = parseInt(document.getElementById("Money").innerHTML)  + (document.getElementById("taruhan").value * 5);
    document.getElementById("winCondition").innerHTML = "You Win";
}

function createMoney(money) {
    document.getElementById("Money").innerHTML = parseInt(document.getElementById("Money").innerHTML) + money;
}

function activateCheat() {
    var cheat = document.getElementById("CHEAT");
    cheat.style.display = 'initial';
}

function deactivateCheat() {
    var cheat = document.getElementById("CHEAT");
    cheat.style.display = 'none';
}