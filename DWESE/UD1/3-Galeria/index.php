<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galería</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section class="wrapper">
    <h1>Galería</h1>
    <div class="gallery">
      
      <?php
      function getFullUrl()
      {
        // Obtiene el nombre del servidor (incluyendo http o https) - https://servidor.jmcampos.dev
        $server_name =
          (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on"
            ? "https://"
            : "http://") . $_SERVER["HTTP_HOST"];
        // Obtiene la URL actual puede ser: /1.TareaOnline/3.Galeria/index.php o /1.TareaOnline/3.Galeria/
        $current_url = $_SERVER["REQUEST_URI"];
        // Encuentra la posición de 'index.php' en la URL
        $index_position = strpos($current_url, "index.php");

        // Extrae la parte de la URL antes de 'index.php', si está presente
        if ($index_position !== false) {
          $folder_path = substr($current_url, 0, $index_position);
        } else {
          $folder_path = $current_url; // No se encontró 'index.php', asumimos que estamos en la carpeta raíz
        }

        // Combina el nombre del servidor, https:// y la ruta hasta la carpeta que contiene index.php
        $full_url = $server_name . $folder_path;
        return $full_url;
      }

      $full_url = getFullUrl();
      // Obtenemos todas las imágenes de la carpeta 'images' y las mostramos en la galería
      $images = glob("images/*.{jpg,jpeg,png,gif,bmp}", GLOB_BRACE);
      if (count($images) == 0) {
        echo "<p style='text-align:center'>No hay imágenes en la galería</p>";
      } else {
        foreach ($images as $image) {
          echo "<a class='image-link' href='{$full_url}{$image}' target='_blank'><img class='image' src='$image' alt=''></a>";
        }
      }
      
      ?>
    </div>

    <div class="form-wrapper">
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload Image" name="submit">
      </form>

      <div class="status-container">
        <p>
          <?php if (isset($_GET["upload_status"])) {
            // Si se ha subido una imagen
            if ($_GET["upload_status"] == "success") {
              // Si la subida ha sido correcta
              echo $_GET["success_msg"]; // Mostramos el mensaje de éxito
            } else {
              // Si la subida ha fallado
              echo $_GET["error_code"]; // Mostramos el código de error
            }
          } ?>
        </p>
      </div>
    </div>
  </section>
</body>

</html>