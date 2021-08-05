<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Directorio</title>
</head>
<body>
<?php
    if (isset($_POST["enviarDatos"])) {
      $directorio = htmlspecialchars($_POST["nombreDirectorio"]);

      if (!is_dir($directorio)) {
          $crear = mkdir($directorio, 0777, true);
          echo "Carpeta " . $directorio . " Creada. </br>";
      } else {
          echo "La carpeta ya existe. </br>";
      }
    }
?>
<a href="./index.html">Volver</a>
</body>
</html>