/**
 * ACTIVIDAD 1: En un textarea:
 * • Limitar a 100 el número de caracteres que se pueden escribir.
 * • Indicar con un mensaje (arriba o abajo del textarea) en todo momento al usuario
 *   el número de caracteres que aún puede escribir.
 * • Se debe permitir pulsar las teclas Backspace y Supr., incluso cuando se haya
 *   llegado al máximo número de caracteres.
 */

// Declare the MAX_LENGTH constant with the value 100 
const MAX_LENGTH = 100;

// Get the remainingCharactersText element and the textarea element
const remainingCharactersText = document.querySelector(".remainingCharacters");
const textarea = document.getElementById("textarea");

// When the user types in the textarea
textarea.addEventListener("input", ()=> {
  // Get the current length of the text in the textarea
  const currentLength = textarea.value.length;
  // If the current length is greater than MAX_LENGTH set the value of the textarea to the previous value and return
  if (currentLength > MAX_LENGTH) {
    textarea.value = textarea.value.substring(0, currentLength-1)
    return;
  }
  // Set the text of the remainingCharactersText element to the difference between MAX_LENGTH and the current length
  remainingCharactersText.textContent = MAX_LENGTH - currentLength;
})