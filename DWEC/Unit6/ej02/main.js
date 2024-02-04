/**
 * 2.- Crear una tabla con dos filas y dos columnas, 
 * cambiar el color del interior de la casilla cuando ingresamos con el mouse 
 * y dejarla con dicho color cuando retiramos la flecha.
 */

// Declare constants
const CELL = '.table__cell';
const CELL_COLOR_HOVER = 'table__cell--color-hover';

// Main Entry
$(() => {
  // Add mouseover event to cells
  $(CELL).mouseover(function(){
    // Remove class from all cells
    $(CELL).removeClass(CELL_COLOR_HOVER);
    // Add class to current cell
    $(this).addClass(CELL_COLOR_HOVER);
  });
})