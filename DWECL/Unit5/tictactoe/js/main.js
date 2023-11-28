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

// Start the game
ticTacToe.buildBoard();

// Event listeners
// When the restart button is clicked, restart the game
restartBtn.addEventListener("click", restartGame);

// When the form is submitted, set the player names and toggle the modal
formNewPlayers.addEventListener("submit", (e) => {
    e.preventDefault(); // Prevent the form from submitting
    // Get the player names from the form
    const player1Name = document.querySelector("#player1-name-input").value;
    const player2Name = document.querySelector("#player2-name-input").value;
    // Set the player names
    player1.name = player1Name;
    player2.name = player2Name;
    // Set the player names in the DOM
    setPlayerNames(player1Name, player2Name);
    // Toggle the modal to hide it
    toggleModal();
});

// When a tab is clicked, place the card and check if there is a winner or a draw
const tabs = document.querySelectorAll(".tab");
tabs.forEach(tab => {
    // Add an event listener to each tab
    tab.addEventListener("click", (e) => {
        let isWinner = false;
        let isDraw = false;
        let messageText = "";
        const index = e.target.dataset.index;
        const card = e.target.children[0];
        if (card.classList.length > 0) { // If the card already has a symbol, return
            return;
        }

        // Place the card 
        ticTacToe.placeCard(card, currentPlayer.symbol, index);
        
        // Check if there is a winner or a draw and update the message text
        if (ticTacToe.isWinner(currentPlayer.symbol)) {
            isWinner = true;
            messageText = `${currentPlayer.name} wins!`;
            addPlayerPoints(currentPlayer);
        }

        // Check if there is a draw
        if (ticTacToe.isDraw()) {
            isDraw = true;
            messageText = "It's a draw!";
        }

        // If there is a winner or a draw, show the message and clean the board
        if (isWinner || isDraw) {
            setResultText(messageText);
            setRound(getRound() + 1);
            ticTacToe.cleanBoard();
            return;
        }
        // If there is no winner or draw, change the current player
        currentPlayer = currentPlayer === player1 ? player2 : player1;
    });
});

/**
 * Restart the game
 * Clean the board, set the round to 0, set the result text to empty and set the player points to 0
 */
function restartGame() {
    ticTacToe.cleanBoard();
    player1.points = 0;
    player2.points = 0;
    updatePlayerPoints();
    setRound(0);
    setResultText("");
}

/**
 * Set the round in the DOM
 * @param {Number} round 
 */
function setRound(round) {
    roundCounter.textContent = round;
};

/**
 * Get the round from the DOM
 * @returns {Number} The round
 */
function getRound() {
    return parseInt(roundCounter.textContent);
};

/**
 * Add a point to the player
 * @param {Player} player 
 */
function addPlayerPoints(player) {
    player.points += 1;
    updatePlayerPoints();
}

/**
 * Update the player points in the DOM
 */
function updatePlayerPoints() {
    player1Points.textContent = player1.points;
    player2Points.textContent = player2.points;
}

/**
 * Set the result text in the DOM
 * @param {String} text 
 */
function setResultText(text) {
    resultText.textContent = text;
}

/**
 * Toggle the modal
 */
function toggleModal() {
    const modal = document.querySelector(".modal");
    modal.classList.toggle("active");
}

/**
 * Set the player names in the DOM
 * @param {String} player1Name The name of the player 1
 * @param {String} player2Name The name of the player 2
 */
function setPlayerNames(player1Name, player2Name) {
    player1NameElement.textContent = player1Name;
    player2NameElement.textContent = player2Name;
}