// Obtenemos los elementos del DOM
const dado1Container = document.getElementById("dado1");
const dado2Container = document.getElementById("dado2");
const tirarDadosButton = document.getElementById("tirarDadosButton");

// Variables para controlar el estado de la tirada
let tirandoDados = false; // Indica si se están tirando los dados
let dado1Value = 0; // Valor del dado 1
let dado2Value = 0; // Valor del dado 2
let delay = 400; // Tiempo de espera entre tiradas
let segundosDeTirada = 5; // Tiempo que se tiran los dados


/**
 * Función que tira los dados y actualiza los valores de los dados en el DOM
 */
function tirarDados() {
  dado1Value = Math.floor(Math.random() * 6) + 1;
  dado2Value = Math.floor(Math.random() * 6) + 1;
  dado1Container.innerHTML = dado1Value;
  dado2Container.innerHTML = dado2Value;
}

/**
 * Función que tira los dados y actualiza los valores de los dados en el DOM
 */
function realizarUnaTirada() {
  // Si no se están tirando los dados, se tiran
  if (!tirandoDados) {
    tirarDados(); // Se tiran los dados
  }
}

/**
 * Tira los dados durante un número de segundos y con un delay entre tiradas
 * @param {Number} segundos 
 * @param {Number} delay 
 */
function realizarTiradas(segundos, delay) {
  if (!tirandoDados) {
    tirandoDados = true;
    // Tirar dados durante 5 segundos
    let tirarDadosInterval = setInterval(tirarDados, delay);
    // Parar de tirar dados después de 5 segundos
    setTimeout(() => {
      clearInterval(tirarDadosInterval);
      tirandoDados = false;
    }, segundos*1000);
  }
}

// ------------------ Eventos ------------------
// Evento para tirar los dados al hacer click en el botón
tirarDadosButton.addEventListener("click", realizarUnaTirada);

// Evento para tirar los dados al cargar la página
window.addEventListener("load", () => {
  realizarTiradas(segundosDeTirada, delay);
})
