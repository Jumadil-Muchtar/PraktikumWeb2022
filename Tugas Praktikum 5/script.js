var uang = 5000;
updateuang();
var bet = 0;
var jumlah = 0;

//  List kartu
let kartu = [1,2,3,4,5,6,7,8,9,10,11];
let kartuacak = [];

function random_item(array){
    return array[Math.floor(Math.random()*array.length)];    
}

function checkwin () {
    if (jumlah == 21){
        win();
    } else if (jumlah > 21) {
        lose();
    }
}

function start () {
    bet = document.getElementById("betInput").valueAsNumber;
    if (bet > uang) {
        alert("Your money is less than your bet! Please reset money or change your bet!");
        document.getElementById("betInput");
    } else if (bet == '' || bet == 0) {
        alert("Set your bet first!");
    } else {
        document.getElementById("takekartu").disabled = false;
        if(jumlah == 0){
            uang = uang - bet;
            var kartu1 = random_item(kartu);
            kartuacak.push(kartu1);
            var kartu2 = random_item(kartu);
            kartuacak.push(kartu2);
            jumlah = kartu1 + kartu2;
            updatekartu();
            updateuang();
            checkwin();
            document.getElementById("wanttoplayagain").innerHTML = "Want to play again?";
        } else {
            reset();
        }
    }
}

function takecard () {
    if(jumlah < 21){
        var kartupilih = random_item(kartu);
        kartuacak.push(kartupilih);
        jumlah += kartupilih;
        updatekartu();
        checkwin();
    }
}

function win () {
    document.getElementById("pertanyaan1").innerHTML = "You got BlackJack!";
    document.getElementById("wanttoplayagain").innerHTML = "Want to play again?";
    document.getElementById("takekartu").disabled = true;
    uang = uang + 6*bet;
    updateuang();
}

function lose () { 
    document.getElementById("pertanyaan1").innerHTML = "You lose!";
    document.getElementById("wanttoplayagain").innerHTML = "Want to play again?";
    document.getElementById("gameover").innerHTML = "Game is over! You can't take new card!";
    document.getElementById("takekartu").disabled = true;
}

function updateuang() {
    document.getElementById("uang").innerHTML = uang;
}

function updatekartu () {
    let listkartu = kartuacak.join(' ');
    document.getElementById("jumlahkartu").innerHTML = jumlah;
    document.getElementById("kartu").innerHTML = listkartu;
}

function resetmoney() {
    uang = 5000;
    updateuang();
}

function reset () {
    bet = 0;
    kartuacak = [];
    jumlah = 0;
    document.getElementById("pertanyaan1").innerHTML = "Play a round?";
    document.getElementById("wanttoplayagain").innerHTML = "Start Game";
    document.getElementById("gameover").innerHTML = "";
    document.getElementById("takekartu").disabled = true;
    updatekartu();
    updateuang();
}

function notzerocheck() {
    if (document.getElementById("betInput").value == ''){
        alert("Set your bet first!");
        document.getElementById("betInput").value = 0;
    }
}