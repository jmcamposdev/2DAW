// Inicializamos la constante que almacenará el contenedor donde irán los resultado
const resultadosContainer = document.getElementById("resultados");
// Declaramos las variables que usaremos
let allAnchors;
let anchorsFiltered;
let anchorsFromThirdParagraph;

// Cuando se cargue la página, ejecutamos el código
window.addEventListener("load", () => {
  allAnchors = document.querySelectorAll('a'); // Obtenemos todos los Anchors
  allAnchors = Array.from(allAnchors); // Convertimos la NodeList a Array para poder usar filter.
  // Filtramos solo los que contenga "http://prueba"
  anchorsFiltered = allAnchors.filter((anchor) => anchor.href == "http://prueba/")
  anchorsFromThirdParagraph = document.querySelectorAll("p:nth-child(3n) a");

  // Mostramos los resultados
  resultadosContainer.innerHTML = `
    <p>Hay ${allAnchors.length} en total</p>
    <p>Hay ${anchorsFiltered.length} que contienen "http://prueba"</p>
    <p>Hay ${anchorsFromThirdParagraph.length} en el tercer párrafo</p>
  `
})