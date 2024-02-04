const SUCCESS_MESSAGE_DURATION = 3000;

document.addEventListener('DOMContentLoaded', function () {
  showInfoMessage('info-message');
});

function showInfoMessage(messageClass) {
  var successMessage = document.getElementsByClassName(messageClass)[0];

  if (successMessage) {
    // Añade la clase para la animación de fade-in
    successMessage.classList.add('animate-fade-in');

    // Espera un tiempo (puedes ajustar este tiempo según tus necesidades)
    setTimeout(function () {
      // Añade la clase para la animación de fade-out
      successMessage.classList.add('animate-fade-out');

      // Escucha el evento 'animationend' para detectar el final de la animación
      successMessage.addEventListener('animationend', function () {
        // Elimina el elemento después de que la animación haya terminado
        successMessage.remove();
      });
    }, SUCCESS_MESSAGE_DURATION); // Duración de la animación de fade-in
  }
}
