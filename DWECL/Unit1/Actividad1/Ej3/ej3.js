// Tabla de sumar del 5
const baseSumar = 5;
document.write("Tabla de sumar del 5: <br/>");
for (let i = 0; i <= 10; i++) {
  let resultado = baseSumar + i;
  document.write(baseSumar + " + " + i + " = " + resultado + "<br/>");
}

document.write("<br/>"); // Separador

// Tabla de multiplicar del 7
const baseMultiplicar = 7;
document.write("Tabla de multiplicar del 7: <br/>");
for (let i = 0; i <= 10; i++) {
  let resultado = baseMultiplicar * i;
  document.write(baseMultiplicar + " * " + i + " = " + resultado + "<br/>");
}

document.write("<br/>"); // Separador

// Tabla de multiplicar del 7
const baseDividir = 9;
document.write("Tabla de dividir del 9: <br/>");
for (let i = 1; i <= 10; i++) {
  let resultado = (baseMultiplicar / i).toFixed(2);
  document.write(baseMultiplicar + " / " + i + " = " + resultado + "<br/>");
}
