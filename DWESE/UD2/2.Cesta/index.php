<?php
// Productos 
const products = [
  [
    "id" => 1,
    "name" => "Sirloin steak with green sauce",
    "price" => 25,
    "image" => "./img/firstPlate/producto-1.jpg"
  ],
  [
    "id" => 2,
    "name" => "Beef",
    "price" => 25,
    "image" => "./img/firstPlate/producto-2.jpg"
  ],
  [
    "id" => 3,
    "name" => "Sea bream with salad",
    "price" => 16,
    "image" => "./img/firstPlate/producto-3.jpg"
  ],
  [
    "id" => 4,
    "name" => "Teriyaki eel with sesame seeds",
    "price" => 14,
    "image" => "./img/firstPlate/producto-4.jpg"
  ],
  [
    "id" => 5,
    "name" => "Lamb tenderloin",
    "price" => 22,
    "image" => "./img/firstPlate/producto-5.jpg"
  ],
  [
    "id" => 6,
    "name" => "Roasted sea bass with puree",
    "price" => 20,
    "image" => "./img/firstPlate/producto-6.jpg"
  ]
];
// Iniciar la sesión
session_start();

// Comprobamos si no existe la sesión
if (!isset($_SESSION['firstSelectedProduct'])) {
  // Inicializamos la variable con el valor -1
  $_SESSION['firstSelectedProduct'] = -1;
}

// Si se ha seleccionado un producto
if (isset($_POST['id'])) {
  // Obtener los datos del producto
  $id = $_POST['id'];
  $name = $_POST['productName'];
  $price = $_POST['productPrice'];
  // Guardar el id del producto seleccionado en la sesión
  $_SESSION['firstSelectedProduct'] = $id;
  // Convertirlos en un array
  $producto = ["id" => $id, "name" => $name, "price" => $price];
  // Añadir el producto a la cesta
  if (!isset($_SESSION['cart'])) { // Si la cesta existe
    $_SESSION['cart'] = array();
  }

  // Asignamos el primer plato a la cesta
  $_SESSION['cart']['firstPlate'] = $producto;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurante</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include_once "./assets/header.php"; ?>
<section class="nav__container">
  <div class="arrow__container">
  </div>
  <div class="title">
    <h1>First Plate</h1>
  </div>
  <div class="arrow__container">
    <a href="secondPlate.php" class="arrow__wrapper">
      <span>Next</span>
      <img class="right-arrow" src="./img/arrow.svg" alt="Right Arrow">
    </a>
  </div>
</section>
<section class="error_container">
  <?php
  if (isset($_GET['error'])) {
    echo $_GET['error'];
  }
  ?>
</section>
<section class="productos__wrapper">
  <div class="productos__container">
    <?php
    foreach (products as $product) {
      $buttonText = $_SESSION['firstSelectedProduct'] == $product['id'] ? "<img src='./img/check.svg'/>" : "Añadir";
      echo "<div class='producto__wrapper'>";
      echo "<div class='producto'>";
      echo "<img src='" . $product['image'] . "' alt='Producto'>";
      echo "<h3>" . $product['name'] . "</h3>";
      echo "<p class='producto__precio'>" . $product['price'] . "€</p>";
      echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
      echo "<input type='hidden' name='id' value='" . $product['id'] . "'>";
      echo "<input type='hidden' name='productName' value='" . $product['name'] . "'>";
      echo "<input type='hidden' name='productPrice' value='" . $product['price'] . "'>";
      echo "<button class='producto__btn'>{$buttonText}</button>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </div>
  </div>
</section>
<!-- Borrar la Sesión -->
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
  <input type="hidden" name="borrar" value="1">
  <button class="borrar__btn">Borrar</button>
</form>
<?php
if (isset($_POST['borrar'])) {
  if (isset($_SESSION['cart'])) {
    session_destroy();
  }
}
?>
</body>
</html>