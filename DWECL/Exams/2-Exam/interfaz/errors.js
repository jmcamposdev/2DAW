/**
 * Muestra un mensaje de error en el contenedor con id="error_container"
 * @param {String} $message
 * @return {void} Se detiene la ejecución de la función si ya hay un mensaje de error
 */
export default function showError($message) {
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
  setTimeout(() => {
    // Esperamos 3 segundos para que se cierre el mensaje
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