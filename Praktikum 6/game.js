<<<<<<< HEAD
let uang = 5000;
let sum = 0;
let cards = [];
let bet = 0;

document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;

function start() {
	bet = document.getElementById("bet").value;
	cards = [];

	document.getElementById("card").innerHTML = "";
	document.getElementById("sum").innerHTML = "";
	document.getElementById("caption").innerHTML = "";
	if (bet === "") {
		alert("Set your bet first!");
	} else if (bet == 0) {
		alert("Set your bet first!");
	} else if (bet > uang) {
		alert("your money is less!!");
	} else if (bet < 0) {
		alert("Bet cannot be less than 0!!");
	} else {
		uang -= bet;
		document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;
		function randomIntFromInterval(min, max) {
			// min and max included
			return Math.floor(Math.random() * (max - min + 1) + min);
		}
		const card1 = randomIntFromInterval(1, 11);
		const card2 = randomIntFromInterval(1, 11);
		cards.push(card1);
		cards.push(card2);
		document.getElementById("card").innerHTML = cards.join(" ");

		sum = card1 + card2;
		document.getElementById("sum").innerHTML = sum;
		document.getElementById("take").disabled = false;
		document.getElementById("start").innerText = "Play Again?";
	}
	document.getElementById("bet").value = "";
	cek();
}

document.getElementById("take").disabled = true;
function take() {
	if (sum < 21) {
		function randomIntFromInterval(min, max) {
			// min and max included
			return Math.floor(Math.random() * (max - min + 1) + min);
		}
		const card3 = randomIntFromInterval(1, 11);
		cards.push(card3);

		document.getElementById("card").innerHTML = cards.join(" ");
		sum += card3;
		document.getElementById("sum").innerHTML = sum;
		cek();
	}
}

function cek() {
	if (sum === 21) {
		document.getElementById("caption").innerHTML = "You Got BlackJack!";
		uang += bet * 6;
		document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;
	} else if (sum > 21) {
		document.getElementById("caption").innerHTML = "You Lose!";
		setTimeout(() => {
			if (uang === 0) {
				alert("Your money = 0 Please Reset Your Money");
			}
		}, 1000);
	}
}

function reset() {
	location.reload();
=======
let uang = 5000;
let sum = 0;
let cards = [];
let bet = 0;

document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;

function start() {
	bet = document.getElementById("bet").value;
	cards = [];

	document.getElementById("card").innerHTML = "";
	document.getElementById("sum").innerHTML = "";
	document.getElementById("caption").innerHTML = "";
	if (bet === "") {
		alert("Set your bet first!");
	} else if (bet == 0) {
		alert("Set your bet first!");
	} else if (bet > uang) {
		alert("your money is less!!");
	} else if (bet < 0) {
		alert("Bet cannot be less than 0!!");
	} else {
		uang -= bet;
		document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;
		function randomIntFromInterval(min, max) {
			// // min and max included
			// a =  Math.random() * (max - min + 1)  + min; 
			// console.log("random  : " + a);
			// console.log("flooor : " + Math.floor(a));
			return Math.floor(Math.random() * (max - min + 1) + min);
		}
		const card1 = randomIntFromInterval(1, 11);
		const card2 = randomIntFromInterval(1, 11);
		cards.push(card1);
		cards.push(card2);
		document.getElementById("card").innerHTML = cards.join(" ");

		sum = card1 + card2;
		document.getElementById("sum").innerHTML = sum;
		document.getElementById("take").disabled = false;
		document.getElementById("start").innerText = "Play Again?"; //hanya mengubah teksnya
	}
	document.getElementById("bet").value = "";
	cek();
}

document.getElementById("take").disabled = true;
function take() {
	if (sum < 21) {
		function randomIntFromInterval(min, max) {
			// min and max included
			return Math.floor(Math.random() * (max - min + 1) + min);
		}
		const card3 = randomIntFromInterval(1, 11);
		cards.push(card3);

		document.getElementById("card").innerHTML = cards.join(" ");
		sum += card3;
		document.getElementById("sum").innerHTML = sum;
		cek();
	}
}

function cek() {
	if (sum === 21) {
		document.getElementById("caption").innerHTML = "You Got BlackJack!";
		uang += bet * 6;
		document.getElementById("uang").innerHTML = "Your Money : Rp. " + uang;
	} else if (sum > 21) {
		document.getElementById("caption").innerHTML = "You Lose!";
		setTimeout(() => {
			if (uang === 0) {
				alert("Your money = 0 Please Reset Your Money");
			}
		}, 1000);
	}
}

function reset() {
	location.reload();
>>>>>>> f694c08 (kumpul tugas 6 fix kak)
}