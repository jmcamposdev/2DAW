let userData;
let validData = false;
let exit = false;
do {
  // Validamos que el usuario ingrese un dato no vacío
  validData = false;
  do {
    // Pedimos el dato al usuario y removemos los espacios en blanco y convertimos a minúsculas
    userData = prompt("Ingrese una cadena:").replaceAll(" ", "").toLowerCase();
    if (userData == "") {
      // Si esta vacío le avisamos al usuario
      alert("No ingresaste ningún dato, por favor vuelve a intentarlo");
    } else {
      // Si es un número entero salimos del bucle
      validData = true;
    }
  } while (!validData); // Mientras no sea un número entero repetimos el bucle

  // Mostramos el resultado
  alert(
    "La cadena " +
    userData +
    " " +
    (isPalindrome(userData) ? "es" : "no es") +
    " un palíndromo"
  );

  // Preguntamos si quiere ingresar otro número

  exit = false;
  validData = false;
  do {
    userData = prompt("¿Desea ingresar otra cadena? (s/n)");
    if (userData == "" || !(userData == "s" || userData == "n")) {
      // Si esta vacío le avisamos al usuario
      alert("No ingresaste ningún dato, por favor vuelve a intentarlo");
    } else {
      // Si es un número entero salimos del bucle
      validData = true;
    }
  } while (!validData); // Mientras no sea un número entero repetimos el bucle

  if (userData == "n") {
    exit = true;
  }
} while (!exit);

function isPalindrome(string) {
  let isPalindrome = false;
  let reverse = reverseString(string);
  if (string === reverse) {
    isPalindrome = true;
  }
  return isPalindrome;
}

function reverseString(string) {
  let reverseString = "";
  for (let i = string.length - 1; i >= 0; i--) {
    reverseString += string[i];
  }
  return reverseString;
}
