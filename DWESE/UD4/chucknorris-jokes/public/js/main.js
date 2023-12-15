const getJokeBtn = document.getElementById('getJokeBtn');
const jokeContent = document.getElementById('jokeContent');
const loader = document.getElementById('loading');

// When the window loads, fetch a joke
window.addEventListener('load', fetchJoke);
// When the button is clicked, fetch a joke
getJokeBtn.addEventListener('click', fetchJoke);

/**
 * Displays the loading spinner
 */
function displayLoading() {
  loader.classList.add('display');
}

/**
 * Hides the loading spinner
 */
function hideLoading() {
  loader.classList.remove('display');
}

/**
 * Fetches a joke from the API and displays it
 */
function fetchJoke() {
  // Clear the joke content
  jokeContent.textContent = '';
  // Display the loading spinner
  displayLoading();
  // Fetch the joke from the API
  fetch('https://servidor.jmcampos.dev/DWESE/UD4/chucknorris-jokes/public/fetch-joke')
    // Convert the response to JSON
    .then((response) => response.json())
    // Display the joke when the promise resolves
    .then((data) => {
      // Display the joke
      jokeContent.textContent = data.joke;
      // Hide the loading spinner
      hideLoading();
    });
}