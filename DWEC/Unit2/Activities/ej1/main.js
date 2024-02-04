let formulario = document.getElementById("formulario");

// Cuando se envía el formulario
formulario.addEventListener("submit", function (e) {
  e.preventDefault(); // Evitar que se envíe el formulario

  // Obtener el texto del input
  let textoParrafo = document.getElementById("texto").value; 
  // Creamos una ventana
  let ventana = window.open("", "", "width=300,height=300");

  // Crear un elemento p
  let parrafo = document.createElement("p");
  // Obtenemos el ancho y el alto de la nueva ventana
  let ancho = ventana.outerWidth;
  let alto = ventana.outerHeight;

  // Añadimos al p el texto del input
  parrafo.innerText = `
    Texto pasado: ${textoParrafo} 
    Ancho: ${ancho}
    Alto: ${alto}
    `;
  // Añadir el elemento p a la ventana
  ventana.document.body.appendChild(parrafo);
  
  // Cuando se cierra la ventana mostramos un mensaje en el body
  ventana.onbeforeunload = function () {
    if (document.querySelector(".ventana-cerrada")) {
      document.querySelector(".ventana-cerrada").remove();
    }
    let parrafoVentanaCerrada = document.createElement("p");
    parrafoVentanaCerrada.classList.add("ventana-cerrada");
    parrafoVentanaCerrada.innerText = "Ventana cerrada";
    document.body.appendChild(parrafoVentanaCerrada);
  };
});