/**
 * Realiza un script pida un mes y año e imprima su calendario.
 * No hace falta esmerarse en la presentación del calendario,
 * el calendario simplificado puede ser del tipo:
 * Ejemplo: Mes 10 Año 2022
 * Octubre de 2022
 * 1(Sabado)
 * 2(Domingo)
 * 3(Lunes)
 * 4(Martes)
 * 5(Miercoles)
 * 6(Jueves)
 * 7(Viernes)
 * ....
 * 30(Domingo)
 * 31(Lunes)
 */

// Obtener los elementos del DOM
const form = document.getElementById("form");
const resultContainer = document.getElementById("result");

// Crear arrays con los días de la semana y los meses
const days = ["Domingo" , "Lunes" , "Martes" , "Miércoles" , "Jueves" , "Viernes" , "Sábado"];
const months = ["Enero" , "Febrero" , "Marzo" , "Abril" , "Mayo" , "Junio" , "Julio" , "Agosto" , "Septiembre" , "Octubre" , "Noviembre" , "Diciembre"];

// Añadir un evento al formulario
form.addEventListener("submit" , (e) => {
    e.preventDefault() // Evitar que el formulario se envíe y que la página se recargue
    resultContainer.innerHTML = ""; // Vaciar el contenedor de resultados

    // Obtener los valores de los inputs y convertirlos a números
    let month = Number(document.getElementById("month").value);
    let year = Number(document.getElementById("year").value);

    // Comprobar que los valores introducidos sean números y que el mes y el año sean válidos
    if (isNaN(month) || isNaN(year)) { // Comprobar que los valores introducidos sean números
        alert("Los valores introducidos no son números");
        return;
    } else if (month <= 0 || month > 12) { // Comprobar que el mes esté entre 1 y 12
        alert("El mes debe de estar entre 1 y 12");
        return;
    } else if (year <= 0) { // Comprobar que el año sea mayor que 0
        alert("El año debe de ser mayor que 0");
        return;
    }

    month--; // Restar 1 al mes para que sea válido para el constructor de Date

    // Crear un objeto Date con el mes y el año introducidos
    let date = new Date(year, month, 1);

    // Imprimir el mes y el año introducidos
    resultContainer.innerHTML += `<p class="title">${months[date.getMonth()]} de ${date.getFullYear()}</p>`
    resultContainer.innerHTML += `<p>Calendario:</p>`

    // Imprimir los días del mes introducido
    // Iterar mientras el mes sea el mismo
    while (date.getMonth() === month) {
        // Imprimir el día y el nombre del día
        resultContainer.innerHTML += `<p>${date.getDate()} - ${days[date.getDay()]}</p>`
        // Sumar 1 día a la fecha
        date.setDate(date.getDate()+1);
    }
})