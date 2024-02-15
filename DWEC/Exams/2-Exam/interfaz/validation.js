import showError from "./errors.js";
import Factura from "../clases/factura.js";

export default function validateFacturaData (
  nombreEmpresa,
  cif,
  nombreCliente,
  iva,
  productos
) {
  // Validar nombre de la empresa
  const isValidNombreEmpresa = validateString(
    nombreEmpresa,
    "nombre de la empresa"
  );
  if (!isValidNombreEmpresa) {
    return false;
  }

  // Validar cif
  const isValidCif = validateString(cif, "cif");
  if (!isValidCif) {
    return false;
  }

  // Validar nombre del cliente
  const isValidNombreCliente = validateString(
    nombreCliente,
    "nombre del cliente"
  );
  if (!isValidNombreCliente) {
    return false;
  }

  // Validar iva
  const isValidIva = validateNumber(iva, "iva");
  if (!isValidIva) {
    return false;
  }

  // Validar productos
  if (productos.length === 0) {
    showError("Debe añadir al menos un producto");
    return false;
  }

  for (let i = 0; i < productos.length; i++) {
    const producto = productos[i];
    const isValidNombreProducto = validateString(
      producto.nombre,
      "nombre del producto"
    );
    const isValidPrecioProducto = validateNumber(
      producto.precio,
      "precio del producto"
    );
    const isValidCantidadProducto = validateNumber(
      producto.cantidad,
      "cantidad del producto"
    );

    if (
      !isValidNombreProducto ||
      !isValidPrecioProducto ||
      !isValidCantidadProducto
    ) {
      return false;
    }
  }

  return true;
}

function validateString(string, name) {
  if (string.trim().length === 0 || typeof string !== "string") {
    showError(`El ${name}  no puede estar vacío`);
    return false;
  }
  return true;
}

function validateNumber(number, name) {
  number = Number(number);
  if (isNaN(number) || number <= 0) {
    showError(`El ${name} debe ser un número mayor a 0`);
    return false;
  }
  return true;
}