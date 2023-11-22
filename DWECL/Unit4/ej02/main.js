/**
 * Sobre el código de la actividad 1, añade eventos para:
• Cambiar el color del div con id "hola" a rojo al pulsar la tecla R.
• Cambiar el color del div con id "hola" a verde al pulsar la tecla V.
• Cambiar el color del div con id "hola" a azul al pulsar la tecla A.
• Aumenta el ancho y alto de la capa con id "hola" en 10 pixeles al pulsar la tecla +.
• Reduce el ancho y alto de la capa con id "hola" en 10 pixeles al pulsar la tecla a-
Nota: Las teclas utilizadas pueden ser modificadas si no dispones de ellas en tu teclado.
 */

// Gets all the elements by id
const redBox = document.getElementById("hola");

// Adds the event to the document when a key is pressed
document.addEventListener("keydown", (e) => {
  // Switch to check the key pressed
  switch (e.key) {
    case "r": // If the key is "r" changes the background color to red
      redBox.style.backgroundColor = "red";
      break;
    case "v": // If the key is "v" changes the background color to green
      redBox.style.backgroundColor = "green";
      break;
    case "a": // If the key is "a" changes the background color to blue
      redBox.style.backgroundColor = "blue";
      break;
    case "+": // If the key is "+" increases the width and height of the box
      redBox.style.width = `${redBox.offsetWidth + 10}px`;
      redBox.style.height = `${redBox.offsetHeight + 10}px`;
      break;
    case "-": // If the key is "-" decreases the width and height of the box
      redBox.style.width = `${redBox.offsetWidth - 10}px`;
      redBox.style.height = `${redBox.offsetHeight - 10}px`;
      break;
  }})
