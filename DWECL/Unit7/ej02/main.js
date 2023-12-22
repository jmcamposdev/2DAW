/**
 * This file use Promises to show the completed todos with then() method.
 */

window.addEventListener('load', main);

function main() {
  const btnShowTodos = document.querySelector('#btn-show-todos');
  btnShowTodos.addEventListener('click', showTodosCompleted);
}


function showTodosCompleted() {
  const tableBody = document.querySelector('#table-body');
  fetch('https://jsonplaceholder.typicode.com/todos')
    .then(response => response.json())
    .then(todos => {
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
    });
}