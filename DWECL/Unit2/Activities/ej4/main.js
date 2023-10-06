const formularioArea = document.getElementById("formularioArea");
const resultContainer = document.getElementById("result_container");

// Se ejecuta cuando se envía el formulario
formularioArea.addEventListener("submit", (e) => {
  e.preventDefault(); // Evita que se recargue la página
  let textAreaValue = document.getElementById("textArea").value;
  
  // Cuenta la cantidad de líneas
  let cantidadLineas = contarNumerosLinea(textAreaValue);
  // Cuenta la cantidad de frases
  let cantidadFrases = contarNumeroFrases(textAreaValue);
  // Devuelve los 10 primeros caracteres
  let diezPrimeros = diezPrimerosCaracteres(textAreaValue);
  // Convierte a mayúsculas
  let mayusculas = convertirMayusculas(textAreaValue);
  // Cuenta la cantidad de veces que aparece cada palabra
  let cantidadPalabras = vecesEncontrado(textAreaValue, ["alumno", "alumna"]);
  // Reemplaza las palabras
  let reemplazo = reemplazarPor(textAreaValue, "alumno", "Jose María");
  reemplazo = reemplazarPor(reemplazo, "alumna", "Jose María");

  // Muestra los resultados
  resultContainer.innerHTML = `
    <p>Cantidad de líneas: ${cantidadLineas}</p>
    <p>Cantidad de frases: ${cantidadFrases}</p>
    <p>10 primeros caracteres: ${diezPrimeros}</p>
    <p>Mayúsculas: ${mayusculas}</p>
    <p>Veces encontrado alumno: ${cantidadPalabras}</p>
    <p>Reemplazo: ${reemplazo}</p>
  `;

});

/**
 * Cuenta la cantidad de líneas en un texto (separadas por salto de línea)
 * @param {String} text
 * @return {Number} Cantidad de líneas
 */
function contarNumerosLinea(text) {
  // Elimina espacios en blanco y separa por saltos de línea
  return text.trim().split("\n"); ; // Se retorna la cantidad de líneas
}

/**
 * Cuenta la cantidad de Frases en un texto (separadas por punto)
 * @param {String} text 
 * @return {Number} Cantidad de frases
 */
function contarNumeroFrases(text) {
  // Elimina espacios en blanco y separa por punto
  let frases = text.trim().split("."); 
  // Busca la primera frase vacía
  let firstEmptyFrase = frases.findIndex((frase) => frase === "");
  // Si no hay frases vacías, se toma la última frase
  if (firstEmptyFrase === -1) {
    firstEmptyFrase = frases.length;
  }
  // Se toman las frases hasta la primera frase vacía
  frases = frases.slice(0, firstEmptyFrase);
  return frases.length; // Se retorna la cantidad de frases
}

/**
 * Devuelve los 10 primeros caracteres de un texto (sin contar espacios en blanco)
 * @param {String} text 
 * @return {String} 10 primeros caracteres
 */
function diezPrimerosCaracteres(text) {
  // Elimina espacios en blanco y toma los primeros 10 caracteres
  return text.trim().slice(0, 10);
}

/**
 * Convierte un texto a mayúsculas
 * @param {String} text Texto a convertir
 * @return {String} Texto convertido a mayúsculas
 */
function convertirMayusculas(text) {
  return text.toUpperCase();
}

/**
 * Devuelve el número de coincidencias pasadas por el array
 * @param {String} text 
 * @param {Array} palabrasABuscar
 */
function vecesEncontrado (text, palabrasABuscar) {
  let vecesEncontrado = 0;
  palabrasABuscar.forEach((palabra) => {
    // Crea una expresión regular con la palabra a buscar
    let regex = new RegExp(palabra, "gi");
    // Cuenta la cantidad de coincidencias
    // Usamos || [] para que no devuelva null si no encuentra nada
    vecesEncontrado += (text.match(regex) || []).length;
  });
  return vecesEncontrado;
}

/**
 * Busca la palabra a buscar y la reemplaza por la palabra a reemplazar
 * @param {String} text Texto a reemplazar
 * @param {String} palabraABuscar Palabra a buscar
 * @param {String} palabraAReemplazar Palabra a reemplazar
 * @return {String} Texto con las palabras reemplazadas
 */
function reemplazarPor(text, palabraABuscar, palabraAReemplazar) {
  // Crea una expresión regular con la palabra a buscar
  let regex = new RegExp(palabraABuscar, "gi");
  // Reemplaza todas las coincidencias
  return text.replace(regex, palabraAReemplazar);
}