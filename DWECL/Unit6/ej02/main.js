/**
 * 2.- Crear una tabla con dos filas y dos columnas, 
 * cambiar el color del interior de la casilla cuando ingresamos con el mouse 
 * y dejarla con dicho color cuando retiramos la flecha.
 */
$(() => {
  const CELL = '.table__cell';
  const CELL_COLOR_HOVER = 'table__cell--color-hover';

  $(CELL).mouseover(function(){
    $(CELL).removeClass(CELL_COLOR_HOVER);
    $(this).addClass(CELL_COLOR_HOVER);
  });
})