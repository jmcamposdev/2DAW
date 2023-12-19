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

const LIST = '.order__list';


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

function removeList(){
  $(LIST).empty();
}

function restoreList() {
  removeList();
  const listsChildren = 7;
  for (let i = 1; i <= listsChildren ; i++) {
    addElementToBottom();
  }
}

function addElementToStart() {
  $(LIST).prepend(getListItem());
}

function addElementToBottom() {
  $(LIST).append(getListItem());
}

function removeLastElement() {
  $(LIST).children().last().remove();
}

function removeFirstElement() {
  $(LIST).children().first().remove();
}

function removeFirstAndSecondElement() {
  removeFirstElement();
  removeLastElement();
}

function removeLastTwoElements() {
  removeLastElement();
  removeLastElement();
}

function getListItem() {
  const n = $(LIST).children().length + 1;
  return $("<li class='order__list__item'></li>").text(`Element ${n}`);
}
