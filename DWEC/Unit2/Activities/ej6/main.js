const diaReyesContainer = document.getElementById("dia-reyes");

// Obtenemos la fecha actual por defecto la creación del objeto Date devuelve la fecha actual
const currentDate = new Date();
// Calculamos la fecha de Reyes
let reyesDate = getReyesDate();
// Obtenemos la diferencia de días entre la fecha actual y la de reyes
let differenceDay = getDifferenceDayBetweenDates(reyesDate, currentDate);

// Mostramos la fecha de reyes
diaReyesContainer.innerHTML = `Quedan <span>${differenceDay}</span> para el día de Reyes <br> Es el: <span>${reyesDate.toLocaleDateString()}</span>`;





/**
 * Calcula la fecha de reyes
 * @return {Date} Fecha de reyes
 */
function getReyesDate() {
  const currentDate = new Date();
  // Obtenemos el año actual
  let reyesYear = currentDate.getFullYear();
  // Si no estamos en enero y el día es menor a 6 pues la fecha de reyes es para proximo año
  if (!(currentDate.getMonth() == 0 && currentDate.getDay() < 6)) {
    reyesYear++;
  }

  return new Date(`${reyesYear}-01-06`);
}

/**
 * 
 * @param {Date} date1 
 * @param {Date} date2 
 */
function getDifferenceDayBetweenDates(date1, date2) {
  // 1 día = 1000 milisegundos * 60 segundos * 60 minutos * 24 horas
  return Math.round((date1 - date2) / (1000 * 60 * 60 * 24));
}