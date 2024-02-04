/**
 * This file use Async/Await to show the completed todos.
 */

window.addEventListener('load', main);

/**
 * Main function.
 */
function main() {
  // Add event listener to the button.
  const btnShowTodos = document.querySelector('#btn-show-todos');
  btnShowTodos.addEventListener('click', showTodosCompleted);
}

/**
 * Async function to show the completed todos.
 */
async function showTodosCompleted() {
  // Get the table body.
  const tableBody = document.querySelector('#table-body');
  // Get the todos and wait for the response.
  const response = await fetch('https://jsonplaceholder.typicode.com/todos');
  // Convert the response to json.
  const todos = await response.json();
  // Filter the todos by completed.
  const completed = todos.filter(todo => todo.completed);
  // Clear the table body.
  tableBody.innerHTML = '';

  // Create the table rows.
  completed.forEach(todo => {
    // Create the table row.
    const tr = document.createElement('tr');
    // Create the table cells.
    const tdId = document.createElement('td');
    tdId.textContent = todo.id;
    const tdTitle = document.createElement('td');
    tdTitle.textContent = todo.title;
    const tdCompleted = document.createElement('td');
    tdCompleted.textContent = todo.completed;

    // Add the cells to the row.
    tr.appendChild(tdId);
    tr.appendChild(tdTitle);
    tr.appendChild(tdCompleted);

    // Add the row to the table body.
    tableBody.appendChild(tr);
  });
}