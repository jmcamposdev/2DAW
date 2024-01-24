/**
 * 1.- Crea una web que contenga una lista con cuatro elementos.
Realiza los siguientes casos:
A) Eliminar la lista completa.
B) Restaurar lista.
C) Añadir un elemento al final de la lista.
D) Añadir un elemento al principio de la lista.
E) Eliminar el último elemento.
F) Eliminar el primer elemento.
G) Eliminar el primero y segundo elemento.
H) Eliminar los dos últimos.
 */

// Declare constants
const LIST = '.order__list';
const LIST_DEFAULT_NUMBER = 7;


// Main Entry
$(function(){
  // Add bottoms events
  $('.btn__remove-all-list').click(removeList);
  $('.btn__restore-list').click(restoreList);
  $('.btn__add__bottom').click(addElementToBottom);
  $('.btn__add__start').click(addElementToStart);
  $('.btn__remove__last').click(removeLastElement);
  $('.btn__remove__first').click(removeFirstElement);
  $('.btn__remove__first__last').click(removeFirstAndSecondElement);
  $('.btn__remove__last__two').click(removeLastTwoElements);
});

/**
 * Remove all list elements
 */
function removeList(){
  $(LIST).empty();
}

/**
 * Restore list elements
 * Add 7 elements to the list
 */
function restoreList() {
  removeList(); // Remove all elements

  for (let i = 1; i <= LIST_DEFAULT_NUMBER ; i++) {
    addElementToBottom();
  }
}

/**
 * Add element to the start of the list
 */
function addElementToStart() {
  $(LIST).prepend(createNextListItem());
}

/**
 * Add element to the bottom of the list
 */
function addElementToBottom() {
  $(LIST).append(createNextListItem());
}

/**
 * Remove last element of the list
 */
function removeLastElement() {
  $(LIST).children().last().remove();
}

/**
 * Remove first element of the list
 */
function removeFirstElement() {
  $(LIST).children().first().remove();
}

/**
 * Remove first and second element of the list
 */
function removeFirstAndSecondElement() {
  removeFirstElement();
  removeLastElement();
}

/**
 * Remove last two elements of the list
 */
function removeLastTwoElements() {
  removeLastElement();
  removeLastElement();
}

/**
 * Get a list item
 * @returns {jQuery|HTMLElement}
 */
function createNextListItem() {
  const n = $(LIST).children().length + 1;
  return $("<li class='order__list__item'></li>").text(`Element ${n}`);
}
