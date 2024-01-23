/**
 * This file use Promises to show the completed todos with then() method.
 */

window.addEventListener('load', main);

/**
 * The main start of the script
 * Add event listener to the button to show the completed todos
 */
function main() {
  // Get the button
  const btnShowTodos = document.querySelector('#btn-show-todos');
  // Add event listener
  btnShowTodos.addEventListener('click', showTodosCompleted);
}


/**
 * Show all the completed todos using Promises
 */
function showTodosCompleted() {
  // Get the table body
  const tableBody = document.querySelector('#table-body');
  // Remove all the rows
  tableBody.innerHTML = '';

  // Get the todos form the API
  fetch('https://jsonplaceholder.typicode.com/todos')
    .then(response => response.json()) // Convert the response to JSON
    .then(todos => { // Get the todos
      // Filter the completed todos
      const completed = todos.filter(todo => todo.completed);

      // Create the rows
      completed.forEach(todo => {
        // Create the row
        const tr = document.createElement('tr');

        // Create the cell of the ID
        const tdId = document.createElement('td');
        tdId.textContent = todo.id;
        
        // Create the cell of the title
        const tdTitle = document.createElement('td');
        tdTitle.textContent = todo.title;
        
        // Create the cell of the completed
        const tdCompleted = document.createElement('td');
        tdCompleted.textContent = todo.completed;
        
        // Add the cells to the row
        tr.appendChild(tdId);
        tr.appendChild(tdTitle);
        tr.appendChild(tdCompleted);

        // Add the row to the table body
        tableBody.appendChild(tr);
      });
    });
}