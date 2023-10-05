let validNumber = false;
let userNumber;

// Validamos que el usuario ingrese un número y no un string
do {
  userNumber = parseInt(prompt("Ingrese un número:", 0)); // Pedimos un número al usuario
  if (!Number.isInteger(userNumber) || userNumber < 0) {
    // Si no es un número entero mostramos un error
    alert("No has ingresado un número, ingresa un número positivo");
  } else {
    // Si es un número entero salimos del bucle
    validNumber = true;
  }
} while (!validNumber); // Mientras no sea un número entero repetimos el bucle

// Comprobar si es par o impar
let esPar = userNumber % 2 == 0 ? true : false;

// Calculamos el factorial
let factorial = userNumber;
for (let i = userNumber - 1; i > 1; i--) {
  // Iteramos todos los número exceptuando el 1 ya que es innecesario
  factorial *= i; // Multiplicamos
}

// Mostramos los resultados
document.write("El número es: " + (esPar ? "par" : "impar")); // Mostramos el usuario si es par o impar
document.write("<br>"); // Salto de línea
document.write("El factorial de " + userNumber + " es: " + factorial); // Mostramos el factorial redondeado a dos decimales
