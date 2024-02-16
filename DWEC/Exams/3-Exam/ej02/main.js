/**
 * 2. Realizar la Actividad 2 del Tema 5 pero esta vez usando jQuery:
 * Crear un botón "Modifica página" en la parte inferior que realice lo siguiente:
 * 1. Dentro del párrafo "contenido_2" crea estos elementos nuevos:
 * a) Un elemento p. En él:
 *  - Cambia el atributo title: "Título del nuevo párrafo".
 *  - Añade un nodo texto: "Este es la primera parte de mi nuevo párrafo"
 *  - Añade un elemento br
 *  - Añade un nodo texto: "Este es la segundo parte de mi nuevo párrafo"
 * b) Un elemento b:
 *  - Añade dentro un nodo texto: "Este el texto en negrita."
 * 2. Cambia el contenido del párrafo contenido_3 por: "Este es el nuevo contenido del
 * párrafo 3".
 * 3. Elimina del DOM el párrafo contenido_1
 */

// When the DOM is loaded
$(document).ready(() => {
  // Create the button to modify the page
  const button = $('<button>Modify Page</button>');
  // Add the button to the body
  $('body').append(button);
  // Add the event listener to the button
  button.on('click', modifyPage);
})

function modifyPage() {
  // Modify the content of the page
  modifyContent1();
  modifyContent2();
  modifyContent3();

  // Remove the button
  $('button').remove();
}

function modifyContent1() {
  // Remove the first paragraph
  $('#contenido_1').remove();
}

function modifyContent2() {
  // Create the new paragraph
  const newParagraph = $('<p></p>');
  // Change the title attribute
  newParagraph.attr('title', 'Título del nuevo párrafo');
  // Add the text nodes
  newParagraph.append('Este es la primera parte de mi nuevo párrafo');
  newParagraph.append('<br>');
  newParagraph.append('Este es la segunda parte de mi nuevo párrafo');
  // Create the bold element
  const bold = $('<b></b>');
  // Add the text node to the bold element
  bold.append('Este el texto en negrita.');

  // Add the new paragraph to the second content
  $('#contenido_2').append(newParagraph);
  // Add the bold element to the new paragraph
  $('#contenido_2').append(bold);
}



function modifyContent3() {
  // Change the content of the third paragraph
  $('#contenido_3').text('Este es el nuevo contenido del párrafo 3');
}