/**
 * ACTIVIDAD 2: Usa de nuevo el fichero html del ejercicio 5 del tema anterior. Usando las
 * funciones propias del DOM, crear un botón "Modifica página" en la parte inferior que
 * realice lo siguiente:
 * 1. Dentro del párrafo "contenido_2" crea estos elementos nuevos:
 *    a) Un elemento p. En él:
 *       - Cambia el atributo title: "Título del nuevo párrafo".
 *       - Añade un nodo texto: "Este es la primera parte de mi nuevo párrafo"
 *       - Añade un elemento br
 *       - Añade un nodo texto: "Este es la segundo parte de mi nuevo párrafo"
 *    b) Un elemento b:
 *       - Añade dentro un nodo texto: "Este el texto en negrita."
 * 2. Cambia el contenido del párrafo contenido_3 por: "Este es el nuevo contenido del
 *    párrafo 3".
 * 3. Elimina del DOM el párrafo contenido_1
 */

// When the page is loaded, add a button to the body
window.addEventListener("load", function () {
  const body = document.body;
  body.appendChild(createButton("Modifica página", modifyDOM));
});

/**
 * Modifies the DOM will be the callback function of the button
 */
function modifyDOM() {
  modifyContent1();
  modifyContent2();
  modifyContent3();

  // Remove the button
  document.body.removeChild(document.body.lastChild);
}

/**
 * Modifies the content of the element with id="contenido_1"
 */
function modifyContent1()  {
  // Remove the element with id="contenido_1"
  if (document.getElementById("contenido_1") != null){
    document.getElementById("contenido_1").remove();
  }
}

/**
 * Modifies the content of the element with id="contenido_2"
 */
function modifyContent2() {
  // Get the element with id="contenido_2"
  const content2Element = document.getElementById("contenido_2");

  // Create a new element <p> and add it to the element with id="contenido_2"
  const paragraph = createElement(
    "p",
    "Este es la primera parte de mi nuevo párrafo"
  );
  paragraph.setAttribute("title", "Título del nuevo párrafo"); // Add a title attribute
  paragraph.appendChild(createElement("br")); // Add a <br> element
  paragraph.innerHTML += "Este es la segundo parte de mi nuevo párrafo"; // Add text

  // Append the paragraph to the element with id="contenido_2"
  content2Element.appendChild(paragraph);
  // Add a <b> element to the element with id="contenido_2"
  content2Element.appendChild(createElement("b", "Este el texto en negrita."));
}

/**
 * Modifies the content of the element with id="contenido_3"
 */
function modifyContent3() {
  // Get the element with id="contenido_3"
  const content3Element = document.getElementById("contenido_3");
  // Change the text of the element with id="contenido_3"
  content3Element.textContent = "Este es el nuevo contenido del párrafo 3";
}

function createButton(text, callback) {
  let button = createElement("button", text);
  button.addEventListener("click", callback);
  return button;
}

function createElement(type, text) {
  let element = document.createElement(type);
  element.innerHTML = text;
  return element;
}
