// Declaramos las constantes
const SUM_OPERATION = 1;
const SUBTRACT_OPERATION = 2;
const MULTIPLY_OPERATION = 3;
const DIVIDE_OPERATION = 4;

do {
  // Pedimos los datos al usuario
  let firstNumber = askNumber("Ingrese el primer número:");
  let secondNumber = askNumber("Ingrese el segundo número:");
  let operation = askOperation();

  // Calculamos el resultado
  let result = calculate(firstNumber, secondNumber, operation);

  // Mostramos el resultado
  alert(
    "El resultado de " +
      firstNumber +
      " " +
      getOperation(operation) +
      " " +
      secondNumber +
      " es: " +
      result
  );
} while (true);

function askNumber(message = "Ingrese una número:") {
  // Declaramos las variables
  let validNumber = false;
  let userNumber;
  // Validamos que el usuario ingrese un número sino le volvemos a pedir el dato
  do {
    userNumber = parseFloat(prompt(message)); // Pedimos el dato al usuario y lo convertimos a número
    if (!Number.isInteger(userNumber)) {
      // Si no es un número le avisamos al usuario
      alert("Valor inválido, por favor ingrese un número");
    } else {
      // Si es un número salimos del bucle
      validNumber = true;
    }
  } while (!validNumber); // Mientras no sea un número entero repetimos el bucle

  return userNumber;
}

function askOperation(
  message = "Que tipo de operación desea realizar? \n 1 - Suma \n 2 - Resta \n 3 - Multiplicación \n 4 - División "
) {
  // Declaramos las variables
  let validNumber = false;
  let userChoice;
  // Validamos que el usuario ingrese un número sino le volvemos a pedir el dato
  do {
    userChoice = parseFloat(prompt(message)); // Pedimos el dato al usuario y lo convertimos a número
    if (!Number.isInteger(userChoice) || userChoice < 1 || userChoice > 4) {
      // Si no es un número le avisamos al usuario y si no esta entre 1 y 4
      alert("Valor inválido, por favor ingrese un número entre 1 y 4");
    } else {
      // Si es un número salimos del bucle
      validNumber = true;
    }
  } while (!validNumber); // Mientras no sea un número entero repetimos el bucle

  return userChoice;
}

function sum(firstNumber, secondNumber) {
  return firstNumber + secondNumber;
}

function subtract(firstNumber, secondNumber) {
  return firstNumber - secondNumber;
}

function multiply(firstNumber, secondNumber) {
  return firstNumber * secondNumber;
}

function divide(firstNumber, secondNumber) {
  return firstNumber / secondNumber;
}

function calculate(firstNumber, secondNumber, operator) {
  let result;
  switch (operator) {
    case SUM_OPERATION: // Suma
      result = sum(firstNumber, secondNumber);
      break;
    case SUBTRACT_OPERATION: // Resta
      result = subtract(firstNumber, secondNumber);
      break;
    case MULTIPLY_OPERATION: // Multiplicación
      result = multiply(firstNumber, secondNumber);
      break;
    case DIVIDE_OPERATION: // División
      result = divide(firstNumber, secondNumber);
      break;
    default:
      break;
  }
  return result;
}

function getOperation(operator) {
  let operation;
  switch (operator) {
    case SUM_OPERATION: // Suma
      operation = "+";
      break;
    case SUBTRACT_OPERATION: // Resta
      operation = "-";
      break;
    case MULTIPLY_OPERATION: // Multiplicación
      operation = "*";
      break;
    case DIVIDE_OPERATION: // División
      operation = "/";
      break;
    default:
      break;
  }
  return operation;
}
