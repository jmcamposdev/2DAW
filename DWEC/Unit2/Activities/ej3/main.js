const numberRegex = /^(-)?\d+(\.\d{1,2})?$/; // Expresión regular para validar números

let formularioCantidadNumeros = document.getElementById(
  "formularioCantidadNumeros"
);
let formularioNumeros = document.getElementById("formularioNumeros");

// Variable global para guardar la opción seleccionada por el usuario
// 0 = Media aritmética
// 1 = Media redondeada
let userAverageOption = null;
// Variable global para guardar la cantidad de inputs que se van a crear
let userNumberOfInputs = null;

// ------------------ Eventos ------------------

// Evento para el formulario de cantidad de números
formularioCantidadNumeros.addEventListener("submit", (e) => {
  e.preventDefault(); // Evita que se recargue la página
  // Obtenemos el valor del input
  let userInput = document.getElementById("cantidadNumeros").value;

  // Validamos que el usuario haya ingresado un número entero positivo
  if (!numberRegex.test(userInput) || userInput <= 0) {
    // Si el usuario no ingresó un número entero
    alert("Ingrese un número"); // Mostramos un mensaje de error
  } else {
    // Si el usuario ingresó un número entero
    userNumberOfInputs = userInput; // Guardamos la cantidad de inputs que se van a crear
    createAverageForm(userNumberOfInputs);
  }
});

// Evento para el formulario de números (media aritmética o media redondeada)
formularioNumeros.addEventListener("submit", (e) => {
  e.preventDefault(); // Evita que se recargue la página
  // Obtenemos el botón que se clickeó y obtenemos el valor del atributo data-submitOption
  // 0 = Media aritmética
  // 1 = Media redondeada
  let clickedOption = e.submitter.dataset.submitoption;
  let numeros = getAllNumbers();
  let average = getAverage(numeros);
  let container = document.getElementById("center-container");
  let resultParagraph = "";
  if (numeros.length != userNumberOfInputs) {
    showError("Ingrese todos los números");
  } else if (clickedOption == 0) {
    // Si el usuario seleccionó la opción de calcular la media aritmética
    resultParagraph = `La media es: ${average}`;
  } else if (clickedOption == 1) {
    // Si el usuario seleccionó la opción de calcular la media redondeada
    resultParagraph = `La media redondeada es: ${Math.round(average)}`;
  }
  addResult(resultParagraph);
});

// ------------------ Funciones ------------------

/**
 * Añade al formulario con id="formularioNumeros" la cantidad de inputs que el usuario ingresó
 * Añade dos botones para calcular la media aritmética y la media redondeada
 * @param {Number} cantidadNumeros 
 * @returns {void} Se detiene la ejecución de la función si la cantidad de números es inválida
 */
function createAverageForm(cantidadNumeros) {
  // Validamos que la cantidad de números sea válida
  if (cantidadNumeros <= 0) {
    return;
  }

  let inputs = "";
  // Creamos los inputs
  for (let i = 0; i < cantidadNumeros; i++) {
    inputs += `
    <div class="form-group">
      <label for="numero${i}">Número ${i + 1}</label>
      <input type="number" class="form-control" id="numero${i}" placeholder="Ingrese un número" step=".01">
    </div>
    `;
  }
  // Agregamos los inputs al formulario
  formularioNumeros.innerHTML = inputs;
  // Agregamos los botones al formulario
  formularioNumeros.innerHTML += `
    <button type="submit" class="btn btn-primary" data-submitOption="0">Calcular Media</button>
    <button type="submit" class="btn btn-primary" data-submitOption="1">Calcular Media Redondeada</button>
  `;
}

/**
 * Obtiene todos los números ingresados por el usuario en los inputs
 * Obtiene solo los números que sean válidos (enteros o con 2 decimales)
 * @returns {Array} Arreglo con los números ingresados por el usuario
 */
function getAllNumbers() {
  // Obtenemos todos los inputs de tipo number
  let numberInputs = document.querySelectorAll(
    "#formularioNumeros input[type='number']"
  );
  // Creamos un arreglo para guardar los números
  let numeros = [];

  // Recorremos los inputs y agregamos los números al arreglo
  numberInputs.forEach((input) => {
    // Validamos que el input sea un número
    if (numberRegex.test(input.value) && input.value != "") {
      numeros.push(parseFloat(input.value)); // Agregamos el número al arreglo
    }
  });

  return numeros;
}

/**
 * Devuelve la media aritmética de un arreglo de números
 * @param {Array} numeros 
 * @return {Number} Media aritmética de los números
 */
function getAverage(numeros) {
  let suma = 0;
  // Sumamos todos los números
  numeros.forEach((numero) => suma += numero);
  // Dividimos la suma entre la cantidad de números y devolvemos el resultado
  return suma / numeros.length;
}

/**
 * Elimina el resultado anterior y agrega un nuevo resultado
 * Lo agrega al final del contenedor con id="center-container"
 * @param {String} $message 
 */
function addResult($message) {
  // Obtenemos el contenedor
  let container = document.getElementById("result-container");
  // Si ya hay un resultado, lo eliminamos
  if (container.querySelector(".result")) {
    container.querySelector(".result").remove();
  }

  // Creamos un párrafo y le agregamos el resultado
  let resultParagraph = document.createElement("p");
  resultParagraph.classList.add("result");
  resultParagraph.innerHTML = $message;
  container.appendChild(resultParagraph);
}

// ------------------ Funciones de error ------------------

/**
 * Muestra un mensaje de error en el contenedor con id="error_container"
 * @param {String} $message 
 * @return {void} Se detiene la ejecución de la función si ya hay un mensaje de error
 */
function showError($message) {
  // Si ya hay un mensaje de error, no se muestra otro
  if (document.querySelector(".alert")) {
    return;
  }
  // Obtenemos el contenedor de errores
  let errorContainer = document.getElementById("error_container");
  // Agregamos el mensaje de error
  errorContainer.innerHTML = `
    <div class="alert" role="alert">
      ${$message}
    </div>
  `;

  // Agregamos una clase para que se cierre el mensaje de error
  hideError(errorContainer);
}

/**
 * Agrega una clase al contenedor de errores para que se cierre el mensaje de error
 * @param {HTMLDivElement} errorContainer 
 */
function hideError(errorContainer) {
  // Agregamos la clase para cerrar el mensaje de error
  setTimeout(() => { // Esperamos 3 segundos para que se cierre el mensaje
    errorContainer.classList.add("close-error");

    // Remover el evento
    errorContainer.addEventListener(
      "animationend",
      () => {
        errorContainer.classList.remove("close-error");
        errorContainer.innerHTML = "";
      },
      { once: true } // El evento se ejecuta solo una vez
    );
  }, 3000);
}
