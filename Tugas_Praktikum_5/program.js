var uang = 5000;
var total = 0;
var kartu = [];
var inputBet;
var ex = document.getElementById("cards");

function startGame() {
	inputBet = document.getElementById("setBet").value;
	console.log(inputBet);
	if (inputBet == "") {
		alert("Set Your Bet First, bro");
	} else if (inputBet <= uang && inputBet > 0) {
		if (total < 21) {
			console.log(total);
			if (kartu.length < 2) {
				for (var e = 0; e < 2; e++) {
					var randomNum = Math.floor(Math.random() * 11) + 1;
					kartu.push(randomNum);
					document.getElementById("buttonStartGame").innerText = "Play Again?";
					buttonStartGame.disabled = true;
				}
				for (var f = 0; f < kartu.length; f++) {
					var cards = `${kartu[f]} `;
					ex.append(cards);
					console.log(cards);
					total += kartu[f];
					document.getElementById("sum").innerText = total;
					console.log(total);
				}
				if (total > 21) {
					document.getElementById("perhatian").innerText =
						"Game Over You Lose!";
					document.getElementById("sum").innerText = total;
				} else if (total == 21) {
					document.getElementById("perhatian").innerText = "You Got BlackJack!";
					document.getElementById("sum").innerText = total;
					uang = uang + inputBet * 6;
					document.getElementById("money").innerText = uang;
				}
				uang = uang - inputBet;
				document.getElementById("money").innerText = uang;
			}
		} else {
			kartu = [];
			total = 0;
			ex.append(kartu);
			ex.innerHTML = "";
			document.getElementById("buttonStartGame").innerText = "Start Game";
			document.getElementById("sum").innerText = "";
			document.getElementById("perhatian").innerText = "";
		}
	} else {
		alert("Input Your Correct Amount of Money, please!");
	}
}

function takeCard() {
	if (total != 0 && total < 21) {
		var kartuBaru = Math.floor(Math.random() * 11) + 1;
		kartu.push(kartuBaru);
		ex.append(`${kartuBaru} `);
		total += kartuBaru;
		document.getElementById("sum").innerText = total;
		if (total > 21) {
			document.getElementById("perhatian").innerText = "Game Over You Lose!";
			document.getElementById("sum").innerText = total;
			buttonStartGame.disabled = false;
		} else if (total == 21) {
			document.getElementById("perhatian").innerText = "You Got BlackJack!";
			document.getElementById("sum").innerText = total;
			buttonStartGame.disabled = false;
			uang = uang + inputBet * 6;
			document.getElementById("money").innerText = uang;
		}
	} else if (inputBet == "") {
		alert("Set Your Bet First!");
	} else {
		alert("Press Play Again Button!");
	}
}