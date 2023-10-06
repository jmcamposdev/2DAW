let formulario = document.getElementById("formulario");

// Cuando se envía el formulario
formulario.addEventListener("submit", e => {
  e.preventDefault(); // Evitar que se envíe el formulario

  // Obtener fechas
  let fecha1 = new Date(document.getElementById("fecha1").value);
  let fecha2 = new Date(document.getElementById("fecha2").value);

  // Validar fechas
  if (isNaN(fecha1.getTime()) || isNaN(fecha2.getTime())) {
    alert("Introduce fechas válidas");
  } else {
    // Convertir a milisegundos
    let fecha1Milisegundos = fecha1.getTime();
    let fecha2Milisegundos = fecha2.getTime();

    // Calcular diferencia
    let diferenciaMilisegundos = fecha1Milisegundos - fecha2Milisegundos;
    // Si es negativa, convertir a positiva
    if (diferenciaMilisegundos < 0) diferenciaMilisegundos *= -1;
    // Convertir a días
    let diferenciaDias = diferenciaMilisegundos / (1000 * 60 * 60 * 24);

    // Mostrar resultado
    document.getElementById("resultado").innerHTML = `
      La diferencia entre las fechas es de <span>${diferenciaDias}</span> días`;
  }
})