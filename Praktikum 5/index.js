let cards = []
let sum = 0
let money = 5000
let hasBlackJack = false
let isAlive = false
let message = ""
let hidden = ""
let messageEl = document.getElementById("message-el")
let sumEl = document.getElementById("sum-el")
let cardsEl = document.getElementById("cards-el")
let moneyEl = document.getElementById("money-el")
let hiddenEl = document.getElementById("hidden-el")


    
moneyEl.textContent =  "Your Money : RP." + money

function getRandomCard() {
    let randomNumber = Math.floor( Math.random()*11 ) + 1
    if (randomNumber > 10) {
        return 10
    } else if (randomNumber === 1) {
        return 11
    } else {
        return randomNumber
    }
}

function startGame() {
    if(money === 0 ){
        alert("Your Money is = 0, Please Reset Money!")
    }
    if(money > 0){

    let bet = bets.value
    if(bet<1){
        alert("Set Your Bet First")
    }if(bet>money){
        alert("Your money is less than your bet,Please Reset Money or Change your Bet!")
    }else{
    isAlive = true
    hasBlackJack = false
    let firstCard = getRandomCard()
    let secondCard = getRandomCard()
    cards = [firstCard, secondCard]
    sum = firstCard + secondCard
    money = money - bet
    document.getElementById("Button1").value="WANT TO PLAY AGAIN?";
    hiddenEl.textContent= ""
    renderGame()
    
    }
    }
}

function renderGame() {
    cardsEl.textContent = "Cards: "
    for (let i = 0; i < cards.length; i++) {
        cardsEl.textContent += cards[i] + " "
    }
    
    sumEl.textContent = "Sum: " + sum
    if (sum <= 20) {
        message = "Draw new card?"
    } else if (sum === 21 && hasBlackJack===false) {
        message = "You've got Blackjack!"
        money = money + (5*bets.value)
        hasBlackJack = true
    } else {
        message = "You Lose!"
        isAlive = false
    }
    messageEl.textContent = message
    moneyEl.textContent =  "Your Money : RP." + money

}



function newCard() {
    if (sum === 21 && hasBlackJack === true && isAlive === true){
        hiddenEl.textContent= "You Already Got BlackJack!!"
    }else if (sum > 21){
        hiddenEl.textContent= "Game is Over You Can't Take New Card!!"
    }


    if (isAlive === true && hasBlackJack === false) {
        let card = getRandomCard()
        sum += card
        cards.push(card)
        renderGame()        
    }
    }



function Reset(){
    money = 5000
    renderGame()
}

