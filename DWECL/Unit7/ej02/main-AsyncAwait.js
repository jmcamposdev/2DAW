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

async function showTodosCompleted() {
  const tableBody = document.querySelector('#table-body');
  const response = await fetch('https://jsonplaceholder.typicode.com/todos');
  const todos = await response.json();
  const completed = todos.filter(todo => todo.completed);
  completed.forEach(todo => {
    const tr = document.createElement('tr');
    const tdId = document.createElement('td');
    tdId.textContent = todo.id;
    const tdTitle = document.createElement('td');
    tdTitle.textContent = todo.title;
    const tdCompleted = document.createElement('td');
    tdCompleted.textContent = todo.completed;
    tr.appendChild(tdId);
    tr.appendChild(tdTitle);
    tr.appendChild(tdCompleted);
    tableBody.appendChild(tr);
  });
}