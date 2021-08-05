<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Archivo TXT</title>
</head>
<body>
<?php
    if (isset($_POST["enviarDatos"])) {
      $archivo = fopen($_POST["nombreArchivo"] . ".txt","w+b");
    if( $archivo == false ) {
      echo "Error al crear el archivo";
    }
    else
    {
         fwrite($archivo, $_POST["textoArchivo"]);
        
         fflush($archivo);

         echo "Archivo creado. </br>";
    }
    fclose($archivo);
    }
?>

<a href="./index.html">Volver</a>
</body>
</html>

