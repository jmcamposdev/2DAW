import Factura from "../clases/factura.js";
import validateFacturaData from "./validation.js";

// Agregar evento al cargar la página
window.addEventListener("load", function () {
  // Agregar evento al botón de crear producto
  addCreateProductButtonEventListener();
  // Agregar evento al botón de submit del formulario
  addSubmitFormEventListener();

  addResetEventListener();
});

// ////////////////////////////////
// Crear producto
// ////////////////////////////////
/**
 * Agrega un evento al botón de crear producto para que cree los inputs de un nuevo producto
 */
function addCreateProductButtonEventListener() {
  // Obtener el botón de crear producto
  let createProductButton = document.getElementById("añadirProducto");
  // Agregar evento al botón cuando se hace click
  createProductButton.addEventListener("click", function (e) {
    e.preventDefault(); // Evitar que se recargue la página
    createNewProductInputs(); // Crear inputs de un nuevo producto
  });
}

/**
 * Crea los inputs de un nuevo producto y los agrega al DOM
 */
function createNewProductInputs() {
  // Obtener el contenedor de productos
  const facturaContainer = document.getElementById("facturasContainer");

  // Crear contenedor de producto
  const newProductContainer = document.createElement("div");
  // Agregar clases al contenedor
  newProductContainer.classList.add("factura", "mb-3");

  // Crear inputs
  const productNameInput = createInput("text", "nombre", "Nombre del producto");
  const productPriceInput = createInput(
    "number",
    "precio",
    "Precio del producto"
  );
  const productQuantityInput = createInput(
    "number",
    "cantidad",
    "Cantidad del producto"
  );

  // Agregar inputs al contenedor
  newProductContainer.appendChild(productNameInput);
  newProductContainer.appendChild(productPriceInput);
  newProductContainer.appendChild(productQuantityInput);

  // Agregar contenedor al DOM
  facturaContainer.appendChild(newProductContainer);
}

/**
 * Crea un input con los atributos especificados
 * @param {String} type El tipo de input
 * @param {String} name El nombre del input
 * @param {String} placeholder El placeholder del input
 * @returns 
 */
function createInput(type, name, placeholder) {
  const input = document.createElement("input");
  input.setAttribute("type", type);
  input.setAttribute("name", name);
  input.setAttribute("placeholder", placeholder);
  return input;
}



// ////////////////////////////////
// Submit Form
// ////////////////////////////////
/**
 * Agrega un evento al botón de submit del formulario para que cree una factura
 */
function addSubmitFormEventListener() {
  // Obtener el botón de submit del formulario
  let submitFormButton = document.getElementById("facturaForm");
  // Agregar evento al botón cuando se hace click
  submitFormButton.addEventListener("submit", function (e) {
    e.preventDefault(); // Evitar que se recargue la página

    // Obtener datos del formulario
    const nombreEmpresa = document.getElementById("nombreEmpresa").value;
    const cif = document.getElementById("cif").value;
    const nombreCliente = document.getElementById("nombreCliente").value;
    const iva = Number(document.getElementById("iva").value);

    // Obtener productos
    const productos = [];
    const facturas = document.getElementsByClassName("factura");
    // Recorrer los productos
    for (let i = 0; i < facturas.length; i++) {
      const factura = facturas[i]; // Obtener el producto
      // Obtener los datos del producto
      const nombre = factura.querySelector('input[name="nombre"]').value;
      const precio = Number(
        factura.querySelector('input[name="precio"]').value
      );
      const cantidad = Number(
        factura.querySelector('input[name="cantidad"]').value
      );
      // Agregar el producto a la lista de productos como un objeto
      productos.push({
        nombre,
        precio,
        cantidad,
      });
    }

    // Validar datos de la factura si todo es válido, crear la factura
    const isValid = validateFacturaData(
      nombreEmpresa,
      cif,
      nombreCliente,
      iva,
      productos
    );

    // Si los datos son válidos, mostrar la factura
    if (isValid) {
      // Crear factura
      const factura = crearFactura(
        nombreEmpresa,
        cif,
        nombreCliente,
        iva,
        productos
      );
      // Mostrar factura
      mostrarImporteTotal(factura.importeTotal());
    }
  });
}

/**
 * 
 * @param {String} nombreEmpresa Nombre de la empresa
 * @param {Number} cif Cif de la empresa
 * @param {String} nombreCliente Nombre del cliente
 * @param {Number} iva IVA de la factura
 * @param {Array} productos Lista de productos
 * @returns {Factura} La factura creada
 */
function crearFactura(nombreEmpresa, cif, nombreCliente, iva, productos) {
  // Crear factura
  const factura = new Factura(nombreEmpresa, cif, nombreCliente, iva);
  // Agregar productos a la factura
  productos.forEach((producto) => {
    factura.addLineaFactura(
      producto.nombre,
      producto.precio,
      producto.cantidad
    );
  });

  return factura;
}

/**
 * Muestra el importe total de la factura en el DOM
 * @param {String} importeTotal El importe total de la factura
 */
function mostrarImporteTotal(importeTotal) {
  const totalSpan = document.getElementById("totalSpan");
  totalSpan.innerHTML = `${importeTotal}€`;
}

/**
 * Agrega un evento al botón de reset para que limpie el formulario
 */
function addResetEventListener() {
  const resetButton = document.getElementById("resetButton");
  resetButton.addEventListener("click", function (e) {
    e.preventDefault();
    mostrarImporteTotal(0); // Mostrar el importe total en 0
    // Limpiamos el contenedor de productos
    const facturasContainer = document.getElementById("facturasContainer");
    facturasContainer.innerHTML = `<div class="factura mb-3">
    <input type="text" name="nombre" placeholder="Nombre del producto">
    <input type="number" name="precio" placeholder="Precio del producto">
    <input type="number" name="cantidad" placeholder="Cantidad del producto">
  </div>`;

    // Limpiamos los inputs del formulario
    const facturaForm = document.getElementById("facturaForm");
    facturaForm.reset();

  });
}