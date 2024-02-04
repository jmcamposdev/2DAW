// Inicializamos las variables
let userGrade = -1;
let validNumber = false;

// Validamos que el usuario ingrese un número y no un string y que sea un número entre 1 y 10
do {
  userGrade = parseInt(prompt("Ingrese un número:", 0)); // Pedimos un número al usuario
  if (!Number.isInteger(userGrade) || userGrade < 1 || userGrade > 10) {
    // Si no es un número entero mostramos un error
    alert("No has ingresado un número, ingresa un número entre 1 y 10");
  } else {
    // Si es un número entero salimos del bucle
    validNumber = true;
  }
} while (!validNumber); // Mientras no sea un número entero repetimos el bucle

// Mostramos su nota.
// Los case que no poseen break se ejecuta todo el código hasta que se encuentre con un break
switch (userGrade) {
  case 1:
  case 2:
  case 3:
  case 4:
  case 5:
    document.write("Suspenso");
    break;
  case 6:
    document.write("Bien");
    break;
  case 7:
  case 8:
    document.write("Notable");
    break;
  case 9:
  case 10:
    document.write("Sobresaliente");
    break;
  default:
    document.write("Valor no válido");
}
