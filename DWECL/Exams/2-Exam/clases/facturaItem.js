/**
 * Una lista de líneas de factura (cada una de los cuales dispone de nombre_producto , precio, cantidad).
 */
export default class FacturaItem {

  #nombreProducto;
  #precio;
  #cantidad;

  /**
   * 
   * @param {String} nombreProducto El nombre del producto
   * @param {Number} precio Precio del producto
   * @param {Number} cantidad La cantidad de productos
   */
  constructor(nombreProducto, precio, cantidad) {
    // Asignaciones
    this.nombreProducto = nombreProducto;
    this.precio = precio;
    this.cantidad = cantidad;
  }

  ///////////////////////////
  // Getters y setters
  ///////////////////////////

  get nombreProducto() {
    return this.#nombreProducto;
  }

  set nombreProducto(nombreProducto) {
    this.validNombre(nombreProducto);
    this.#nombreProducto = nombreProducto;
  }

  get precio() {
    return this.#precio;
  }

  set precio(precio) {
    this.validPrecio(precio);
    this.#precio = precio;
  }

  get cantidad() {
    return this.#cantidad;
  }

  set cantidad(cantidad) {
    this.validCantidad(cantidad);
    this.#cantidad = cantidad;
  }

  importeTotal() {
    return this.#precio * this.#cantidad;
  }

  toString() {
    return `${this.#nombreProducto} - ${this.#precio}€ - ${this.#cantidad} unidades - ${this.importeTotal()}€`;
  }

  ///////////////////////////
  // Validaciones
  ///////////////////////////
  validNombre(nombre) {
    if (typeof nombre !== 'string') {
      throw new Error('El nombre del producto debe ser un string');
    }
    if (nombre.length === 0) {
      throw new Error('El nombre del producto no puede estar vacío');
    }
  }

  validPrecio(precio) {
    if (typeof precio !== 'number') {
      throw new Error('El precio debe ser un número');
    }
    if (precio <= 0) {
      throw new Error('El precio debe ser mayor que 0');
    }
  }

  validCantidad(cantidad) {
    if (typeof cantidad !== 'number') {
      throw new Error('La cantidad debe ser un número');
    }
    if (cantidad <= 0) {
      throw new Error('La cantidad debe ser mayor que 0');
    }
  }

}