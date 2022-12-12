var dealerSum = 0;
var yourSum = 0;

var dealerAceCount = 0;
var yourAceCount = 0; 

var hidden;
var deck;
var dealerCard = [];
var yourCard = [];

var canHit = true; //Kondisi ketika yourSum <= 21

var balance = 5000;

var message = document.getElementById('bet-message');
var game = document.getElementById('game');
var startBtn = document.getElementById('start-btn');
var startAgainBtn = document.getElementById('start-again');
var yourCard = document.getElementById('your-sum');
var myBalance;
var myBet;


// ===== Betting System ===== //
document.getElementById('mybet').onchange = function() {
    if (this.value < 0) {
        this.value = 0;
    }
    if (this.value > balance) {
        this.value = balance;
    }
    // alert(`Bet changed to $ ${this.value}`); 
};

mybet.addEventListener('input', () => {
    if (mybet.value.length != 0 && mybet.value > 0) {
        startBtn.removeAttribute('disabled');
        startAgainBtn.removeAttribute('disabled');
    }
    else {
        startBtn.setAttribute('disabled', 'disabled');
        startAgainBtn.setAttribute('disabled', 'disabled');
    }
});

function maxbet() {
    document.getElementById('mybet').value = balance;
    startBtn.removeAttribute('disabled');
    // message.innerText = `Bet changed to $ ${balance}`
}

function start() {
    deck = [];
    document.getElementById('dealer-cards').innerHTML = '<img id="hidden" src="./cards/BACK.png">';
    document.getElementById('your-cards').innerHTML = '';
    dealerSum = 0;
    yourSum = 0;
    document.getElementById("dealer-sum").innerText = '';
    document.getElementById("your-sum").innerText = '';
    dealerAceCount = 0;
    yourAceCount = 0; 
    canHit = true;
    document.getElementById("results").innerText = '';

    game.removeAttribute('style');
    

    myBet = document.getElementById('mybet').value;
    balance -= myBet;
    myBalance = document.getElementById('mybalance').innerHTML = balance;

    if (balance == 0) {
        alert("Sorry, your balance is 0. Please reset your Balance if you want to continue the game!");
    }
    else if (mybet.value > balance) {
        alert("Sorry, your balance...");
    }
    else if (mybet.value == 0 || mybet.value == '') {
        alert("Please enter your bet before!");
    }
    else {
        // startBtn.classList.toggle('d-none');
        // startAgainBtn.classList.toggle('d-none')
        // startBtn.innerHTML = "Play again";
        // // myBet = document.getElementById('mybet').value;
        // // balance -= mybet.value;
        // balance.innerHTML = balance;
    }
    buildDeck();
    shuffleDeck();
    renderGame();
}


// ===== Dalam Game ===== //
// window.onload = function() {
//     buildDeck();
//     shuffleDeck();
//     renderGame();
// }

function buildDeck() {
    let values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    let types = ["C", "D", "H", "S"];
    deck = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + "-" + types[i]); //A-C -> K-C, A-D -> K-D (sesuai nama file image)
        }
    }
    // console.log(deck);
}

function shuffleDeck() {
    for (let i = 0; i < deck.length; i++) {
        let j = Math.floor(Math.random() * deck.length); // (0-1) * 52 => (0-51.9999)
        let temp = deck[i];
        deck[i] = deck[j];
        deck[j] = temp;
    }
    // console.log(deck);
}

function renderGame() {
    hidden = deck.pop();
    dealerSum += getValue(hidden);
    dealerAceCount += checkAce(hidden);
    
    while (dealerSum < 17) {
        //<img src="./cards/4-C.png">
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        dealerSum += getValue(card);
        dealerAceCount += checkAce(card);
        document.getElementById("dealer-cards").append(cardImg);
    }
    console.log(dealerSum);

    for (let i = 0; i < 2; i++) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        yourSum += getValue(card);
        yourAceCount += checkAce(card);
        document.getElementById("your-cards").append(cardImg);
    }

    console.log(yourSum);
    document.getElementById("hit").addEventListener("click", hit);
    document.getElementById("stay").addEventListener("click", stay);
}

function hit() {
    if (!canHit) {
        return;
    }

    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    yourSum += getValue(card);
    yourAceCount += checkAce(card);
    document.getElementById("your-cards").append(cardImg);

    if (reduceAce(yourSum, yourAceCount) > 21) { //A, J, 8 -> 11 + 10 + 8 => 1 + 10 + 8
        canHit = false;
        stay();
    }

}

function stay() {
    dealerSum = reduceAce(dealerSum, dealerAceCount);
    yourSum = reduceAce(yourSum, yourAceCount);

    canHit = false;
    document.getElementById("hidden").src = "./cards/" + hidden + ".png";

    let message = "";
    if (yourSum == dealerSum) {
        message = "Tie! 🙄";
        myBet = document.getElementById('mybet').value;
        var tie = myBet * 0.5;
        balance += tie;
        document.getElementById('mybalance').innerHTML = balance;
    }
    else if (yourSum > 21) {
        message = "You Lose! ☠️";
    }
    else if (dealerSum > 21) {
        message = "You win! 🎉";
        myBet = document.getElementById('mybet').value;
        var win = myBet * 5;
        balance += win;
        document.getElementById('mybalance').innerHTML = balance;
    }
    //both you and dealer <= 21
    else if (yourSum > dealerSum) {
        message = "You Win! 🎉";
        myBet = document.getElementById('mybet').value;
        var win = myBet * 5;
        balance += win;
        document.getElementById('mybalance').innerHTML = balance;
    }
    else if (yourSum < dealerSum) {
        message = "You Lose! ☠️";
    }

    document.getElementById("dealer-sum").innerText = dealerSum;
    document.getElementById("your-sum").innerText = yourSum;
    document.getElementById("results").innerText = message;
}

// Menentukan nilai kartu (2-10 => nilai sesuai kartu; J,Q,K => 10; A => 1 atau 11 (sesuai kondisi))
function getValue(card) {
    let data = card.split("-"); // "4-C" -> ["4", "C"]
    let value = data[0];

    if (isNaN(value)) { //A J Q K
        if (value == "A") {
            return 11;
        }
        return 10;
    }
    return parseInt(value);
}

function checkAce(card) {
    if (card[0] == "A") {
        return 1;
    }
    return 0;
}

// Penyesuaian niai kartu AS
function reduceAce(playerSum, playerAceCount) {
    while (playerSum > 21 && playerAceCount > 0) {
        playerSum -= 10;        // Ketika jumlah lebih dari 21, nilai AS dikurangi 10
        playerAceCount -= 1;    // Jumlah kartu AS dikurangi 1
    }
    return playerSum;
}

function restart() {
    // deck = [];
    // document.getElementById('dealer-cards').innerHTML = '<img id="hidden" src="./cards/BACK.png">';
    // document.getElementById('your-cards').innerHTML = '';
    // dealerSum = 0;
    // yourSum = 0;
    // document.getElementById("dealer-sum").innerText = '';
    // document.getElementById("your-sum").innerText = '';
    // dealerAceCount = 0;
    // yourAceCount = 0; 
    // canHit = true;
    start();
}