// Script destinado a probar la funcionalidad de la clase

import Factura from "../clases/factura.js";

// Creación de una factura
const factura = new Factura('Empresa 1', '1234', 'José María', 21);
// Mostrar la factura
console.log("//////////////////////////////\n Antes de añadir líneas de factura\n//////////////////////////////\n");
console.log(factura.toString()); 

// Modificar la factura
factura.nombreEmpresa = 'Empresa 2';
factura.CIF = '5678';
factura.nombreCliente = 'Juan Carlos';
factura.IVA = 10;


// Añadir líneas de factura
factura.addLineaFactura('Producto 1', 10, 2);
factura.addLineaFactura('Producto 2', 20, 3);
factura.addLineaFactura('Producto 3', 30, 4);
factura.addLineaFactura('Producto 4', 40, 5);

// Mostrar la factura
console.log("//////////////////////////////\n Después de añadir líneas de factura\n//////////////////////////////\n");
console.log(factura.toString()); 