import UserTable from "./userTable.class.js";
import UserForm from "./userForm.class.js";

// Start the app when the page is loaded
window.addEventListener("load", start);

/**
 * Start the app and set the events
 * @return {void}
 */
function start() {
  // Create the table and the form objects
  const table = new UserTable("userTable")
  const form = new UserForm("userForm");

  // Set the row events
  table.setRowsEvent(function () {
    table.setSelectedRow(this); // Set the selected row
    form.setInputData(table.getUserData(this)); // Set the data of the selected row in the form
  })

  // Set the form submit event
  form.setFormSubmitEvent(function (e) {
    e.preventDefault();  // Prevent the default submit event

    const formSubmitterOption = Number(e.submitter.dataset.option); // Get the option of the submitter

    // Switch the option
    switch(formSubmitterOption) {
      case 0 : { // Add a new row
        table.addRow(form.getFormData())
        break;
      }
      case 1 : { // Edit a row
        if (!table.getSelectedRow()) { // If there is no selected row show an error
          showError("You must select a row to edit it")
          break;
        }
        table.updateRow(table.getSelectedRow(), form.getFormData())
        break;
      }
      case 2 : { // Remove a row
        if (!table.getSelectedRow()) { // If there is no selected row show an error
          showError("You must select a row for remove it")
          break;
        }
        table.removeRow(table.getSelectedRow());
        form.clearFormInputs();
        break;
      }
    }
  })


}


/**
 * Muestra un mensaje de error en el contenedor con id="error_container"
 * @param {String} message
 * @return {void} Se detiene la ejecución de la función si ya hay un mensaje de error
 */
function showError(message) {
  // Si ya hay un mensaje de error, no se muestra otro
  if (document.querySelector(".alert")) {
    return;
  }
  // Obtenemos el contenedor de errores
  let errorContainer = document.getElementById("error_container");
  // Agregamos el mensaje de error
  errorContainer.innerHTML = `
    <div class="alert alert-warning mt-3" role="alert">
      ${message}
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
