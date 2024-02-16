/**
 * 1. Usa el recurso 
 * https://cat-fact.herokuapp.com/facts 
 * para mostrar las frases sobre gatos cuya fecha de creación corresponde a Enero de 2018.
 */

// The URL to fetch the cat facts
const FACTS_URL = 'https://cat-fact.herokuapp.com/facts';

/**
 * When the DOM is loaded, fetch the cat facts and show the ones created in January 2018
 */
document.addEventListener('DOMContentLoaded', () => {
  loadCatsFacts();
})

/**
 * Fetch the cat facts and show the ones created in January 2018
 */
async function loadCatsFacts() {
  // Get the list where the facts will be shown
  const factsList = document.getElementById('factsList');
  // Show the loading message
  setLoading(true);
  // Fetch the cat facts and convert the response to JSON
  const facts = await (await fetch(FACTS_URL)).json();
  // Hide the loading message
  setLoading(false);
  // Filter the facts to get the ones created in January 2018
  const januaryFacts = facts.filter(fact => {
    const date = new Date(fact.createdAt); // Convert the createdAt string to a Date object
    return date.getFullYear() === 2018 && date.getMonth() === 0; // Check if the fact was created in January 2018
  });

  // Show the facts in the list
  januaryFacts.forEach(fact => {
    // Create a new list item and add the fact text to it
    const li = document.createElement('li');
    li.textContent = fact.text;
    // Add the list item to the list
    factsList.appendChild(li);
  })
}

function setLoading(loading) {
  const loadingDiv = document.getElementById('loading');
  if (loading) {
    loadingDiv.style.display = 'block';
  } else {
    loadingDiv.style.display = 'none';
  }
}