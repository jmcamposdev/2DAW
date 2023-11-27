import Player  from "./player.js";
import ticTacToe from "./tictactoe.js";

// Elements
const restartBtn = document.querySelector("#restart");
const roundCounter = document.querySelector("#round-counter");
const resultText = document.querySelector(".result-text");
const formNewPlayers = document.querySelector("#form-new-players");
const player1NameElement = document.querySelector("#player1-name");
const player2NameElement = document.querySelector("#player2-name");
const player1Points = document.querySelector("#player1-points");
const player2Points = document.querySelector("#player2-points");

const player1 = new Player("Player 1", "X");
const player2 = new Player("Player 2", "O");
let currentPlayer = player1;

// Event listeners
restartBtn.addEventListener("click", restartGame);
formNewPlayers.addEventListener("submit", (e) => {
    e.preventDefault();
    const player1Name = document.querySelector("#player1-name-input").value;
    const player2Name = document.querySelector("#player2-name-input").value;
    player1.name = player1Name;
    player2.name = player2Name;
    setPlayerNames(player1Name, player2Name);
    toggleModal();
});
const tabs = document.querySelectorAll(".tab");
tabs.forEach(tab => {
    tab.addEventListener("click", (e) => {
        let isWinner = false;
        let isDraw = false;
        let messageText = "";
        const index = e.target.dataset.index;
        const card = e.target.children[0];
        if (card.classList.length > 0) { // If the card already has a symbol, return
            return;
        }

        ticTacToe.placeCard(card, currentPlayer.symbol, index);
        
        if (ticTacToe.isWinner(currentPlayer.symbol)) {
            isWinner = true;
            messageText = `${currentPlayer.name} wins!`;
            addPlayerPoints(currentPlayer);
        }

        if (ticTacToe.isDraw()) {
            isDraw = true;
            messageText = "It's a draw!";
        }

       if (isWinner || isDraw) {
            setResultText(messageText);
            setRound(getRound() + 1);
            ticTacToe.cleanBoard();
            return;
        }
        currentPlayer = currentPlayer === player1 ? player2 : player1;
    });
});

ticTacToe.buildBoard();

function restartGame() {
    ticTacToe.cleanBoard();
    player1.points = 0;
    player2.points = 0;
    updatePlayerPoints();
    setRound(0);
    setResultText("");
}

function setRound(round) {
    roundCounter.textContent = round;
};
function getRound() {
    return parseInt(roundCounter.textContent);
};

function addPlayerPoints(player) {
    player.points += 1;
    updatePlayerPoints();
}

function updatePlayerPoints() {
    player1Points.textContent = player1.points;
    player2Points.textContent = player2.points;
}

function setResultText(text) {
    resultText.textContent = text;
}

function toggleModal() {
    const modal = document.querySelector(".modal");
    modal.classList.toggle("active");
}

function setPlayerNames(player1Name, player2Name) {
    player1NameElement.textContent = player1Name;
    player2NameElement.textContent = player2Name;
}