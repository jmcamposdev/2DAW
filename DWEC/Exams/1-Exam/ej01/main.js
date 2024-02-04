/**
 * Introduce el tamaño de una matriz indicando los dos valores (número de filas y número de columnas)
 * y mediante estructuras de bucles, muestre en la consola aquellas posiciones que contengan ambas coordenadas un número impar.
 * Ej Matriz3x5 (1,1) (1,3) ... (3,3), (3,5)
 */

// Obtener los elementos del DOM
const form = document.getElementById("form");
const resultContainer = document.getElementById("result");

// Añadir el evento submit al formulario
form.addEventListener("submit", (e) => {
    e.preventDefault(); // Evitar que el formulario se envíe y que la página se recargue

    // Obtener los valores de los inputs y convertirlos a números
    let filasValue = Number(document.getElementById("filas").value);
    let columnasValue = Number(document.getElementById("columnas").value);

    // Comprobar que los valores introducidos son números
    if (isNaN(filasValue) || isNaN(columnasValue)) {
        // Si no son números, mostrar un mensaje de error y salir de la función
        alert("Los valores introducidos no son números");
        return;
    } else if (filasValue <= 0) {
        // Si la fila es menor o igual que 0, mostrar un mensaje de error y salir de la función
        alert("Las filas deben de ser mayor que 0")
        return;
    } else if (columnasValue <= 0) {
        // Si la columna es menor o igual que 0, mostrar un mensaje de error y salir de la función
        alert("Las columnas deben de ser mayor que 0");
        return;
    }

    // Mostrar un mensaje de información
    resultContainer.innerHTML = "<p class='title'>Las coordenadas siguientes son impares:</p>";

    // Mostrar las coordenadas impares
    for (let i = 0; i < filasValue; i++) { // Recorrer las filas
        for (let j = 0; j < columnasValue; j++) { // Recorrer las columnas
            // Comprobar si tanto la fila como la columna son impares
            if ((i + 1) % 2 !== 0 && (j + 1) % 2 !== 0) {
                // Mostrar las coordenadas
                resultContainer.innerHTML += `(${i + 1},${j + 1}) `;
            }
        }
    }
})