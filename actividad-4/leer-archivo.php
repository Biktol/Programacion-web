<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer Archivo</title>
</head>
<body>
<?php

if (isset($_POST["enviarDatosLeer"])) {
    if (file_exists($_POST["nombreArchivoLeer"] . ".txt")) {
        $cadena = file_get_contents($_POST["nombreArchivoLeer"] . ".txt");
        echo $cadena . "</br>";
    } else {
        echo "Archivo no encontrado.</br>";
    }
}
?>
<a href="./index.html">Volver</a>
</body>
</html>