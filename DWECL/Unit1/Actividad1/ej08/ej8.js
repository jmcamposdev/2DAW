// Declaramos una constante con las tallas válidas
const validTallas = ["XL", "XXL", "L", "M", "XS", "S"];
// Declaramos las variables que vamos a usar
let userTalla;
let talla;
let validUserInput = false;

do {
  // Pedimos la talla al usuario y validamos que sea válida si no lo es volvemos a pedir la talla
  userTalla = prompt(
    "Ingrese la talla europea de la prenda (XL, XXL, L, M, XS, S)"
  ).toUpperCase(); // Pedimos el dato al usuario y lo pasamos a mayúsculas
  if (!validTallas.includes(userTalla)) {
    // Si la talla es válida salimos del bucle
    alert("La talla ingresada no es válida.");
  } else {
    validUserInput = true;
  }
} while (!validUserInput);

// Comparamos la talla ingresada con las tallas válidas y asignamos la talla correspondiente
if (userTalla === "XL" || userTalla === "XXL" || userTalla === "L") {
  talla = "Grande";
} else if (userTalla === "M") {
  talla = "Mediana";
} else {
  talla = "Pequeña";
}

alert(`La talla ${userTalla} corresponde a una talla ${talla}`);
