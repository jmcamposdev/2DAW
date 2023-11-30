import FacturaItem from "./facturaItem.js";

/**
 * 1. (3,5 puntos) Definir una clase FACTURA que almacena una factura. Una factura está formada por la información de la propia factura (nombre de la empresa, CIF, nombre_cliente, importe_total, IVA) y una lista de líneas de factura (cada una de los cuales dispone de nombre_producto , precio, cantidad).

Una vez definidas las propiedades del objeto, añadir a la clase Factura un método que calcule el importe_total de la factura.

Prueba los distintos métodos y propiedades con un ejemplo EN LA CONSOLA.
 */
export default class Factura {
  #nombreEmpresa;
  #CIF;
  #nombreCliente;
  #IVA;
  #lineasFactura;

  /**
   * Constructor de la clase Factura
   * @param {String} nombreEmpresa Nombre de la empresa
   * @param {Number} cif Cif de la empresa
   * @param {String} nombreCliente Nombre del cliente
   * @param {Number} iva IVA de la factura
   */
  constructor(nombreEmpresa, CIF, nombreCliente, IVA) {
    // Asignaciones
    this.nombreEmpresa = nombreEmpresa;
    this.CIF = CIF;
    this.nombreCliente = nombreCliente;
    this.IVA = IVA;
    this.#lineasFactura = [];
  }

  ///////////////////////////
  // Getters y setters
  ///////////////////////////

  /**
   * Obtiene el nombre de la empresa
   */
  get nombreEmpresa() {
    return this.#nombreEmpresa;
  }

  /**
   * Asigna el nombre de la empresa
   */
  set nombreEmpresa(nombreEmpresa) {
    this.validString(nombreEmpresa, "nombreEmpresa");
    this.#nombreEmpresa = nombreEmpresa;
  }

  /**
   * Obtiene el CIF de la empresa
   */
  get CIF() {
    return this.#CIF;
  }

  /**
   * Asigna el CIF de la empresa
   */
  set CIF(CIF) {
    this.validString(CIF, "CIF");
    this.#CIF = CIF;
  }

  /**
   * Obtiene el nombre del cliente
   */
  get nombreCliente() {
    return this.#nombreCliente;
  }

  /**
   * Asigna el nombre del cliente
   */
  set nombreCliente(nombreCliente) {
    this.validString(nombreCliente, "nombreCliente");
    this.#nombreCliente = nombreCliente;
  }

  /**
   * Obtiene el IVA de la factura
   */
  get IVA() {
    return this.#IVA;
  }

  /**
   * Asigna el IVA de la factura
   */
  set IVA(IVA) {
    this.validNumber(IVA, "IVA");
    this.#IVA = IVA;
  }

  ///////////////////////////
  // Métodos
  ///////////////////////////

  /**
   * Añade una línea de factura a la lista de líneas de factura
   * @param {String} nombreProducto Nombre del producto
   * @param {Number} precio Precio del producto
   * @param {Number} cantidad La cantidad del producto
   */
  addLineaFactura(nombreProducto, precio, cantidad) {
    // Validaciones
    this.validString(nombreProducto, "nombreProducto");
    this.validNumber(precio, "precio");
    this.validNumber(cantidad, "cantidad");

    // Crear Objecto
    const producto = new FacturaItem(nombreProducto, precio, cantidad);

    // Añadir a la lista
    this.#lineasFactura.push(producto);
  }

  /**
   * Calcula el importe total de la factura
   * @returns {Number} El importe total de la factura
   */
  importeTotal() {
    let total = 0;

    // Recorrer la lista de productos y sumar el importe total
    for (const linea of this.#lineasFactura) {
      total += linea.importeTotal();
    }

    // Sumar el IVA
    total += (total * this.#IVA) / 100;

    return total;
  }

  /**
   * Devuelve la factura como un string
   * @returns {String} La factura como un string
   */
  toString() {
    let resultado = `Empresa: ${this.#nombreEmpresa} - CIF: ${this.#CIF}\n`;
    resultado += `Cliente: ${this.#nombreCliente}\n`;
    resultado += `IVA: ${this.#IVA}%\n`;
    resultado += `Importe total: ${this.importeTotal()}€\n`;
    resultado += `Líneas de factura:\n`;

    if (this.#lineasFactura.length === 0) {
      resultado += `No hay líneas de factura\n`;
    } else {
      for (const linea of this.#lineasFactura) {
        resultado += `${linea.toString()}\n`;
      }

      // Añadir TOTAL
      resultado += `TOTAL: ${this.importeTotal()}€\n`;
    }

    return resultado;
  }

  ///////////////////////////
  // Validaciones
  ///////////////////////////

  validString(string, nombre) {
    if (typeof string !== "string") {
      throw new Error(`El ${nombre} debe ser un string`);
    }
    if (string.length === 0) {
      throw new Error(`El ${nombre} no puede estar vacío`);
    }
  }

  validNumber(number, nombre) {
    if (typeof number !== "number") {
      throw new Error(`El ${nombre} debe ser un número`);
    }

    if (number <= 0) {
      throw new Error(`El ${nombre} debe ser mayor que 0`);
    }
  }
}
