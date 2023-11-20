/**
 * ACTIVIDAD 1: Crea la siguiente página web:
 *  • Debe contener una capa (div) con id "hola" de tamaño 500x500 y de color rojo.
 *  • Dentro de la capa "hola" debe colocarse otra capa con id "adios" de 300x300 y
 *  de color verde.
 *  • Se recomienda que la capa "adios" esté centrada. Por, ejemplo mediante el uso
 *  de position: absolute; y las propiedades top, right, etc..
 *  • Desde código JS añade eventos  a ambas capas para que al hacer click manden un
 *  alert con el id de la capa pulsada.
 */

// Gets all the elements by id
const redBox = document.getElementById("hola");
const greenBox = document.getElementById("adios");

// Adds the event listener to the boxes
redBox.addEventListener("click", (e) => {
  e.stopPropagation(); // Stops the propagation of the event to the parent 
  alert("You click the Red Box"); // Shows the alert
})

greenBox.addEventListener("click", (e) => {
  e.stopPropagation(); // Stops the propagation of the event to the parent
  alert("You click the Green Box"); // Shows the alert
})
